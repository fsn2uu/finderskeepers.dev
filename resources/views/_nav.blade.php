
<nav class="relative w-full p-6 bg-white bg-opacity-70 mb-10">
    <div class="flex items-center justify-between">
        <div class="p-2">
            <a href="{{ route('dashboard') }}">
                <div class="grid grid-cols-2 divide-x text-darkGold">
                    <div class="text-5xl font-vecna">
                        FK
                    </div>
                    <div class="">
                        <p class="pl-2">Finders</p>
                        <p class="pl-2">Keepers</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="hidden md:flex space-x-6 items-baseline">
            <a href="{{ route('contracts.index') }}" class="nav">Contracts</a>
            <a href="{{ route('events.index') }}" class="nav">Events</a>
            <a href="{{ route('hirlings.index') }}" class="nav">Hirlings</a>
            <a href="{{ route('quests.index') }}" class="nav">Quests</a>
            
        </div>
        <button id="menu-btn" class="block z-50 hamburger md:hidden focus:outline-none">
            <span class="hamburger-top"></span>
            <span class="hamburger-middle"></span>
            <span class="hamburger-bottom"></span>
        </button>
    </div>
    
    <!-- Mobile Menu -->
    <div class="md:hidden">
        <div id="menu" class="absolute flex-col items-center hidden self-end py-8 mt-10 space-y-6 font-bold bg-white sm:w-auto sm:self-center left-6 right-6 drop-shadow-md">
            <a href="{{ route('contracts.index') }}" class="nav">Contracts</a>
            <a href="{{ route('events.index') }}" class="nav">Events</a>
            <a href="{{ route('hirlings.index') }}" class="nav">Hirlings</a>
            <a href="{{ route('quests.index') }}" class="nav">Quests</a>
        </div>
    </div>
</nav>
