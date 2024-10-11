<?php
namespace App\Http\Controllers;
use Illuminate\View\View;

class TermeController extends Controller
{
    public function terme():View
    {
        return view('auth.signup-terms');
    }

}
