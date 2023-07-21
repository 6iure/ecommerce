<?php

namespace Database\Seeders;

use App\Models\StockOperation;
use Illuminate\Database\Seeder;

class StockOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StockOperation::factory()
            ->count(100)
            ->create();
    }
}
