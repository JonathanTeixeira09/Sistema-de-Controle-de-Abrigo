<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NivelAcesso;

class NivelAcessoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NivelAcesso::create([
            'nome' => 'Administrador',
            'id' => '1',
        ]);
    }
}
