<?php

namespace Database\Seeders;

use App\Models\TimeSlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 24; $i++) {
            $is_active = true;
            if ($i < 7 || $i > 22) {
                $is_active = false;
            } // Loop untuk slot waktu dari jam 8 pagi sampai 10 malam
            TimeSlot::create([
                'start_time' => $i . ':00:00',
                'end_time' => ($i + 1) . ':00:00',
                'is_active' => $is_active,
            ]);
        }
    }
}
