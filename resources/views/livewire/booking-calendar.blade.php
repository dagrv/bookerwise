<div class="bg-white rounded-md">
    <div class="flex items-center justify-center relative">
        @if($this->weekIsGreaterThanCurrent)
            <button type="button" class="p-3 absolute left-0 top-0 outline-none" wire:click="decrementCalendarWeek">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
        @endif

        <div class="text-lg flex p-3">
            {{ $this->calendarStartDate->format('F (m)  Y') }}
        </div>

        <button type="button" class="p-3 absolute right-0 top-0" wire:click="incrementCalendarWeek">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>
    </div>

    <div class="flex justify-between items-center px-3 pb-3 border-b border-gray-300">
        @foreach($this->CalWeekInterval as $day)
            <button type="button text-center group cursor-pointer outline-none">
                <div class="text-md leading-none mb-2">
                    {{ $day->format('D') }}
                </div>

                <div class="text-md leading-none p-1 rounded-full w-9 h-9 text-white bg-black flex items-center justify-center">
                    {{ $day->format('d') }}
                </div>
            </button>
        @endforeach
    </div>

    <div class="max-h-52 overflow-y-scroll">
        <input type="radio" name="time" id="" value="" class="sr-only">
        <label for="" class="w-full text-md text-left focus:outline-none px-4 py-2 flex cursor-pointer items-center">
            <svg class="w-5 h-5 text-green-500 mr-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            1PM
        </label>

        <div class="text-center text-red-600 px-4 py-2">
            No availabilities
        </div>
    </div>
</div>
