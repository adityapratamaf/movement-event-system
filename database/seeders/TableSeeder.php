<?php

namespace Database\Seeders;

use App\Models\Table;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            Table::create([
                'event_id' => 1,
                'name' => 'VIP ' . $i,
                'capacity' => 10
            ]);
        }
    }
}
