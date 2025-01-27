<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->filled('search')) {
            $query->where('name', 'LIKE', "%{$request->search}%")
                  ->orWhere('author', 'LIKE', "%{$request->search}%");
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('release_date', [
                $request->start_date,
                $request->end_date
            ]);
        }

        $books = $query->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'author' => 'required|max:255',
            'release_date' => 'required|date',
            'withdrawal_date' => 'nullable|date',
            'return_date' => 'nullable|date'
        ]);

        Book::create($validatedData);
        return redirect()->route('books.index')->with('success', 'Livro adicionado com sucesso');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'author' => 'required|max:255',
            'release_date' => 'required|date',
            'withdrawal_date' => 'nullable|date',
            'return_date' => 'nullable|date'
        ]);

        $book->update($validatedData);
        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Livro excluído com sucesso');
    }
}
