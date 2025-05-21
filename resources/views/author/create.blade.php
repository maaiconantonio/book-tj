@extends('layouts.app')

@section('title', 'Golden Books - Autores')

@section('content')
    <h5>{{ isset($author) ? 'Edição' : 'Cadastro' }} de Autores</h5>
    <hr class="my-4" />
    @if(isset($errors))
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <form action="{{ isset($author) ? "/author/{$author->id}" : '/author' }}" method="POST">
        @if(isset($author))
            <input type="hidden" name="_method" value="PUT">
        @endif
        <div class="form-group row">
            <div class="col-md-6">
                <label for="name" class="col-sm-2 col-form-label">Nome:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $request->name ?? $author->name ?? '' }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="status" class="col-sm-2 col-form-label">Status:</label>
                <div class="col-sm-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="1" {{ (isset($author) && $author->status == 1) || (isset($request->status) && $request->status == 1) ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status1">Ativo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status0" value="0" {{ (isset($author) && $author->status == 0) || (isset($request->status) && $request->status == 0) ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status0">Inativo</label>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="form-group row">
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-primary">{{ isset($author) ? 'Atualizar' : 'Cadastrar' }}</button>
                <a href="/author" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </form>
@endsection
