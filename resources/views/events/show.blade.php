@extends('_template')

@section('content')
    
<section id="data" class="rounded-xl bg-white bg-opacity-70 px-6 py-7 w-[65%] mx-auto">
    <h2 class="text-3xl mb-6 text-darkGold">
        <span class="font-vecna">{{ $event->title }} - {{ $event->month }} {{ $event->day }}</span>
        <a href="{{ route('events.edit', $event) }}" class="float-right text-lg py-2 px-4 bg-gold hover:bg-darkGold text-white">Edit</a>
    </h2>
    <h3 class="text-xl text-darkGold font-vecna">Description</h3>
    {!! $event->description !!}
    <p class="mb-2 text-xl mt-4 text-darkGold font-vecna">Comments</p>
    <form action="{{ route('events.update', $event) }}" method="post" class="mb-6">
        @csrf
        @method('PATCH')
        <label for="comment" class="mb-4">
            Comment
            <textarea name="comment" id="comment" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" cols="30" rows="4"></textarea>
        </label>
        <input type="submit" value="Create" class="py-2 px-4 mt-2 bg-gold hover:bg-darkGold text-white">
    </form>
    @foreach ($event->comments as $comment)
    <div class="grid grid-cols-1 gap-4 mb-4">
        <p class="text-xl text-darkGold font-vecna">{{ \Carbon\Carbon::parse($comment->created_at)->format('D, M d, Y') }}</p>
        <p class="">{!! $comment->body !!}</p>
        </div>
    @endforeach
</section>

@endsection