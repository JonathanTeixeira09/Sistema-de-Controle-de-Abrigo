<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Estado;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'nome' => 'RS',
            'id' => '1',
        ]);
    }
}
