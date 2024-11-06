<x-nav>
    <div class="h-screen w-screen flex flex-col justify-center items-center gap-10">
        @if (auth()->check())
            <div class='text-5xl font-bold'>Welcome, {{ Auth::user()->name }}</div>
        @else
            <div class='text-5xl font-bold'>Welcome to PlateAI!</div>
        @endif
        <x-searchbar></x-searchbar>
        <div class="w-screen flex justify-center items-center">
            @if(isset($recipe))
                <div class="card bg-base-100 w-1/2 shadow-xl">
                    <div class="card-body">
                    <h2 class="card-title">{{ $recipe["title"] }}</h2>
                    <div class="stat-title text-lg">Ingredients</div>
                        <ui>
                            @foreach ($recipe["ingredients"] as $ingredient)
                                <li>{{ $ingredient }}</li>
                            @endforeach
                        </ui>
                        <div class="stat-title text-lg">instructions</div>
                        <ui>
                            @foreach ($recipe["instructions"] as $instruction)
                                <li>{{ $instruction }}</li>
                            @endforeach
                        </ui>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">View</button>
                    </div>
                    </div>
                </div>
            @elseif(isset($error))
                <div>{{ $error }}</div>
            @endif
        </div>
    </div>
</x-nav>