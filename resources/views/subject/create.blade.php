@extends('layouts.app')

@section('title', 'Golden Books - Assuntos')

@section('content')
    <h5>{{ isset($subject) ? 'Edição' : 'Cadastro' }} de Assuntos</h5>
    <hr class="my-4" />
    @if(isset($errors))
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <form action="{{ isset($subject) ? "/subject/{$subject->id}" : '/subject' }}" method="POST">
        @if(isset($subject))
            <input type="hidden" name="_method" value="PUT">
        @endif
        <div class="form-group row">
            <div class="col-md-8">
                <label for="description" class="col-sm-2 col-form-label">Descrição:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" name="description" value="{{ $request->description ?? $subject->description ?? '' }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <label for="status" class="col-sm-2 col-form-label">Status:</label>
                <div class="col-sm-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="1" {{ (isset($subject) && $subject->status == 1) || (isset($request->status) && $request->status == 1) ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status1">Ativo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status0" value="0" {{ (isset($subject) && $subject->status == 0) || (isset($request->status) && $request->status == 0) ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status0">Inativo</label>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="form-group row">
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-primary">{{ isset($subject) ? 'Atualizar' : 'Cadastrar' }}</button>
                <a href="/subject" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </form>
@endsection
