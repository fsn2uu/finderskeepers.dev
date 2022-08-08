@extends('_template')

@section('content')

    <section id="form" class="rounded-xl bg-white bg-opacity-70 px-6 py-7 w-[65%] mx-auto">
        <h2 class="text-3xl mb-6 font-vecna text-darkGold">Create a Hirling</h2>
        <form action="{{ route('hirlings.store') }}" method="POST">
            @csrf
            <label for="name" class="mb-4">
                Name
                <input type="text" name="name" id="name" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
            </label>
            <label for="race" class="mb-4">
                Race
                <select name="race" id="race" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                    <option value=""></option>
                </select>
            </label>
            <label for="subrace" class="mb-4">
                Sub-Race
                <select name="subrace" id="subrace" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </select>
            </label>
            <label for="description" class="mb-4">
                Description
                <textarea name="description" id="description" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </label>
            <label for="job" class="mb-4">
                Job
                <input type="text" name="job" id="job" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
            </label>
            <label for="status" class="mb-4">
                Status
                <select name="status" id="status" class="shadow appearance-none border border-[#ccc] mb-2 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                    <option>Employed</option>
                    <option>Fired</option>
                    <option>Quit</option>
                </select>
            </label>
            <input type="submit" value="Create" class="py-2 px-4 mt-2 bg-gold hover:bg-darkGold text-white">
        </form>
    </section>
    
@endsection

@push('scripts')

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        const raceSelect = document.getElementById('race')
        const subRaceSelect = document.getElementById('subrace')

        var options = {method: 'GET', url: 'https://www.dnd5eapi.co/api/races/'};

        axios.request(options).then(function (response) {
                response.data.results.forEach(element => {
                    const opt = document.createElement('option')
                    opt.value = element.index
                    const optText = document.createTextNode(element.name)
                    opt.appendChild(optText)
                    raceSelect.appendChild(opt)
                })
            }).catch(function (error) {
                console.error(error);
            });

        var options = {method: 'GET', url: 'https://www.dnd5eapi.co/api/monsters/'};

        axios.request(options).then(function (response) {
                response.data.results.forEach(element => {
                    const opt = document.createElement('option')
                    opt.index = element.index
                    const optText = document.createTextNode(element.name)
                    opt.appendChild(optText)
                    raceSelect.appendChild(opt)
                })
            }).catch(function (error) {
                console.error(error);
            });

        raceSelect.addEventListener('change', function(e){
            removeAllChildNodes(subRaceSelect)
            var options = {method: 'GET', url: 'https://www.dnd5eapi.co/api/races/'+this.value+'/subraces/'};

            axios.request(options).then(function (response) {
                const opt = document.createElement('option')
                opt.index = ''
                subRaceSelect.appendChild(opt)
                response.data.results.forEach(element => {
                    const opt = document.createElement('option')
                    opt.index = element.index
                    const optText = document.createTextNode(element.name)
                    opt.appendChild(optText)
                    subRaceSelect.appendChild(opt)
                })
                }).catch(function (error) {
                    console.error(error);
                });
        })

        function removeAllChildNodes(parent) {
            while (parent.firstChild) {
                parent.removeChild(parent.firstChild);
            }
        }

    </script>
    
@endpush