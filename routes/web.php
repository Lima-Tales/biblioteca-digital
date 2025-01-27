<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Rotas de autenticação
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login.form'); // Exibe o formulário de login
    Route::post('/login', 'login')->name('login'); // Processa o login
    Route::get('/register', 'showRegistrationForm')->name('register.form'); // Exibe o formulário de registro
    Route::post('/register', 'register')->name('register'); // Processa o registro
    Route::post('/logout', 'logout')->middleware('auth')->name('logout'); // Realiza o logout
});
Route::resource('books', BookController::class);

// Rota para página inicial protegida (necessário login)
Route::get('/home', function () {
    return view('home'); // Certifique-se de criar a view 'home'
})->middleware('auth')->name('home');

// Redireciona a rota raiz para a página de login
Route::get('/', function () {
    return redirect()->route('login.form');
});
