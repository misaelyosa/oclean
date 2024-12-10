@extends('base.peternak')

@section('content')
    <div class="container mx-auto">
        <h1 class="font-black">Tambah Produk</h1>
        <div>
            <p class="inline-block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hasil Sekarang (kg)</p>
            <p class="inline-block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $jumlah_hasil }}</p>
        </div>

        <form class="space-y-4 md:space-y-6" action="{{ route('catatProduk.create') }}" method="post">
            @csrf
            <div>
                <label for="berat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat Hasil (kg)</label>
                <input type="number" name="berat" id="berat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Berat sampah yang di-request (kg)" required value="{{ old('berat') }}">
                @error('berat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="detail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                <textarea name="detail" id="detail"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Optional" value="{{ old('detail') }}"></textarea>
                @error('detail')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full text-white bg-main_green hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Tambah
            </button>
        </form>
    </div>
@endsection