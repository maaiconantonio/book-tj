<?php

use App\Models\Subject;

it('Possui os atributos preenchíveis corretos', function () {
    $subject = new Subject();

    expect($subject->getFillable())->toBe([
        'description',
        'status',
    ]);
});