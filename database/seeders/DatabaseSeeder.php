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
        // \App\Models\User::factory(10)->create();
        $this->call(EstadoTableSeeder::class);
        $this->call(CidadeTableSeeder::class);
        $this->call(BairroTableSeeder::class);
        $this->call(NivelAcessoTableSeeder::class);
        $this->call(SetorTableSeederS::class);
        $this->call(UserTableSeederS::class);

    }
}
