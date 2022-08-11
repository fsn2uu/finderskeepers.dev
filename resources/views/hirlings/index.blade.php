@extends('_template')

@section('content')

    <section id="form" class="rounded-xl bg-white bg-opacity-70 px-6 py-7 w-[65%] mx-auto">
        <h2 class="text-5xl mb-6">
            <span class="font-vecna text-darkGold">Hirlings</span>
            <a href="{{ route('hirlings.create') }}" class="float-right text-lg py-2 px-4 bg-gold hover:bg-darkGold text-white">Create</a>
        </h2>
        @if ($hirlings->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-9 gap-1">
                @foreach ($hirlings as $hirling)
                    <div class="sm:col-span-2 col-span-9 md:col-span-3">
                        <a href="{{ route('hirlings.show', $hirling) }}" class="text-link underline">{{$hirling->name}}</a>
                    </div>
                    <div>{{ $hirling->job }}</div>
                    <div>{{ $hirling->status }}</div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div class="col-span-9 md:col-span-1"></div>
                @endforeach
            </div>
        @else
            <p class="text-2xl text-center">There are no hirlings to show.</p>
        @endif
    </section>
    
@endsection