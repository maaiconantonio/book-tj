<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BookSubject extends Pivot
{
    use HasFactory;
    
    protected $table = 'books_subjects';
    protected $fillable = [
        'book_id',
        'subject_id',
    ];
}
