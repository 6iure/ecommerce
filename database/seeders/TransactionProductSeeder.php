<?php

namespace Database\Seeders;

use App\Models\TransactionProduct;
use Illuminate\Database\Seeder;

class TransactionProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionProduct::factory()
            ->count(100)
            ->create();
    }
}
