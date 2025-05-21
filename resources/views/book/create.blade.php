@extends('layouts.app')

@section('title', 'Golden Books - Livros')

@section('content')
    <h5>{{ isset($book) ? 'Edição' : 'Cadastro' }} de Livros</h5>
    <hr class="my-4" />
    @if(isset($errors))
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <form action="{{ isset($book) ? "/book/{$book->id}" : '/book' }}" method="POST">
        @if(isset($book))
            <input type="hidden" name="_method" value="PUT">
        @endif
        <div class="form-group row">
            <div class="col-md-10">
                <label for="title" class="col-form-label">Título:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $request->title ?? $book->title ?? '' }}" required>
            </div>
            <div class="col-md-2">
                <label for="publicationYear" class="col-form-label">Publicação:</label>
                <input type="text" class="form-control" id="publicationYear" name="publicationYear" value="{{ $request->publicationYear ?? $book->publicationYear ?? '' }}" placeholder="YYYY" required>
            </div>
        </div>
        <br />
        <div class="form-group row">
            <div class="col-md-6">
                <label for="authors" class="col-form-label">Autores:</label>
                <select name="authors[]" id="authors" class="form-control select2" multiple>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}"
                            @if (
                                (isset($book) && $book->authors->contains($author->id)) ||
                                (isset($request->authors) && in_array($author->id, $request->authors))
                            ) selected @endif>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="subjects" class="col-form-label">Assuntos:</label>
                <select name="subjects[]" id="subjects" class="form-control select2" multiple>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}"
                            @if (
                                (isset($book) && $book->subjects->contains($subject->id)) ||
                                (isset($request->subjects) && in_array($subject->id, $request->subjects))
                            ) selected @endif>
                            {{ $subject->description }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <br />
        <div class="form-group row">
            <div class="col-md-6">
                <label for="publisher" class="col-form-label">Editora:</label>
                <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $request->publisher ?? $book->publisher ?? '' }}" required>
            </div>
            <div class="col-md-3">
                <label for="edition" class="col-form-label">Edição:</label>
                <input type="numeric" class="form-control" id="edition" name="edition" value="{{ $request->edition ?? $book->edition ?? '' }}" required>
            </div>
            <div class="col-md-3">
                <label for="price" class="col-form-label">Preço:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">R$</span>
                    </div>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $request->price ?? $book->price ?? '' }}" mask="000.000.000.000.000,00" placeholder="0,00" required>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="status" class="col-sm-12 col-form-label">Status:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="1" {{ (isset($book) && $book->status == 1) || (isset($request->status) && $request->status == 1) ? 'checked' : '' }} required>
                    <label class="form-check-label" for="status1">Ativo</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status0" value="0" {{ (isset($book) && $book->status == 0) || (isset($request->status) && $request->status == 0) ? 'checked' : '' }} required>
                    <label class="form-check-label" for="status0">Inativo</label>
                </div>
            </div>
        </div>
        <br />
        <div class="form-group row">
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-primary">{{ isset($book) ? 'Atualizar' : 'Cadastrar' }}</button>
                <a href="/book" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </form>
@endsection
