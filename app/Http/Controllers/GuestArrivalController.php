<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuestArrivalService;

class GuestArrivalController extends Controller
{
    protected $service;

    public function __construct(GuestArrivalService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('checkin.index');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'qr_code' => 'required',
                'total_attendees' => 'required|integer|min:1'
            ]);

            $guest = $this->service->handleArrival(
                $request->qr_code,
                $request->total_attendees
            );

            return redirect('/display/' . $guest->id);

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}