<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventOrganizer;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $eo = EventOrganizer::create([
            'name' => 'Luxury Wedding Organizer',
            'contact' => '08123456789',
            'person_in_charge' => 'Andi'
        ]);

        Event::create([
            'name' => 'Wedding Andi & Sinta',
            'event_date' => now(),
            'location' => 'Hotel Mulia',
            'event_organizer_id' => $eo->id
        ]);
    }
}
