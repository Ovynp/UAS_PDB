<?php

namespace Database\Factories;

use App\Models\pekerjaan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PekerjaanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = pekerjaan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama'=>$this->fake->pekerjaan
        ];
    }
}
