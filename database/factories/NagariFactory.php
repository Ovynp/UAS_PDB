<?php

namespace Database\Factories;

use App\Models\Nagari;
use Illuminate\Database\Eloquent\Factories\Factory;

class NagariFactory extends Factory
{
  
    protected $model = Nagari::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->city
        ];
    }
}
