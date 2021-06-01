<?php

namespace App\Http\Controllers;

use App\Bookings\TimeSlotGenerator;
use App\Models\Schedule;
use App\Models\Service;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use App\Bookings\Filters\SlotsPassedTodayFilter;

class BookingController extends Controller
{
    public function __invoke()
    {
        $schedule = Schedule::find(3);
        $service = Service::find(2);

        $slots = (new TimeSlotGenerator($schedule, $service))
            ->applyFilters([
                new SlotsPassedTodayFilter()
            ])
            ->get();

        return view('bookings.create', [
            'slots' => $slots
        ]);
    }
}