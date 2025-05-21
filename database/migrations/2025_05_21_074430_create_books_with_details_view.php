<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::statement("
            CREATE VIEW books_with_details AS
            SELECT
                b.*,
                STRING_AGG(DISTINCT a.name, ', ') AS author_names,
                STRING_AGG(DISTINCT s.description, ', ') AS subject_names
            FROM books b
            LEFT JOIN books_authors ba ON b.id = ba.book_id
            LEFT JOIN authors a ON ba.author_id = a.id
            LEFT JOIN books_subjects bs ON b.id = bs.book_id
            LEFT JOIN subjects s ON bs.subject_id = s.id
            GROUP BY b.id
        ");
    }

    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS books_with_details");
    }
};
