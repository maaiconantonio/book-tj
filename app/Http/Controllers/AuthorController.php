<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function create()
    {
        return view('author.create');
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('author.create', compact('author'));
    }

    public function store(Request $request)
    {
        $errors = $this->validateAuthor($request);

        if ($errors->count() > 0) {
            return view('author.create', [
                'errors' => $errors,
                'request' => $request
            ]);
        }

        Author::create($request->only('name', 'status'));
        
        $_SESSION['flash_success'] = 'Autor cadastrado com sucesso!';
        return redirect('/author');

    }

    public function update(Request $request, $id)
    {

        $errors = $this->validateAuthor($request);

        if ($errors->count() > 0) {
            return view('author.create', [
                'errors' => $errors,
                'request' => $request
            ]);
        }
        
        $author = Author::findOrFail($id);
        $author->update($request->only('name', 'status'));
        $_SESSION['flash_success'] = 'Autor atualizado com sucesso!';
        return redirect('/author');
    }

    public function index()
    {
        $authors = Author::all();
        return view('author.index', compact('authors'));
    }

    public function validateAuthor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:40',
            'status' => 'required|boolean',
        ], [
            'name.required' => 'O nome é obrigatório.',
            'name.max' => 'O nome deve conter no máximo 40 caracteres.',
            'status.required' => 'O status é obrigatório.',
            'status.boolean' => 'O status deve ser verdadeiro ou falso.',
        ]);

        return $validator->errors();
    }
}
