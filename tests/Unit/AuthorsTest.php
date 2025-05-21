<?php

use App\Models\Author;

it('Possui os atributos preenchíveis corretos', function () {
    $author = new Author();

    expect($author->getFillable())->toBe([
        'name',
        'status',
    ]);
});