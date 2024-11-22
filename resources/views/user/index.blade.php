@extends('base.base')
@include('navbar.nav')
@section('content')
   <div class="flex flex-col place-content-center items-center pt-28 w-full ">
        <div class="fade sc mb-4 fade border border-2  border-r-green-600 border-l-green-600 flex flex-col md:flex-row place-content-center items-center px-8 py-4 rounded-xl ">
        <img src="{{ asset('assets/profile.png') }}" class="w-20 md:me-4 mx-4" alt="">
            <div class="">
                <p class="text-xl font-bold text-2xl my-2 md:text-left text-center md:my-0 md:text-4xl">HELLO, <span class="text-green-800">{{auth()->user()->name}}</span> !</p>      
                <p class="text-gray-800 text-base md:text-left text-center my-1 md:my-0 md:text-lg">You have <span class="text-green-500 font-bold">30</span> points</p>    
                <p class="text-gray-400 text-sm mb-2 md:mb-0 md:text-left text-center md:text-base"><span class="text-red-500 font-bold "> 5 </span>points expiring</p>    
            </div>     
            <a href="{{route('user.shop')}}" class="md:flex block ms-4 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Redeem Now</a>
        </div>
        <div class="fade sc rounded-xl bg-gray-900 bg-opacity-80 py-14 mx-4 flex flex-col md:flex-row text-center w-full justify-center items-center bghome">
            <div class="mx-4 my-4 md:my-4 border border-white bg-white rounded-xl p-8">
                <p>Days Active:</p>
                <p><span class="text-green-500 font-bold "> 60 </span> Day(s)</p>
            </div>
            <div class="fade  sc mx-4 my-4 md:my-4 border border-white bg-white rounded-xl p-8">
                <p>Total O-Trash/month:</p>
                <p><span class="text-green-500 font-bold"> 100  </span> Kg(s)</p>
            </div>
            <div class="fade sc mx-4 my-4 md:my-4 border border-white bg-white rounded-xl p-8">
                <p>Todays Trash:</p>
                <p><span class="text-green-500 font-bold"> 4 </span> Kg(s)</p>
            </div>
            <div class="fade sc mx-4 my-4 md:my-4 border border-white bg-white rounded-xl p-8">
                <p>Total Points Collected:</p>
                <p><span class="text-green-500 font-bold "> 600 </span> Point(s)</p>
            </div>
            <div class="fade sc mx-4 my-4 md:my-4 border border-white bg-white rounded-xl p-8">
                <p>Total Point Redeemed:</p>
                <p><span class="text-red-500 font-bold "> 40 </span> Point(s)</p>
            </div>
        </div>
        <div class="sc my-4 flex justify-between w-full mx-4 py-2 rounded-2xl bg-green-700 text-white">
            <div class="ms-8">
               <p class="text-xl md:text-2xl font-bold">Workshop & Seminar</p>
            </div>
            <div class="sc me-8 place-content-center ">
            <i class="fa fa-arrow-right text-md md:text-xl"></i> 
            </div>
        </div>
        <div class="fade sc scroll-pl-6 snap-x my-4 space-x-4 overflow-x-auto flex w-full mx-8 ">
            <div class="ms-4  flex-shrink-0 w-10/12 h-64 content-end opacity-80 bg-black" 
                    style="background-image: url('{{ asset('assets/poster1.jpg') }}');
                         /* Menentukan gambar latar belakang */
                        background-size: cover; /* Mengatur gambar agar menutupi seluruh area elemen */
                        background-repeat: no-repeat; /* Mencegah pengulangan gambar */
                        background-position: center;
                        image-rendering: auto; /* Menghindari tampilan buram atau kotak-kotak */
                        -webkit-image-rendering: auto; /* Untuk browser berbasis WebKit seperti Chrome/Safari */
                        -moz-image-rendering: auto; /* Untuk Firefox */ ">
                <p class="font-bold text-white text-xl ms-4">Workshop DIY Ternak Maggot</p>
                <p class="text-sm text-clip text-white text-gray-400 ms-4 mb-4">Jalan Siwalankerto 1 no.38, Gayungan 07:45 - 10:45 wsfdewqfwfwe</p>
            </div>
            <div class="ms-4  flex-shrink-0 w-10/12 h-64 content-end opacity-80 bg-black" 
                    style="background-image: url('{{ asset('assets/poster1.jpg') }}');
                         /* Menentukan gambar latar belakang */
                        background-size: cover; /* Mengatur gambar agar menutupi seluruh area elemen */
                        background-repeat: no-repeat; /* Mencegah pengulangan gambar */
                        background-position: center;
                        image-rendering: auto; /* Menghindari tampilan buram atau kotak-kotak */
                        -webkit-image-rendering: auto; /* Untuk browser berbasis WebKit seperti Chrome/Safari */
                        -moz-image-rendering: auto; /* Untuk Firefox */ ">
                <p class="font-bold text-white text-xl ms-4">Workshop DIY Ternak Maggot</p>
                <p class="text-sm text-clip text-white text-gray-400 ms-4 mb-4">Jalan Siwalankerto 1 no.38, Gayungan 07:45 - 10:45 wsfdewqfwfwe</p>
            </div>
          
        </div>
        <div class="fade  sc my-4 flex justify-between w-full mx-4 py-2 rounded-2xl bg-green-700 text-white">
            <div class="ms-8">
               <p class="text-xl md:text-2xl font-bold">Seputar Lingkungan</p>
            </div>
            <div class="sc me-8 place-content-center ">
            <i class="fa fa-arrow-right text-md md:text-xl"></i> 
            </div>
        </div>
        <div class="sc scroll-pl-6 snap-x my-4 space-x-4 overflow-x-auto flex w-full mx-8 ">
            <div class="ms-4  flex-shrink-0 w-10/12 h-64 content-end opacity-80 bg-black" 
                    style="background-image: url('{{ asset('assets/poster1.jpg') }}');
                         /* Menentukan gambar latar belakang */
                        background-size: cover; /* Mengatur gambar agar menutupi seluruh area elemen */
                        background-repeat: no-repeat; /* Mencegah pengulangan gambar */
                        background-position: center;
                        image-rendering: auto; /* Menghindari tampilan buram atau kotak-kotak */
                        -webkit-image-rendering: auto; /* Untuk browser berbasis WebKit seperti Chrome/Safari */
                        -moz-image-rendering: auto; /* Untuk Firefox */ ">
                <p class="font-bold text-white text-xl ms-4">Workshop DIY Ternak Maggot</p>
                <p class="text-sm text-clip text-white text-gray-400 ms-4 mb-4">Jalan Siwalankerto 1 no.38, Gayungan 07:45 - 10:45 wsfdewqfwfwe</p>
            </div>
            <div class="ms-4  flex-shrink-0 w-10/12 h-64 content-end opacity-80 bg-black" 
                    style="background-image: url('{{ asset('assets/poster1.jpg') }}');
                         /* Menentukan gambar latar belakang */
                        background-size: cover; /* Mengatur gambar agar menutupi seluruh area elemen */
                        background-repeat: no-repeat; /* Mencegah pengulangan gambar */
                        background-position: center;
                        image-rendering: auto; /* Menghindari tampilan buram atau kotak-kotak */
                        -webkit-image-rendering: auto; /* Untuk browser berbasis WebKit seperti Chrome/Safari */
                        -moz-image-rendering: auto; /* Untuk Firefox */ ">
                <p class="font-bold text-white text-xl ms-4">Workshop DIY Ternak Maggot</p>
                <p class="text-sm text-clip text-white text-gray-400 ms-4 mb-4">Jalan Siwalankerto 1 no.38, Gayungan 07:45 - 10:45 wsfdewqfwfwe</p>
            </div>
   </div>
@endsection