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
        $this->call(TransportTypeSeeder::class);
        $this->call(TransportStatusSeeder::class);
        $this->call(TransportSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
