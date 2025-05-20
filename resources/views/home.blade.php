@extends('layouts.app')

@section('title', 'CRUD Livros')

@section('content')
    <h1>Cadastro de Livros</h1>
    <form action="/livros" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection
