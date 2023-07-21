<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(CategorySeeder::class);

        $this->call(ProductSeeder::class);

        $this->call(TransactionSeeder::class);

        $this->call(TransactionProductSeeder::class);

        $this->call(StockOperationSeeder::class);

    }
}
