<?php

namespace App\Http\Controllers;

use App\Bookings\TimeSlotGenerator;
use App\Models\Schedule;
use App\Models\Service;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use App\Bookings\Filters\SlotsPassedTodayFilter;
use App\Bookings\Filters\UnavailabilityFilter;

class BookingController extends Controller
{
    public function __invoke()
    {
        $schedule = Schedule::find(3);
        $service = Service::find(1);

        $slots = (new TimeSlotGenerator($schedule, $service))
            ->applyFilters([
                new SlotsPassedTodayFilter(),
                new UnavailabilityFilter($schedule->unavailabilities)
            ])
            ->get();

        return view('bookings.create', [
            'slots' => $slots
        ]);
    }
}