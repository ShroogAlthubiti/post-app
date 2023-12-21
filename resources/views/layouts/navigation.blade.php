@vite(['resources/css/app.css', 'resources/js/app.js'])

<nav lass="mx-auto flex max-w-7xl items-center p-8 lg:px-8">
    <div class=" mx-6 flex lg:flex-1 items-center	justify-between">
        <a href="/" class="m-8 p-4">
            <img class=" h-7 w-auto"
                src="https://cdn.iconscout.com/icon/free/png-256/free-message-672-675248.png?f=webp" alt="">
        </a>
        <div>
            <ul class="flex lg:flex-1 items-center">
                <li class="mx-6"><a href={{ url('/') }}>Home</a></li>
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <li><a href={{ url('/admin') }}>Dashboard</a></li>
                        @else
                            <li><a href={{ url('/post/posts') }}>Dashboard</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>

        <div class="flex mx-8">
            @if (Route::has('login'))
                @auth
                    <div class="mt-5 space-y-1">
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>
                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                        this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Log
                        in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <p class="ml-4 border-solid border-2 border-indigo-600 bg-black">Register</p>
                        </a>

                    @endif
            </div>
        @endauth
        @endif
</nav>
