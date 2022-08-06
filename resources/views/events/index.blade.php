@extends('_template')

@section('content')

    <section id="form" class="rounded-xl bg-white bg-opacity-70 px-6 py-7 w-[65%] mx-auto">
        <h2 class="text-3xl mb-6">
            <span class="font-vecna text-darkGold">Events</span>
            <a href="{{ route('events.create') }}" class="float-right text-lg py-2 px-4 bg-gold hover:bg-darkGold text-white">Create</a>
        </h2>
        @if ($events->count() > 0)
            <div class="grid md:grid-cols-9 gap-1">
                @foreach ($events as $event)
                    <div class="col-span-9 md:col-span-3">
                        <a href="{{ route('events.show', $event) }}" class="text-link underline">{{$event->title}}</a>
                    </div>
                    <div>{{ $event->month }} {{ $event->day }}, {{ $event->year }}</div>
                    <div class="col-span-9 md:col-span-1"></div>
                @endforeach
            </div>
        @else
            <p class="text-2xl text-center">There are no events to show.</p>
        @endif
    </section>
    
@endsection