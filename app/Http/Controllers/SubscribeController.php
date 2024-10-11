<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubscribeController extends Controller
{
    public function handleTerms(Request $request): RedirectResponse
    {
        if ($request->has('accept_terms')) {
            return redirect()->route('subscribe');

        } else {
            return redirect()->back()->with(["terms" => "Accepte mon lapinou <3"]);
        }
    }

    public function signup(): View {
        return view('auth.signup-terms');
    }


}
