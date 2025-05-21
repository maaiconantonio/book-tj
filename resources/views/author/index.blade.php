@extends('layouts.app')

@section('title', 'Golden Books - Autores')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5>Lista de Autores</h5>
    <a href="{{ url('/author/new') }}" class="btn btn-primary">Cadastrar novo autor</a>
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
        <th>Nome</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($authors as $author)
        <tr>
          <td>{{ $author->name }}</td>
          <td class="text-center">{{ $author->status ? 'Ativo' : 'Inativo' }}</td>
          <td class="text-center">
            <a href="{{ url("/author/{$author->id}/edit") }}" class="btn btn-sm btn-primary">Editar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
