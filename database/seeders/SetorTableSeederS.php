<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Setor;

class SetorTableSeederS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setor::create([
            'nome' => 'Administrativo',
            'id' => '1',
        ]);
    }
}
