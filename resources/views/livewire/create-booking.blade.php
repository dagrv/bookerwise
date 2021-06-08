<div class="bg-black max-w-sm mx-auto m-6 p-5 rounded-lg">
    <form>
        <div class="mb-6">
            <label for="service" class="inline-block text-white font-medium mb-2">Select Service</label>
            <select name="service" id="service" class="bg-white h-10 w-full border-none rounded-md" wire:model="state.service">
                <option value="">Service</option>

                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6 {{ !$employees->count() ? 'opacity-25' : '' }}">
            <label for="employee" class="inline-block text-white font-medium mb-2">Select Employee</label>
            <select name="employee" id="employee" class="bg-white h-10 w-full border-none rounded-md" wire:model="state.employee" {{ !$employees->count() ? 'disabled="disabled"' : ''}}>
                <option value="">Employee</option>

                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-6 {{ !$this->selectedService || !$this->selectedEmployee ? 'opacity-25' : '' }}">
            <label for="employee" class="inline-block text-white font-medium mb-2">Select Appointment Time</label>
        </div>

        <div class="bg-white rounded-md">
            <div class="flex items-center justify-center relative">
                <button type="button" class="p-3 absolute left-0 top-0 outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>

                <div class="text-lg flex p-3">
                    June 2021
                </div>

                <button type="button" class="p-3 absolute right-0 top-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>

            <div class="flex justify-between items-center px-3 pb-3 border-b border-gray-300">
                <button type="button text-center group cursor-pointer outline-none">
                    <div class="text-md leading-none mb-2">
                        Mon
                    </div>

                    <div class="text-md leading-none p-1 rounded-full w-9 h-9 text-white bg-red-500 flex items-center justify-center">
                        7
                    </div>
                </button>
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
    </form>
</div>