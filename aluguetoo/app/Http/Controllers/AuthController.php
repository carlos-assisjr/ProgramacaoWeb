<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    { 
        return view('login');
    } 

    public function login(Request $request)
    { 
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);;

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user(); 
            // Redirecionamento baseado na coluna 'role' do banco de dados
            if ($user->role === 'ADM') {
                return redirect()->intended('/dashboard-adm');
            } elseif ($user->role === 'CLI') {
                return redirect()->intended('/dashboard-cli');
            }

            // Se o usuário não tiver um papel válido, desloga e barra o acesso
            Auth::logout();
            return redirect('/login')->withErrors(['access' => 'Nível de usuário inválido! Entre em contato com o administrador.']);
        }

        return back()->withErrors([
            'login' => 'As credenciais fornecidas estão incorretas!', 
        ]); 
    }

    public function logout(Request $request)
    { 
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    } 
}