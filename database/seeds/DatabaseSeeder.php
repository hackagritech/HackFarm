<?php

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
        $this->call(UserSeeder::class);

        if (config('variables.WITH_FAKER')) {
            $this->call(OperationSeeder::class);
        }
    }
}
