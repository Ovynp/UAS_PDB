<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      //  $nagaris= \App\Models\Nagari::factory(5)->create();
      Model::unguard();
      // $this->call(KartuKeluargaSeeder::class);
      \App\Models\penduduk::factory()->count(100)->create();
    }
}
