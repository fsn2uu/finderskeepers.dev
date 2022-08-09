@extends('_template')

@section('content')
    
<section id="form" class="rounded-xl bg-white bg-opacity-70 px-6 py-7 w-[65%] mx-auto">
    <h2 class="text-3xl mb-6 text-darkGold">
        <span class="font-vecna">{{ $contract->contractor }} ({{ $contract->status }})</span>
        <a href="{{ route('contracts.edit', $contract) }}" class="float-right text-lg py-2 px-4 bg-gold hover:bg-darkGold text-white">Edit</a>
    </h2>
    <p class="mb-2 text-xl text-darkGold font-vecna">Description</p>
    <div class="mb-4">
        {!! nl2br($contract->description) !!}
    </div>
    <p class="mb-2 text-xl text-darkGold font-vecna">Money</p>
    <div class="grid grid-cols-6 gap-2 mb-4">
        <div>{{ $contract->platinum }}pp</div>
        <div>{{ $contract->electrum }}ep</div>
        <div>{{ $contract->gold }}gp</div>
        <div>{{ $contract->silver }}sp</div>
        <div>{{ $contract->copper }}cp</div>
    </div>
    <p class="mb-2 text-xl text-darkGold font-vecna">Other Loot</p>
    <p class="mb-4">{{ $contract->loot ?: 'None' }}</p>
    <p class="mb-2 text-xl text-darkGold font-vecna">Comments</p>
    <form action="{{ route('contracts.update', $contract) }}" method="post" class="mb-6">
        @csrf
        @method('PATCH')
        <label for="comment" class="mb-4">
            Comment
            <textarea name="comment" id="comment" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" cols="30" rows="4"></textarea>
        </label>
        <input type="submit" value="Create" class="py-2 px-4 mt-2 bg-gold hover:bg-darkGold text-white">
    </form>
    @foreach ($contract->comments as $comment)
    <div class="grid grid-cols-1 gap-4 mb-4">
        <p class="text-xl text-darkGold font-vecna">{{ \Carbon\Carbon::parse($comment->created_at)->format('D, M d, Y') }}</p>
        <p class="">{!! $comment->body !!}</p>
        </div>
    @endforeach
</section>

@endsection