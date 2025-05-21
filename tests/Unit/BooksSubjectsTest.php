<?php

use App\Models\BookSubject;

it('Possui os atributos preenchíveis corretos', function () {
    $bookSubject = new BookSubject();

    expect($bookSubject->getFillable())->toBe([
        'book_id',
        'subject_id',
    ]);
});