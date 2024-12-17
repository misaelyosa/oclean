@extends('base.peternak')

@section('content')
    <div class="container mx-auto">
        @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
        @endif

        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-green-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Bank Sampah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Sampah (kg)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Request Sampah
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($banks->count() <= 0)
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <h1 class="text-gray-500 dark:text-gray-400">Tidak Ada Bank Sampah di Lokasi Anda</h1>
                                </td>
                            </tr>
                        @else
                            @foreach ($banks as $bank)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-green-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $bank->nama }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $bank->totalSampah }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('jumlahSampah.byIndex', $bank->id) }}" class="">
                                            <button
                                                class="focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-green-900">
                                                Request
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
