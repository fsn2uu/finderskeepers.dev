@extends('_template')

@section('content')    

<div class="grid grid-cols-1 md:grid-cols-2 w-[65%] mx-auto gap-6">
    <section id="contracts" class="rounded-xl col-span-2 md:col-span-1 bg-white bg-opacity-70 px-6 py-7">
        <h2 class="text-4xl mb-6 text-darkGold font-vecna">Contracts</h2>
        @foreach (App\Models\Contract::limit(5)->get() as $contract)
            <a href="{{ route('contracts.show', $contract) }}" class="block text-link underline">{{ $contract->contractor }} ({{$contract->status}}) - {{$contract->platinum}}pp | {{$contract->electrum}}ep | {{$contract->gold}}gp | {{$contract->silver}}sp | {{$contract->copper}}cp</a>
        @endforeach
        <div class="my-4 w-[85%] mx-auto">
            <hr>
        </div>
        <p class="text-lg text-darkGold">Receivables in Active Contracts</p>
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
    <section id="hirlings" class="rounded-xl bg-white bg-opacity-70 px-6 py-7 col-span-2 md:col-span-1">
        <h2 class="text-4xl mb-6 text-darkGold font-vecna">Hirlings</h2>
        @foreach (App\Models\Hirling::limit(5)->get() as $hirling)
            <a href="{{ route('hirlings.show', $hirling) }}" class="block text-link underline">{{ $hirling->name }} - {{ $hirling->job }}</a>
        @endforeach
    </section>
    <section id="quests" class="rounded-xl bg-white bg-opacity-70 px-6 py-7 col-span-2">
        <h2 class="text-4xl mb-6 text-darkGold font-vecna">Quests</h2>
        @php
            $i = 1;
        @endphp
        @foreach (App\Models\Quest::limit(5)->get() as $quest)
            <a href="{{ route('quests.show', $quest) }}" class="block text-link underline">{{ $quest->title }} ({{ $quest->platinum ?: '0' }}PP, {{ $quest->electrum ?: '0' }}EP, {{ $quest->gold ?: '0' }}GP, {{ $quest->silver ?: '0' }}SP, {{ $quest->copper ?: '0' }}CP, Loot: {{ $quest->loot ?: '*sigh*' }})</a>
            @if (App\Models\Quest::limit(5)->count() > 1 && $i < App\Models\Quest::limit(5)->count())
                <hr class="my-4">
            @endif
            @php
                $i++;
            @endphp
        @endforeach
    </section>
    <section id="calendar" class="col-span-2 mb-16 rounded-xl bg-white bg-opacity-70">
        <h2 class="text-4xl text-darkGold font-vecna mb-4 text-center mt-4">Calendar of Harptos</h2>
        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-8">
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
                <div class="px-6 py-7">
                    <h3 class="w-full block mb-16 text-darkGold">
                        <span class="float-left text-5xl font-vecna">{{ $i }}</span>
                        <span class="float-right text-right">
                            <span class="text-2xl block text-right font-vecna">{{ $months[$i-1]['month'] }}</span>
                            <span class="text-sm text-right"><em>{{ $months[$i-1]['moniker'] }}</em></span>
                        </span>
                    </h3>
                    <div class="grid grid-cols-10">
                        @for ($ii = 1; $ii <= 30; $ii++)
                            <div>
                                @if (App\Models\Event::where('month', $months[$i-1]['month'])->where('day', $ii)->count() > 0)
                                    <a href="{{ route('events.show', App\Models\Event::where('month', $months[$i-1]['month'])->where('day', $ii)->first()) }}" class="text-link underline">
                                @endif
                                {{ $ii }}
                                @if (App\Models\Event::where('month', $months[$i-1]['month'])->where('day', $ii)->count() > 0)
                                    </a>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
            @endfor
        </div>
    </section>
</div>


@endsection