<?php

use Illuminate\Database\Seeder;

class TransportStatusSeeder extends Seeder
{
    private $transportStatus = ['Fine', 'Crushed', 'On Repair', 'Sold'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->transportStatus as $status) {
            DB::table('transport_status')->insert([
                'name' => $status,
            ]);
        }
    }
}
