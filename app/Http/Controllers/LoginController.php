<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, ['email' => 'required', 'password' => 'required']);
        $credenciais = $request->only('email', 'password');

        if (Auth::attempt($credenciais)) {
            Alert::success('Tudo certo!', 'Login realizado com sucesso!');
            return redirect()->route('tarefas');
        } else {
            Alert::error('Ops!', 'Email ou senha incorretos!');
            return redirect()->route('home');
        }
    }
    public function verificacao()
    {
        if (auth::user()) {
            return redirect()->route('tarefas');
        } else {
            return view('entrada');
        }
    }
}
