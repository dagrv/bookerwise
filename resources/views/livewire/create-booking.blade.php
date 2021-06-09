<div class="bg-black max-w-sm mx-auto m-6 p-5 rounded-lg">
    <form>
        <div class="mb-6">
            <label for="service" class="inline-block text-white font-medium mb-2">Select Service</label>
            <select name="service" id="service" class="bg-white h-10 w-full border-none rounded-md" wire:model="state.service">
                <option value="service">Service</option>

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

            <!-- Livewire Binding -->
            <livewire:booking-calendar :service="$this->selectedService" :employee="$this->selectedEmployee" :key="optional($this->selectedEmployee)->id" />
        </div>
    </form>
</div>