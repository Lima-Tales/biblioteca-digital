<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('login'); // Certifique-se de que a view 'login' está configurada corretamente
    }

    // Exibe o formulário de registro
    public function showRegistrationForm()
    {
        return view('auth.register'); // Certifique-se de que a view 'auth.register' existe
    }

    // Processa o login
    public function login(Request $request)
    {
        // Validação dos campos de entrada
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('login', 'password');

        // Tenta autenticar usando nome ou email
        $authAttempt = Auth::attempt([
            'name' => $credentials['login'],
            'password' => $credentials['password'],
        ]) || Auth::attempt([
            'email' => $credentials['login'],
            'password' => $credentials['password'],
        ]);

        if ($authAttempt) {
            // Redireciona para a página inicial após login bem-sucedido
            return redirect()->route('home');
        }

        // Retorna com erro se as credenciais forem inválidas
        return back()->withErrors(['login' => 'Credenciais inválidas'])->withInput();
    }

    // Processa o registro de um novo usuário
    public function register(Request $request)
    {
        // Validação dos dados de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Cria o novo usuário
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redireciona para a página de login com mensagem de sucesso
        return redirect()->route('login.form')->with('success', 'Cadastro realizado com sucesso!');
    }

    // Processa o logout
    public function logout()
    {
        Auth::logout(); // Realiza o logout
        return redirect()->route('login.form'); // Redireciona para o formulário de login
    }
}
