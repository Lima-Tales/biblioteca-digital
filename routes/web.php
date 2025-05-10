<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/talesteste', function () {
    return view('talesteste');
});
Route::get('/biblioteca', function () {
    return view('biblioteca');
});