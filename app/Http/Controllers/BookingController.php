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
use App\Models\Employee;

class BookingController extends Controller
{
    public function __invoke()
    {
        $schedule = Schedule::find(3);
        $service = Service::find(1);

        $employee = Employee::find(1);
        $slots = $employee->availableTimeSlots($schedule, $service);

        return view('bookings.create', [
            'slots' => $slots
        ]);
    }
}