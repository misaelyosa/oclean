@extends('base.peternak')

@section('content')
    <div class="container mx-auto">
        <h1 class="font-black">Dashboard Jumlah Sampah</h1>
        <div>
            <p class="inline-block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bank Sampah</p>
            <p class="inline-block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $bank->nama }}</p>
        </div>
        <div>
            <p class="inline-block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Sampah (kg)</p>
            <p class="inline-block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $bank->totalSampah }}</p>
        </div>

        <form class="space-y-4 md:space-y-6" action="{{ route('jumlahSampah.request', $bank->id) }}" method="post">
            @csrf
            <div>
                <label for="berat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat Sampah (kg)</label>
                <input type="number" name="berat" id="berat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Berat sampah yang di-request (kg)" required value="{{ old('berat') }}">
                @error('berat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full text-white bg-main_green hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Request
            </button>
        </form>
    </div>
@endsection
