<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function create()
    {
        return view('subject.create');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subject.create', compact('subject'));
    }

    public function store(Request $request)
    {
        $errors = $this->validateSubject($request);

        if ($errors->count() > 0) {
            return view('subject.create', [
                'errors' => $errors,
                'request' => $request
            ]);
        }

        Subject::create($request->only('description', 'status'));
        
        $_SESSION['flash_success'] = 'Assunto cadastrado com sucesso!';
        return redirect('/subject');

    }

    public function update(Request $request, $id)
    {

        $errors = $this->validateSubject($request);

        if ($errors->count() > 0) {
            return view('subject.create', [
                'errors' => $errors,
                'request' => $request
            ]);
        }
        
        $subject = Subject::findOrFail($id);
        $subject->update($request->only('description', 'status'));
        $_SESSION['flash_success'] = 'Assunto atualizado com sucesso!';
        return redirect('/subject');
    }

    public function index()
    {
        $subjects = Subject::all();
        return view('subject.index', compact('subjects'));
    }

    public function validateSubject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required|string|max:20',
            'status' => 'required|boolean',
        ], [
            'description.required' => 'A descrição é obrigatória.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'status.required' => 'O status é obrigatório.',
            'status.boolean' => 'O status deve ser verdadeiro ou falso.',
        ]);

        return $validator->errors();
    }
}
