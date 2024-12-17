@extends('base.BankSampahBase')

@section('content')
    <div class="my-5 mx-10 px-10">
        <div id="accordion-flush" data-accordion="collapse"
            data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
            data-inactive-classes="text-gray-500 dark:text-gray-400">
            <h2 id="accordion-flush-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3"
                    data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                    aria-controls="accordion-flush-body-1">
                    <span>Total Sampah di {{ $bank->nama }}: {{ $bank->totalSampah }} kg</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        User
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Berat (kg)
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Foto
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($mutasi->count() <= 0)
                                    <tr>
                                        <td colspan="4" class="text-center py-4">
                                            <h1 class="text-gray-500 dark:text-gray-400">Tidak Ada Transaksi</h1>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($mutasi as $transaksi)
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $transaksi->users->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $transaksi->berat }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <figure class="max-w-lg">
                                                    <img class="h-auto max-w-full max-w-xs rounded-lg"
                                                        src="{{ asset($transaksi->foto) }}" alt="image description">
                                                </figure>
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $transaksi->status ? 'Validated' : 'Waiting' }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <form action="{{ route('bankSampah.validasi', $transaksi->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="status" value="1">
                                                    <button type="submit"
                                                        class=" {{ $transaksi->status ? 'pointer-events-none opacity-50' : '' }} focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                                        Validasi
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <h2 id="accordion-flush-heading-2">
                <button type="button"
                    class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3"
                    data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                    aria-controls="accordion-flush-body-2">
                    <span>Daftar Produk</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Produk
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Stok
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Harga
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Edit
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($produks->count() <= 0)
                                        <tr>
                                            <td colspan="4" class="text-center py-4">
                                                <h1 class="text-gray-500 dark:text-gray-400">Tidak Ada Produk</h1>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($produks as $produk)
                                            <tr
                                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $produk->namaProduk }}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $produk->jumlah }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $produk->harga }}
                                                </td>
                                                <!-- Modal -->
                                                <div id="editModal-{{ $produk->id }}"
                                                    class="fixed inset-0 hidden z-50 overflow-y-auto">
                                                    <div class="flex items-center justify-center min-h-screen px-4">
                                                        <div
                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700 w-full max-w-md">
                                                            <div class="p-6">
                                                                <h3
                                                                    class="text-lg font-medium text-gray-900 dark:text-white">
                                                                    Edit Produk</h3>
                                                                <form method="POST"
                                                                    action="{{ route('produk.update', $produk->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mt-4">
                                                                        <label for="namaProduk"
                                                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                                            Nama Produk
                                                                        </label>
                                                                        <input type="text" id="namaProduk"
                                                                            name="namaProduk"
                                                                            value="{{ $produk->namaProduk }}"
                                                                            class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                                                            disabled>
                                                                    </div>
                                                                    <div class="mt-4">
                                                                        <label for="jumlah"
                                                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                                            Jumlah Stok
                                                                        </label>
                                                                        <input type="number" id="jumlah"
                                                                            name="jumlah" value="{{ $produk->jumlah }}"
                                                                            class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                                                    </div>
                                                                    <div class="mt-4">
                                                                        <label for="harga"
                                                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                                            Harga
                                                                        </label>
                                                                        <input type="number" id="harga"
                                                                            name="harga" value="{{ $produk->harga }}"
                                                                            class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                                                    </div>
                                                                    <div class="mt-6 flex justify-end">
                                                                        <button type="button"
                                                                            onclick="closeModal({{ $produk->id }})"
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
                                                <td class="px-6 py-4">
                                                    <a href="javascript:void(0)" onclick="openModal({{ $produk->id }})">
                                                        <button type="button"
                                                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                                            Edit
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
            </div>
            <h2 id="accordion-flush-heading-3">
                <button type="button"
                    class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3"
                    data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                    aria-controls="accordion-flush-body-3">
                    <span>Daftar Penukaran Produk</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        User
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Produk
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Harga
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($penjualan->count() <= 0)
                                    <tr>
                                        <td colspan="4" class="text-center py-4">
                                            <h1 class="text-gray-500 dark:text-gray-400">Tidak Ada Transaksi</h1>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($penjualan as $transaksi)
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $transaksi->users->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $transaksi->produks->namaProduk }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $transaksi->jumlah }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $transaksi->harga }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $transaksi->total }}
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
    </div>

    <script>
        function openModal(id) {
            const modal = document.getElementById(`editModal-${id}`);
            modal.classList.remove('hidden');
        }

        function closeModal(id) {
            const modal = document.getElementById(`editModal-${id}`);
            modal.classList.add('hidden');
        }
    </script>
@endsection
