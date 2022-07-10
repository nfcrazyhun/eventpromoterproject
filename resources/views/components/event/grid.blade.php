@props(['events'])

<div class="lg:grid lg:grid-cols-6">
    @foreach ($events as $event)
        <x-event.card
            :event="$event"
            class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"
        />
    @endforeach
</div>
