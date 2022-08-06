@extends('_template')

@section('content')

    <section id="form" class="rounded-xl bg-white bg-opacity-70 px-6 py-7 w-[65%] mx-auto">
        <h2 class="text-3xl mb-6 font-vecna">Edit an Event</h2>
        <form action="{{ route('events.update', $event) }}" method="POST">
            @csrf
            @method('PATCH')
            <label for="title" class="mb-4">
                Title
                <input type="text" name="title" id="title" value="{{ $event->title }}" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
            </label>
            <div class="grid md:grid-cols-3 gap-6">
                <label for="month" class="mb-4">
                    Month
                    @php
                        $months = [
                            'HAMMER',
                            'ALTURIAK',
                            'CHES',
                            'TARSAKH',
                            'MIRTUL',
                            'KYTHORN',
                            'FLAMERULE',
                            'ELEASIAS',
                            'ELEINT',
                            'MARPENOTH',
                            'UKTAR',
                            'NIGHTAL',
                        ];
                    @endphp
                    <select name="month" id="month" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach ($months as $month)
                            <option value="{{ $month }}" {{ $event->month == $month ? 'selected' : '' }}>{{ $month }}</option>
                        @endforeach
                    </select>
                </label>
                <label for="day" class="mb-4">
                    Day
                    <select name="day" id="day" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                       @for ($i = 1; $i <= 30; $i++)
                           <option {{ $event->day == $i ? 'selected' : '' }}>{{ $i }}</option>
                       @endfor
                    </select>
                </label>
                <label for="year" class="mb-4">
                    Year
                    <select name="year" id="year" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                       @for ($i = 1; $i <= 5; $i++)
                           <option>{{ $i }}</option>
                       @endfor
                    </select>
                </label>
            </div>
            <label for="description" class="mb-4">
                Description
                <textarea name="description" id="description" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </label>
            <input type="submit" value="Update" class="py-2 px-4 mt-2 bg-gold hover:bg-darkGold text-white">
        </form>
    </section>
    
@endsection