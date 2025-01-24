<?php

use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/talesteste', function () {
    return view('talesteste');
});
Route::get('/biblioteca', function () {
    return view('biblioteca');
=======
route::get('/', function () {
    return view('welcome');

>>>>>>> 821e922 (terceira semana)
});