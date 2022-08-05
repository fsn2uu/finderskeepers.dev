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
    <section id="calendar" class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        @php
            $months = [
                ['month' => 'HAMMER', 'moniker' => 'Deepwinter'],
                ['month' => 'ALTURIAK', 'moniker' => 'The Claw of Winter'],
                ['month' => 'CHES', 'moniker' => 'The Claw of Sunsets'],
                ['month' => 'TARSAKH', 'moniker' => 'The Claw of Storms'],
                ['month' => 'MIRTUL', 'moniker' => 'The Melting'],
                ['month' => 'KYTHORN', 'moniker' => 'The Time of Flowers'],
                ['month' => 'FLAMERULE', 'moniker' => 'Summertide'],
                ['month' => 'ELEASIAS', 'moniker' => 'Highsun'],
                ['month' => 'ELEINT', 'moniker' => 'The Fading'],
                ['month' => 'MARPENOTH', 'moniker' => 'Leaffall'],
                ['month' => 'UKTAR', 'moniker' => 'The rotting'],
                ['month' => 'NIGHTAL', 'moniker' => 'The Drawing Down'],
            ];
        @endphp
        @for ($i = 1; $i <= 12; $i++)
            <div class="rounded-xl bg-white bg-opacity-70 px-6 py-7">
                <h3 class="w-full block mb-16 text-darkGold">
                    <span class="float-left text-5xl">{{ $i }}</span>
                    <span class="float-right text-right">
                        <span class="text-2xl block text-right">{{ $months[$i-1]['month'] }}</span>
                        <span class="text-sm text-right"><em>{{ $months[$i-1]['moniker'] }}</em></span>
                    </span>
                </h3>
                <div class="grid grid-cols-10">
                    @for ($ii = 1; $ii <= 30; $ii++)
                        <div>{{ $ii }}</div>
                    @endfor
                </div>
            </div>
        @endfor
    </section>
</div>


@endsection