@props(['performers'])

<div class="lg:grid lg:grid-cols-6">
    @foreach ($performers as $performer)
        <x-performer.card
            :performer="$performer"
            class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"
        />
    @endforeach
</div>
