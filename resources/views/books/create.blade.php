@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Novo Livro</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div>
            <label>Nome do Livro</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Autor</label>
            <input type="text" name="author" required>
        </div>
        <div>
            <label>Data de Lançamento</label>
            <input type="date" name="release_date" required>
        </div>
        <div>
            <label>Data de Retirada</label>
            <input type="date" name="withdrawal_date">
        </div>
        <div>
            <label>Data de Devolução</label>
            <input type="date" name="return_date">
        </div>
        <button type="submit">Salvar</button>
    </form>
</div>
@endsection
