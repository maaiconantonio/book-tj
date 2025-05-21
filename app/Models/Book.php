<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\BookAuthor;
use App\Models\BookSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = ['title', 'publisher', 'edition', 'price', 'publicationYear', 'status'];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'books_authors')->using(BookAuthor::class)->withTimestamps();
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'books_subjects')->using(BookSubject::class)->withTimestamps();
    }
}