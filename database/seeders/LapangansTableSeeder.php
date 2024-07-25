<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lapangan;

class LapangansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lapangan::create([
            'name' => 'Lapangan 1',
            'description' => 'Lapangan indoor dengan lantai vinyl',
            'price_per_hour' => 50000,
        ]);

        Lapangan::create([
            'name' => 'Lapangan 2',
            'description' => 'Lapangan outdoor dengan rumput sintetis',
            'price_per_hour' => 75000,
        ]);
    }
}
