<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Bookings\TimeSlotGenerator;
use App\Bookings\Filters\SlotsPassedTodayFilter;
use App\Bookings\Filters\UnavailabilityFilter;
use App\Bookings\Filters\AppointmentFilter;
use Carbon\Carbon;

class Employee extends Model
{
    use HasFactory;

    public function availableTimeSlots(Schedule $schedule, Service $service)
    {
        return (new TimeSlotGenerator($schedule, $service))
            ->applyFilters([
                new SlotsPassedTodayFilter(),
                new UnavailabilityFilter($schedule->unavailabilities),
                new AppointmentFilter($this->appointmentsForDate($schedule->date))
            ])->get();
    }

    public function appointmentsForDate(Carbon $date)
    {
        return $this->appointments()->whereDate('date', $date)->get();
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
