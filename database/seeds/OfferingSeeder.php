<?php

use Illuminate\Database\Seeder;

class OfferingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offeringsTable = DB::table('offerings');

        $offeringsTable->truncate();
        $offeringsTable->insert([
            [
                'title' => 'Table',
                'price' => 300,
            ],
            [
                'title' => 'Book',
                'price' => 9,
            ],
            [
                'title' => 'Lamp',
                'price' => 15,
            ],
            [
                'title' => 'MacBook',
                'price' => 2000,
            ],
            [
                'title' => 'Sofa',
                'price' => 1500,
            ],
        ]);
    }
}
