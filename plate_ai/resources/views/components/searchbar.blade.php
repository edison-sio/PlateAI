<div>
    <form action="/recipe" method="get" class="flex flex-row gap-2">
        <label class="input input-bordered flex items-center gap-2">
            <input type="text" name="search" class="grow" placeholder="Search" />
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 16 16"
                fill="currentColor"
                class="h-4 w-4 opacity-70">
                <path
                fill-rule="evenodd"
                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                clip-rule="evenodd" />
            </svg>
        </label>
        
        <button type="submit" class="btn text-white rounded-xl bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-700 hover:to-pink-700 border-none">Generate</button>
    </form>
    
    @if(isset($recipe))
        <div class="card bg-base-100 w-96 shadow-xl">
            <figure>
            <img
                src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                alt="Shoes" />
            </figure>
            <div class="card-body">
            <h2 class="card-title">{{ $recipe->title }}</h2>
            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">Buy Now</button>
            </div>
            </div>
        </div>
    @elseif(isset($error))
        <div>{{ $error }}</div>
    @endif
</div>