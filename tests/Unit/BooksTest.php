<?php

use App\Models\Book;

it('Possui os atributos preenchíveis corretos', function () {
    $book = new Book();

    expect($book->getFillable())->toBe([
        'title',
        'publisher',
        'edition',
        'price',
        'publicationYear',
        'status',
    ]);
});