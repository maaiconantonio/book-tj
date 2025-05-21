@extends('layouts.app')

@section('title', 'Golden Books - Autores')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5>Lista de Assuntos</h5>
    <a href="{{ url('/subject/new') }}" class="btn btn-primary">Cadastrar novo assunto</a>
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
        <th>Descrição</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($subjects as $subject)
        <tr>
          <td>{{ $subject->description }}</td>
          <td class="text-center">{{ $subject->status ? 'Ativo' : 'Inativo' }}</td>
          <td class="text-center">
            <a href="{{ url("/subject/{$subject->id}/edit") }}" class="btn btn-sm btn-primary">Editar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
