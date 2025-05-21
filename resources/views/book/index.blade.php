@extends('layouts.app')

@section('title', 'Golden Books - Livros')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5>Lista de Livros</h5>
    <a href="{{ url('/book/new') }}" class="btn btn-primary">Cadastrar novo livro</a>
  </div>
  <hr class="my-4" />
  @if(isset($_SESSION['flash_success']))
    <div class="alert alert-success">
        {{ $_SESSION['flash_success'] }}
    </div>
    <?php unset($_SESSION['flash_success']); ?>
  @endif

  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Título</th>
        <th>Editora</th>
        <th>Edição</th>
        <th>Preço</th>
        <th>Ano de Publicação</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($books as $book)
        <tr>
          <td>{{ $book->title }}</td>
          <td class="text-center">{{ $book->publisher }}</td>
          <td class="text-center">{{ $book->edition }}</td>
          <td class="text-center">R$ {{ number_format($book->price, 2, ',', '.') }}</td>
          <td class="text-center">{{ $book->publicationYear }}</td>
          <td class="text-center">{{ $book->status ? 'Ativo' : 'Inativo' }}</td>
          <td class="text-center">
            <a href="{{ url("/book/{$book->id}/edit") }}" class="btn btn-sm btn-primary">Editar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
