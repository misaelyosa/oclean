<nav id="navbar"
    class="bg-white fixed dark:bg-gray-900 max-w-6xl mx-auto top-0 left-0 right-0 rounded-xl mt-2 border-2 border-gray-200 dark:border-gray-600 shadow-md">
    <div class=" flex flex-wrap items-center justify-between ">
        <!-- Logo dan Welcome Text -->
        <a href="{{ route('jumlahSampah.index') }}" class="flex items-center space-x-2 rtl:space-x-reverse ms-4">
            <img src="{{ asset('oclean-logo.png') }}" class="h-8 " alt="Logo">
            @if (Auth::check())
                <span class="text-2xl font-semibold whitespace-nowrap dark:text-white">Welcome,
                    {{ auth()->user()->name }} !</span>
            @else
                <span class="text-2xl font-semibold whitespace-nowrap dark:text-white">Welcome Guest !</span>
            @endif

        </a>

        <!-- Hamburger Button -->
        <button data-collapse-toggle="navbar-sticky" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-green-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-sticky" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14"
                aria-hidden="true">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <!-- Navigation Menu -->
        <div class="items-center justify-between hidden  md:flex " id="navbar-sticky">
            <ul
                class="mb-4 me-4 my-4 flex flex-col justify-center items-center font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-2 md:flex-row md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                <li class="flex justify-center items-center">
                    @if (Auth::check())
                        <a href="{{ route('jumlahSampah.index') }}"
                            class=" {{ $title === 'home' ? 'text-green-700 dark:text-green-500' : 'text-gray-900 dark:text-gray-400' }} block py-1 px-2 text-center rounded hover:bg-green-700 hover:text-white md:hover:bg-transparent md:hover:text-green-700 dark:hover:bg-gray-700 md:dark:hover:text-green-500">
                            Jumlah Sampah
                        </a>
                    @else
                        <a href="{{ route('home') }}"
                            class=" {{ $title === 'home' ? 'text-green-700 dark:text-green-500' : 'text-gray-900 dark:text-gray-400' }}  block py-1 px-2  text-center rounded hover:bg-green-700 hover:text-white md:hover:bg-transparent md:hover:text-green-700 dark:hover:bg-gray-700 md:dark:hover:text-green-500">
                            Home
                        </a>
                    @endif
                </li>
                <li class="flex justify-center items-center">
                    <a href="{{ route('produks.index') }}"
                        class = "{{ $title === 'shop' ? 'text-green-700 dark:text-green-500' : 'text-gray-900 dark:text-gray-400' }} block py-1 px-2  text-center rounded hover:bg-green-700 hover:text-white md:hover:bg-transparent md:hover:text-green-700 dark:hover:bg-gray-700 md:dark:hover:text-green-500">
                        Produk Hasil
                    </a>
                </li>
                <li class="flex items-center">
                    @if (Auth::check())
                        <form action="/logout" method="post" class="">
                            @csrf
                            <button type="submit"
                                class="py-1 px-2 text-center bg-green-500 text-white rounded hover:bg-green-700">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="/login"
                            class=" py-1 px-2 text-center bg-green-700 text-white rounded hover:bg-green-500">
                            Login
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
