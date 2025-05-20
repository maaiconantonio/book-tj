@extends('layouts.app')

@section('title', 'Golden Books - Autores')

@section('content')
    <h1>Cadastro de Autores</h1>
    <form action="/authors" method="POST">
        <div class="form-group row">
            <div class="col-md-6">
                <label for="name" class="col-sm-2 col-form-label">Nome:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="status" class="col-sm-2 col-form-label">Status:</label>
                <div class="col-sm-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="1" required>
                        <label class="form-check-label" for="status1">Ativo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status0" value="0" required>
                        <label class="form-check-label" for="status0">Inativo</label>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="form-group row">
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
    </form>
@endsection
