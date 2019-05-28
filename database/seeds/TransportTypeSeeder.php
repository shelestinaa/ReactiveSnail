<?php

use Illuminate\Database\Seeder;

class TransportTypeSeeder extends Seeder
{
    private $transportTypes = ['Human-powered', 'Animal-powered', 'Air', 'Rail'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->transportTypes as $type) {
            DB::table('transport_type')->insert([
                'name' => $type
            ]);
        }
    }
}
