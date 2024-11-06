

<html>
    <head>
        <title>PlateAI</title>
        @vite(['resources/css/app.css', 'resourcces/js/app.js'])
    </head>
    <body class="h-screen w-screen">
        <div class="navbar bg-base-100 fixed">
            <div class="flex-1">
              <a class="btn btn-ghost text-xl">PlateAI</a>
            </div>
            <div class="flex-none gap-2">
              <div class="form-control">
                <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
              </div>
              @if (auth()->check())
                <x-avatar></x-avatar>
              @else
                <a class="btn bg-orange-400 hover:bg-orange-500 text-white border-none" href={{ route('login') }}>Login</a>
              @endif
            </div>
          </div>
        {{ $slot }}
    </body>
</html>