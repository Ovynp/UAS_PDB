<?php

namespace Database\Seeders;

use App\Models\Jorong;
use App\Models\Nagari;
use Illuminate\Database\Seeder;

class jorongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nagaris = nagari::factory(5)->create();
        foreach($nagaris as $nagari)
        {
            jorong::factory(5)->create(['nagari_id'=>$nagari->id]);
        }

    }
}
