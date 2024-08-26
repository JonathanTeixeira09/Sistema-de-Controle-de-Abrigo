<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Cidade;

class CidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cidade::create([
            'nome' => 'Santa Maria',
            'id_est' => '1',
            'id' => '1',
        ]);
    }
}
