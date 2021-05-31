<?php

namespace App\Http\Controllers;

use App\Bookings\TimeSlotGenerator;
use App\Models\Schedule;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __invoke()
    {
        $schedule = Schedule::find(3);

        $slots = (new TimeSlotGenerator($schedule))->get();

        return view('bookings.create', [
            'slots' => $slots
        ]);
    }
}