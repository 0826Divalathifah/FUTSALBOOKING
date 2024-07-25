<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation::create([
            'user_id' => 1,
            'lapangan_id' => 1,
            'start_time' => now(),
            'end_time' => now()->addHours(2),
            'total_price' => 100000,
        ]);
    }
}
