<?php

namespace App\Repositories;

use App\Models\Guest;

class GuestRepository
{
    public function findByQr($qrCode)
    {
        return Guest::where('qr_code', $qrCode)->first();
    }

    public function updateCheckin(Guest $guest, $totalAttendees)
    {
        $guest->update([
            'attendance_status' => true,
            'total_attendees' => $totalAttendees,
            'checkin_at' => now()
        ]);

        return $guest;
    }
}