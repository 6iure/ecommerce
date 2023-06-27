<?php

namespace Database\Seeders;

use App\Models\User;
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
        //
        $user = new User();
        $user->group_id = 1;
        $user->name = 'Iure';
        $user->email = 'iure@sysout.com.br';
        $user->cpf = '000.000.000-00';
        $user->password = bcrypt('sysout');
        $user->save();
    }
}
