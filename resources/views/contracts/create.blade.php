@extends('_template')

@section('content')

    <section id="form" class="rounded-xl bg-white bg-opacity-70 px-6 py-7 w-[65%] mx-auto">
        <h2 class="text-5xl mb-6 font-vecna text-darkGold">Create a Contract</h2>
        <form action="{{ route('contracts.store') }}" method="POST">
            @csrf
            <label for="contractor" class="mb-4">
                Contractor Name
                <input type="text" name="contractor" id="contractor" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
            </label>
            <label for="description" class="mb-4">
                Description
                <textarea name="description" id="description" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </label>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
                <label for="platinum" class="mb-4">
                    Proposed Platinum
                    <input type="text" name="platinum" id="platinum" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </label>
                <label for="electrum" class="mb-4">
                    Proposed Electrum
                    <input type="text" name="electrum" id="electrum" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </label>
                <label for="gold" class="mb-4">
                    Proposed Gold
                    <input type="text" name="gold" id="gold" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </label>
                <label for="silver" class="mb-4">
                    Proposed Silver
                    <input type="text" name="silver" id="silver" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </label>
                <label for="copper" class="mb-4">
                    Proposed Copper
                    <input type="text" name="copper" id="copper" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </label>
            </div>
            <label for="loot" class="mb-4">
                Proposed Loot / Goods
                <textarea name="loot" id="loot" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </label>
            <label for="status" class="mb-4">
                Status
                <select name="status" id="status" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                    <option>Lead</option>
                    <option>Active</option>
                    <option>Closed</option>
                    <option>Failed</option>
                    <option>Expired</option>
                </select>
            </label>
            <input type="submit" value="Create" class="py-2 px-4 mt-2 bg-gold hover:bg-darkGold text-white">
        </form>
    </section>
    
@endsection