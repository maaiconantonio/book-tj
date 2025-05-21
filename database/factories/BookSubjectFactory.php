<?php

namespace Database\Factories;

use App\Models\BookSubject;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookSubjectFactory extends Factory
{
    protected $model = BookSubject::class;

    public function definition()
    {
        return [
            'book_id' => $this->faker->numberBetween(1, 10),
            'subject_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
