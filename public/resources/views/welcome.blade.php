@extends('_template')

@section('content')    

<div class="grid grid-cols-1 md:grid-cols-2 w-[65%] mx-auto gap-6">
    <section id="contracts" class="rounded-xl bg-white bg-opacity-70 px-6 py-7">
        <h2 class="text-3xl mb-6">Contracts</h2>
        @foreach (App\Models\Contract::limit(5)->get() as $contract)
            <a href="{{ route('contracts.show', $contract) }}" class="block text-darkGold">{{ $contract->contractor }} ({{$contract->status}}) - {{$contract->platinum}}pp | {{$contract->electrum}}ep | {{$contract->gold}}gp | {{$contract->silver}}sp | {{$contract->copper}}cp</a>
        @endforeach
        <div class="my-4 w-[85%] mx-auto">
            <hr>
        </div>
        <p class="text-lg">Receivables in Active Contracts</p>
        <div class="grid grid-cols-5">
            <div>
                {{ App\Models\Contract::where('status', 'Active')->sum('platinum') }}pp
            </div>
            <div>
                {{ App\Models\Contract::where('status', 'Active')->sum('electrum') }}ep
            </div>
            <div>
                {{ App\Models\Contract::where('status', 'Active')->sum('gold') }}gp
            </div>
            <div>
                {{ App\Models\Contract::where('status', 'Active')->sum('silver') }}sp
            </div>
            <div>
                {{ App\Models\Contract::where('status', 'Active')->sum('copper') }}cp
            </div>
        </div>
    </section>
</div>

@endsection