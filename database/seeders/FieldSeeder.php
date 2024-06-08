<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data fields
        Field::create([
            'name' => 'Lapangan A',
            'desc' => 'Lapangan vinyl',
            'price_per_hour' => 100000,
        ]);

        Field::create([
            'name' => 'Lapangan B',
            'desc' => 'Lapangan Rumput Sintetis',
            'price_per_hour' => 120000,
        ]);

        Field::create([
            'name' => 'Lapangan C',
            'desc' => 'Lapangan Rumput Sintetis',
            'price_per_hour' => 120000,
        ]);
    }
}
