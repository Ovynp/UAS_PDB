<?php

namespace Database\Factories;

use App\Models\penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendudukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = penduduk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kartu_keluarga_id'=>$this->faker->numberBetween($min = 2, $max = 102),
            'nama'=>$this->faker->name,
            'nik'=>$this->faker->randomNumber(),
            'tempat_lahir'=>$this->faker->city,
            'tanggal_lahir'=>$this->faker->date,
            'agama'=> $this->faker->randomElement($array= array('Islam','Kristen','Konghutcu','Hindu','Budha','Katolik')),
            'level_pendidikan_id'=> $this->faker->numberBetween($min = 1, $max = 7),
            'pekerjaan_id'=>$this->faker->numberBetween($min = 1, $max = 8),
            'jenis_kelamin'=> $this->faker->randomElement($array= array('L','P')),
            'status_pernikahan'=> $this->faker->randomElement($array= array('Menikah','Belum Menikah', 'Janda/duda')),
            'status_keluarga' =>$this->faker->randomElement($array= array('Ayah','Ibu','Anak','orang tua')),
            'kewarganegaraan_id' =>$this->faker->numberBetween($min = 1, $max = 2),
            'ayah'=>$this->faker->name,
            'ibu'=>$this->faker->name
        ];
    }
}
