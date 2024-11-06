<x-layout>
    <div class="h-screen w-screen flex flex-col justify-center items-center">
        <form action="/login" method="post" class="flex flex-col justify-center items-center gap-3 w-1/4">
            <label class="card-title">Login</label>
            <label class="input input-bordered flex items-center gap-2 w-full">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 16 16"
                  fill="currentColor"
                  class="h-4 w-4 opacity-70">
                  <path
                    d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                  <path
                    d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                </svg>
                <input type="text" class="grow" placeholder="Email" />
              </label>
              <label class="input input-bordered flex items-center gap-2 w-full">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 16 16"
                  fill="currentColor"
                  class="h-4 w-4 opacity-70">
                  <path
                    fill-rule="evenodd"
                    d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                    clip-rule="evenodd" />
                </svg>
                <input type="password" class="grow" placeholder="Password" />
            </label>
            <div class="w-full flex flex-col gap-3">
                <button type="submit" class="btn btn-primary w-full">Login</button>
                <a href={{ route('register') }} class="flex-auto">Don't have an account yet?</a>
            </div>
        </form>
        <div class="divider w-1/4 self-center">or</div>
        <div class="flex flex-col w-1/4 items-center justify-center">
            <form action="/api/auth/redirect/google" method="get" class="flex bg-white w-full items-center justify-center">
                <button class='btn btn-outline rounded-full w-full'>Login with Google</button>
            </form>
        </div>
    </div>
</x-layout>