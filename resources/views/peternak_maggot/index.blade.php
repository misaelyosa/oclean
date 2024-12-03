@extends('base.BankSampahBase')

@section('content')
    <h1 class="font-black">ni dash bank sampah</h1>
    {{-- @dd(Auth::User()) --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Asal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Berat (kg)
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
                @foreach ($mutasi as $transaksi)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $transaksi->users->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $transaksi->berat }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $transaksi->status ? 'Validated' : 'Waiting' }}
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('bankSampah.validasi', $transaksi->id) }}" method="POST">
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
            </tbody>
        </table>
    </div>
@endsection
