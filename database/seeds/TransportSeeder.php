<?php

use Illuminate\Database\Seeder;


class TransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Transport::class, 10)->create();
    }
}
