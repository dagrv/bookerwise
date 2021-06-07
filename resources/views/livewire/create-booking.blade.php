<h1 class="text-5xl text-center mt-4 font-extrabold text-transparent bg-clip-text bg-gradient-to-br from-gray-600 to-gray-900">
    Bookerwise
</h1>

<div class="bg-black max-w-sm mx-auto m-6 p-5 rounded-lg border-2 border-green-500">
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
    </form>
</div>