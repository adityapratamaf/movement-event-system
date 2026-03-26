<?php

namespace App\Http\Controllers;

use App\Models\Guest;

class DisplayController extends Controller
{
    public function show($id)
    {
        $guest = Guest::with(['category','table'])->findOrFail($id);

        return view('display.show', compact('guest'));
    }
}
