<div class="bg-gray-200 max-w-sm mx-auto m-6 p-5 rounded-lg border-2 border-gray-400">
    <form>
        <label for="service" class="inline-block text-black font-medium mb-2">Select</label>
        <select name="service" id="service" class="bg-white h-10 w-full border-none rounded-md" wire:model="state.service">
            @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select>
    </form>
</div>