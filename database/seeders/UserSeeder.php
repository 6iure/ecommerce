<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Iure',
            'cpf' => '123.456.789-00',
            'email' => 'iure@sysout.com.br',
            'password' => bcrypt('sysout')
        ]);
    }
}
