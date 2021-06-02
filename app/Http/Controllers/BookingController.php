<?php

namespace App\Http\Controllers;

use App\Bookings\Filters\AppointmentFilter;
use App\Bookings\TimeSlotGenerator;
use App\Models\Schedule;
use App\Models\Service;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use App\Bookings\Filters\SlotsPassedTodayFilter;
use App\Bookings\Filters\UnavailabilityFilter;
use App\Models\Appointment;

class BookingController extends Controller
{
    public function __invoke()
    {
        $schedule = Schedule::find(3);
        $service = Service::find(1);
        $appointments = Appointment::where('date', '2021-05-30')->get();

        $slots = (new TimeSlotGenerator($schedule, $service))
            ->applyFilters([
                new SlotsPassedTodayFilter(),
                new UnavailabilityFilter($schedule->unavailabilities),
                new AppointmentFilter($appointments)
            ])
            ->get();

        return view('bookings.create', [
            'slots' => $slots
        ]);
    }
}