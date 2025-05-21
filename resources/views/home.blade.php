@extends('layouts.app')

@section('title', 'Golden Books - Dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>Lista de Livros com Autores e Assuntos</h5>
        <a href="{{ url('/download/book-details') }}" class="btn btn-info">Download PDF</a>
    </div>
    <hr class="my-4" />
    <table class="table table-striped table-bordered">
        <thead>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autores</th>
                <th>Assuntos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author_names }}</td>
                    <td>{{ $book->subject_names }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
