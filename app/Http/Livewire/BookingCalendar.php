<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Livewire\Component;

class BookingCalendar extends Component
{
    public $date;
    public $calendarStartDate;
    public $employee;
    public $service;

    public function mount()
    {
        $this->calendarStartDate = now();
        // $this->setDate(now()->timestamp);
    }

    public function getEmployeeScheduleProperty()
    {
        return $this->employee->schedules()
            ->whereDate('date', $this->calendarSelectedDateObject)
            ->first();
    }

    public function getCalendarSelectedDateObjectProperty()
    {
        return Carbon::createFromTimestamp($this->date);
    }

    public function setDate($timestamp)
    {
        $this->date = $timestamp;

        dd($this->employeeSchedule);

        // 19
    }

    public function getCalendarWeekIntervalProperty()
    {
        return CarbonInterval::days(1)->toPeriod(
            $this->calendarStartDate,
            $this->calendarStartDate->clone()->addWeek()
        );
    }

    public function incrementCalendarWeek()
    {
        $this->calendarStartDate->addWeek()->addDay();
    }

    public function decrementCalendarWeek()
    {
        $this->calendarStartDate->subWeek()->subDay();
    }

    public function getWeekIsGreaterThanCurrentProperty()
    {
        return $this->calendarStartDate->gt(now());
    }

    public function render()
    {
        return view('livewire.booking-calendar');
    }
}