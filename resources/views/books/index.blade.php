@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Biblioteca Virtual</h1>

    <form action="{{ route('books.index') }}" method="GET">
        <input type="text" name="search" placeholder="Buscar por nome ou autor">
        <input type="date" name="start_date">
        <input type="date" name="end_date">
        <button type="submit">Pesquisar</button>
    </form>

    <a href="{{ route('books.create') }}">Adicionar Novo Livro</a>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Autor</th>
                <th>Data de Lançamento</th>
                <th>Data de Retirada</th>
                <th>Data de Devolução</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->release_date }}</td>
                <td>{{ $book->withdrawal_date }}</td>
                <td>{{ $book->return_date }}</td>
                <td>
                    <a href="{{ route('books.edit', $book) }}">Editar</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
