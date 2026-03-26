<?php

namespace Database\Seeders;

use App\Models\Guest;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            Guest::create([
                'event_id' => 1,
                'category_id' => $i <= 5 ? 1 : 2, // VIP first 5
                'table_id' => $i <= 5 ? rand(1,5) : null,
                'name' => 'Guest ' . $i,
                'phone' => '08123' . rand(100000,999999),
                'qr_code' => Str::uuid(),
                'invitation_quota' => 2,
            ]);
        }
    }
}
