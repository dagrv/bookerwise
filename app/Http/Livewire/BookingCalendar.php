<?php

namespace App\Http\Livewire;

use Carbon\CarbonInterval;
use Livewire\Component;

class BookingCalendar extends Component
{
    public $calendarStartDate;

    public function mount()
    {
        $this->calendarStartDate = now();
    }

    public function getCalWeekIntervalProperty()
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