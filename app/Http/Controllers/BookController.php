<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function create()
    {
        return view('book.create');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('book.create', compact('book'));
    }

    public function store(Request $request)
    {
        $errors = $this->validateBook($request);

        if ($errors->count() > 0) {
            return view('book.create', [
                'errors' => $errors,
                'request' => $request
            ]);
        }

        $book = Book::create($request->only('title', 'publisher', 'edition', 'price', 'publicationYear', 'status'));
        $book->authors()->attach($request->authors);
        $book->subjects()->attach($request->subjects);

        $_SESSION['flash_success'] = 'Livro cadastrado com sucesso!';
        return redirect('/book');

    }

    public function update(Request $request, $id)
    {
        $errors = $this->validateBook($request);

        if ($errors->count() > 0) {
            return view('book.create', [
                'errors' => $errors,
                'request' => $request
            ]);
        }
        
        $book = Book::findOrFail($id);
        $book->update($request->only('title', 'publisher', 'edition', 'price', 'publicationYear', 'status'));
        $book->authors()->sync($request->authors);
        $book->subjects()->sync($request->subjects);

        $_SESSION['flash_success'] = 'Livro atualizado com sucesso!';
        return redirect('/book');
    }

    public function index()
    {
        $books = Book::all();
        return view('book.index', compact('books'));
    }

    public function validateBook(Request $request)
    {
        $request->merge([
            'price' => str_replace(['.', ','], ['', '.'], $request->price),
        ]);
        
        $validator = Validator::make($request->all(), [
            'title'   => 'required|string|max:40',
            'publisher' => 'required|string|max:40',
            'edition' => 'required|string|max:40',
            'price' => 'required|numeric',
            'publicationYear' => 'required|numeric',
            'status' => 'required|boolean',
            'authors' => 'array',
            'subjects' => 'array',
        ], [
            'title.required' => 'O título é obrigatório.',
            'title.max' => 'O título deve conter no máximo 40 caracteres.',
            'publisher.required' => 'A editora é obrigatória.',
            'publisher.max' => 'A editora deve conter no máximo 40 caracteres.',
            'edition.required' => 'A edição é obrigatória.',
            'edition.max' => 'A edição deve conter no máximo 40 caracteres.',
            'price.required' => 'O preço é obrigatório.',
            'price.numeric' => 'O preço deve ser um valor numérico.',
            'publicationYear.required' => 'O ano de publicação é obrigatório.',
            'publicationYear.numeric' => 'O ano de publicação deve ser numérico.',
            'status.required' => 'O status é obrigatório.',
            'status.boolean' => 'O status deve ser verdadeiro ou falso.',
        ]);

        return $validator->errors();
    }
}
