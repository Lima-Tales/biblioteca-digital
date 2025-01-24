<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    
public function index()
    {
        // Carrega todos os livros do banco de dados
        $books = Book::all();

        // Retorna a view 'books.index' com os dados
        return view('books.index', compact('books'));
    }
}