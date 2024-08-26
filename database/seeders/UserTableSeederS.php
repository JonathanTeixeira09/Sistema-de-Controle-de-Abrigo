<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\User;

class UserTableSeederS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'adm@adm.com',
            'password' => bcrypt('adm123'),
            'id_set' => '1',
            'id_nivel' => '1',
        ]);
    }
}
