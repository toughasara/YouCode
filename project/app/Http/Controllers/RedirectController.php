<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function redirectUser()
    {
        $user = Auth::user();

        // dd(Auth::user());

        if ($user->role->title === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->role->title === 'staff') {
            return redirect('/staff/dashboard');
        } elseif ($user->role->title === 'candidat') {
            return redirect('/candidat/quiz');
        }

        return redirect('/home'); // Redirection par défaut
    }
}
