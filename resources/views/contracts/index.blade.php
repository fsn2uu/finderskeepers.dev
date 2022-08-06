@extends('_template')

@section('content')

    <section id="form" class="rounded-xl bg-white bg-opacity-70 px-6 py-7 w-[65%] mx-auto">
        <h2 class="text-3xl mb-6">
            <span class="font-vecna">Contracts</span>
            <a href="{{ route('contracts.create') }}" class="float-right text-lg py-2 px-4 bg-gold hover:bg-darkGold text-white">Create</a>
        </h2>
        @if ($contracts->count() > 0)
            <div class="grid grid-cols-9 gap-1">
                @foreach ($contracts as $contract)
                    <div class="col-span-9 md:col-span-3">
                        <a href="{{ route('contracts.show', $contract) }}" class="text-link underline">
                            {{ $contract->contractor }} ({{ $contract->status }})
                        </a>
                    </div>
                    <div>{{$contract->platinum}}pp</div>
                    <div>{{$contract->gold}}gp</div>
                    <div>{{$contract->electrum}}ep</div>
                    <div>{{$contract->silver}}sp</div>
                    <div>{{$contract->copper}}cp</div>
                    <div class="col-span-9 md:col-span-1"></div>
                @endforeach
            </div>
        @else
            <p class="text-2xl text-center">There are no contracts to show.</p>
        @endif
    </section>
    
@endsection