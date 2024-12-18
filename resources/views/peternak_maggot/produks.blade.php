@extends('base.peternak')

@section('content')
    <div class="container mx-auto">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="pt-3">
                <p class="font-bold text-2xl my-2 md:text-left text-center md:my-0 md:text-4xl">Total Produk <span class="text-green-800">{{ $jumlah_hasil }}</span> kg</p>      
            </div>    
            <div class="pt-5">
                {{-- <a href="{{ route('catatanProduk.index') }}">
                    <button
                        class="focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-green-900">
                        Tambah +
                    </button>
                </a> --}}

                <a href="javascript:void(0)" onclick="openModal()">
                    <button type="button"
                        class="focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-green-900">
                        Tambah +
                    </button>
                </a>
            </div>
            @error('berat')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            @error('detail')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-green-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Berat (kg)
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Keterangan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($history->count() <= 0)
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <h1 class="text-gray-500 dark:text-gray-400">Belum Ada Pencatatan Hasil</h1>
                                </td>
                            </tr>
                            @else
                                @foreach ($history as $hasil)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-green-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $hasil->berat }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $hasil->detail }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="editModal"
        class="fixed inset-0 hidden z-50 overflow-y-auto bg-black/50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div
                class="relative bg-white rounded-lg shadow dark:bg-gray-700 w-full max-w-md">
                <div class="p-6">
                    <h3
                        class="text-lg font-medium text-gray-900 dark:text-white">
                        Tambah Produk</h3>
                    <form method="POST"
                        action="{{ route('catatProduk.create') }}">
                        @csrf

                        <div class="mt-4">
                            <label for="berat"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Berat Produk (kg)
                            </label>
                            <input type="number" id="berat" name="berat"
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Berat produk (kg)" required value="{{ old('berat') }}">
                        </div>

                        <div class="mt-4">
                            <label for="detail"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Keterangan
                            </label>
                            <textarea id="detail" name="detail"
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Optional" value="{{ old('detail') }}"></textarea>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="button"
                                onclick="closeModal(1)"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-700">Batal</button>
                            <button type="submit"
                                class="ml-3 px-4 py-2 text-sm font-medium text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900">
                                Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            const modal = document.getElementById(`editModal`);
            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById(`editModal`);
            modal.classList.add('hidden');
        }
    </script>
@endsection
