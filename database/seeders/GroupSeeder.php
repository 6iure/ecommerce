<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $names = [
            'Manager',
            'Admin',
            'Customer'
        ];

        foreach ($names as $name) {
            $group = new Group();
            $group->name = $name;
            $group->save();

        }
    }
}
