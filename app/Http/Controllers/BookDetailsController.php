<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class BookDetailsController extends Controller
{
    public function index()
    {
        $books = DB::select("SELECT * FROM books_with_details");
        return view('home', ['books' => $books]);
    }

    public function exportPDF()
    {
        $books = DB::select("SELECT * FROM books_with_details");
        $pdf = Pdf::loadView('relatorio', ['books' => $books]);
        return $pdf->download('books-details.pdf');
    }
}
