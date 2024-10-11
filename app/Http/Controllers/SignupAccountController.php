<?php

namespace App\Http\Controllers;

use App\Models\InvitationCode;
use App\Models\User;
use App\service\InvitationCodeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class SignupAccountController
{
    public function signup(): View
    {
        return view('auth.signup-account');
    }

    public function postSignup(Request $request): RedirectResponse
    {
        return redirect()->route('getSignup-account');
    }

    public function createUser(Request $request, InvitationCode $code): RedirectResponse
    {
        // Validation des données du formulaire
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // Si la validation échoue, rediriger avec les erreurs
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Création d'un nouvel utilisateur
        $user = new User();
        $user->name = fake()->name();
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // Hashage du mot de passe
        $user->save(); // Sauvegarde dans la base de données

        // Génération de 5 codes et association à l'utilisateur
        $codes = InvitationCodeService::generateCode(5); // Assurez-vous que cette méthode génère 5 codes
        foreach ($codes as $codeValue) {
            $code = new InvitationCode();
            $code->code = $codeValue;  // Code généré
            $code->host_id = $user->id;  // Association avec l'utilisateur
            $code->save();  // Sauvegarde du code dans la base de données
        }

        $code->update([
            'guest_id' => $user->id,
            'consumed_at' => now()
        ]);

        return redirect()->route('login');
    }

}
