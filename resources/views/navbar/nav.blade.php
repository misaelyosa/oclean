

<nav class="bg-white dark:bg-gray-900 fixed max-w-6xl mx-auto top-0 left-0 right-0 rounded-full mt-2 border-b border-2 dark:bg-gray-950 border-gray-200 dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-1">
  <a href="" class="flex items-center space-x-2 rtl:space-x-reverse">
      <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
      <span class="self-center text-2xl text-center font-semibold whitespace-nowrap dark:text-white">Welcome, {{auth()->user()->name}} !</span>
  </a>
  <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
    
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-green-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4  mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li>
        <a href="#" class="block py-2 px-3 {{$title === "home" ? " rounded text-white md:text-green-700 hover:text-green-700  dark:text-gray-950   md:dark:text-green-500" : "text-gray-900 rounded hover:bg-green-700 md:hover:bg-transparent   dark:text-gray-950  md:hover:text-green-700 md:p-0 md:dark:hover:text-blue-500  dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"}}">Home</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-green-700 md:hover:bg-transparent   dark:text-gray-950  md:hover:text-green-700  md:dark:hover:text-blue-500  dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Shop</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-green-700 md:hover:bg-transparent  dark:text-black  md:hover:text-green-700  md:dark:hover:text-blue-500  dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Penjemputan Sampah</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-green-700 md:hover:bg-transparent dark:text-black md:hover:text-green-700 m md:dark:hover:text-blue-500  dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Customer Service</a>
      </li>
      <li>
      @if (Auth::check())
        
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class=" py-2 px-3 bg-green-500 rounded hover:bg-green-700 text-center text-white">Logout</button>
        </form>
    @else
        <button> <a href="/login">Login</a></button>
    @endif
      </li>
    </ul>
  </div>
  </div>
</nav>
