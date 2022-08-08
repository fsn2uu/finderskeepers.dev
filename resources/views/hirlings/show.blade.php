@extends('_template')

@section('content')
    
<section id="data" class="rounded-xl bg-white bg-opacity-70 px-6 py-7 w-[65%] mx-auto">
    <h2 class="text-3xl mb-6 text-darkGold">
        <span class="font-vecna">{{ $hirling->name }}, {{ $hirling->race }} {{ $hirling->subrace ? '('.$hirling->subrace.')' : '' }}</span>
        <a href="{{ route('hirlings.edit', $hirling) }}" class="float-right text-lg py-2 px-4 bg-gold hover:bg-darkGold text-white">Edit</a>
    </h2>

    <h3 class="text-xl text-darkGold font-vecna mb-3">Status</h3>
    <p class="mb-4">{{ $hirling->status }}</p>

    <h3 class="text-xl text-darkGold font-vecna mb-3">Job</h3>
    <p class="mb-4">{{ $hirling->job }}</p>

    <h3 class="text-xl text-darkGold font-vecna mb-3">Description</h3>
    {!! $hirling->description !!}
</section>

@endsection