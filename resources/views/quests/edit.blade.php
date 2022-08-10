@extends('_template')

@section('content')

    <section id="form" class="rounded-xl bg-white bg-opacity-70 px-6 py-7 w-[65%] mx-auto">
        <h2 class="text-3xl mb-6 font-vecna text-darkGold">Edit a Quest</h2>
        <form action="{{ route('quests.update', $quest) }}" method="POST">
            @csrf
            @method('PATCH')
            <label for="title" class="mb-4">
                Title
                <input type="text" name="title" id="title" value="{{ $quest->title }}" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
            </label>
            <label for="description" class="mb-4">
                Description
                <textarea name="description" id="description" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">{{ $quest->description }}</textarea>
            </label>
            <label for="location" class="mb-4">
                Location
                <input type="text" name="location" value="{{ $quest->location }}" id="location" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
            </label>
            <label for="giver" class="mb-4">
                Quest Giver
                <input type="text" name="giver" value="{{ $quest->giver }}" id="giver" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
            </label>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
                <label for="platinum" class="mb-4">
                    Proposed Platinum
                    <input type="text" name="platinum" value="{{ $quest->platinum }}" id="platinum" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </label>
                <label for="electrum" class="mb-4">
                    Proposed Electrum
                    <input type="text" name="electrum" value="{{ $quest->electrum }}" id="electrum" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </label>
                <label for="gold" class="mb-4">
                    Proposed Gold
                    <input type="text" name="gold" value="{{ $quest->gold }}" id="gold" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </label>
                <label for="silver" class="mb-4">
                    Proposed Silver
                    <input type="text" name="silver" value="{{ $quest->silver }}" id="silver" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </label>
                <label for="copper" class="mb-4">
                    Proposed Copper
                    <input type="text" name="copper" value="{{ $quest->copper }}" id="copper" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </label>
            </div>
            <label for="loot" class="mb-4">
                Loot / Goods
                <textarea name="loot" id="loot" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">{{ $quest->loot }}</textarea>
            </label>
            <label for="status" class="mb-4">
                Status
                <select name="status" id="status" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                    <option {{ $quest->status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option {{ $quest->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                    <option {{ $quest->status == 'Expired' ? 'selected' : '' }}>Expired</option>
                    <option {{ $quest->status == 'On Hold' ? 'selected' : '' }}>On Hold</option>
                </select>
            </label>
            <label for="comment" class="mb-4">
                Comment
                <textarea name="comment" id="comment" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" cols="30" rows="4"></textarea>
            </label>
            <input type="submit" value="Update" class="py-2 px-4 mt-2 bg-gold hover:bg-darkGold text-white">
        </form>
    </section>
    
@endsection