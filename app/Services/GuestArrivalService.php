<?php

namespace App\Services;

use App\Repositories\GuestRepository;
use App\Models\GuestLog;
use Exception;

class GuestArrivalService
{
    protected $guestRepository;

    public function __construct(GuestRepository $guestRepository)
    {
        $this->guestRepository = $guestRepository;
    }

    public function handleArrival($qrCode, $totalAttendees)
    {
        $guest = $this->guestRepository->findByQr($qrCode);

        if (!$guest) {
            throw new Exception('Guest not found');
        }

        if (!$guest->qr_code) {
            throw new Exception('Invalid QR Code');
        }

        if ($guest->attendance_status) {
            throw new Exception('Guest already checked in');
        }

        if ($totalAttendees > $guest->invitation_quota) {
            throw new Exception('Exceeds invitation quota');
        }

        // Update guest
        $this->guestRepository->updateCheckin($guest, $totalAttendees);

        // Log
        GuestLog::create([
            'guest_id' => $guest->id,
            'checkin_time' => now(),
            'total_attendees' => $totalAttendees,
            'method' => 'qr'
        ]);

        return $guest;
    }
}