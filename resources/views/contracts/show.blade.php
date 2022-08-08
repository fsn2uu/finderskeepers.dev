@extends('_template')

@section('content')
    
<section id="form" class="rounded-xl bg-white bg-opacity-70 px-6 py-7 w-[65%] mx-auto">
    <h2 class="text-3xl mb-6 text-darkGold">
        <span class="font-vecna">{{ $contract->contractor }} ({{ $contract->status }})</span>
        <a href="{{ route('contracts.edit', $contract) }}" class="float-right text-lg py-2 px-4 bg-gold hover:bg-darkGold text-white">Edit</a>
    </h2>
    <p class="mb-2 text-xl text-darkGold">Description</p>
    <div class="mb-4">
        {!! nl2br($contract->description) !!}
    </div>
    <p class="mb-2 text-xl text-darkGold">Money</p>
    <div class="grid grid-cols-6 gap-2 mb-4">
        <div>{{ $contract->platinum }}pp</div>
        <div>{{ $contract->electrum }}ep</div>
        <div>{{ $contract->gold }}gp</div>
        <div>{{ $contract->silver }}sp</div>
        <div>{{ $contract->copper }}cp</div>
    </div>
    <p class="mb-2 text-xl text-darkGold">Other Loot</p>
    <p class="mb-4">{{ $contract->loot ?: 'None' }}</p>
</section>

@endsection