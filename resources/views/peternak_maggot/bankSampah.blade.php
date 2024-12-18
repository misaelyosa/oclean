@extends('base.peternak')

@section('content')
    <div class="container mx-auto">
        <div class="pt-3">
            <p class="font-bold text-2xl my-2 md:text-left text-center md:my-0 md:text-4xl">Bank Sampah <span class="text-green-800">{{ $bank->nama }}</span></p>      
            <p class="text-gray-800 text-xl md:text-left text-center my-1 md:my-0 md:text-2xl pt-3">Total Sampah <span class="text-green-500 font-bold">{{ $bank->totalSampah }}</span> kg</p> 
        </div>     
        
        <form class="space-y-4 md:space-y-6" action="{{ route('jumlahSampah.request', $bank->id) }}" method="post">
            @csrf
            <div>
                <label for="berat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat Sampah (kg)</label>
                <input type="number" name="berat" id="berat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Kg sampah request" required value="{{ old('berat') }}">
                @error('berat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-green-900">
                Request
            </button>
        </form>
    </div>
@endsection
