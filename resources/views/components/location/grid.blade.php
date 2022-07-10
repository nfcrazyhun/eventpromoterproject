@props(['locations'])

<div class="lg:grid lg:grid-cols-6">
    @foreach ($locations as $location)
        <x-location.card
            :location="$location"
            class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"
        />
    @endforeach
</div>
