@extends('base.base')
@section('content')
@if ($transaksi->isEmpty())
    <p class="text-center text-gray-500 dark:text-gray-400">Anda belum memiliki data sampah</p>
@else
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-40">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <!-- <th scope="col" class="px-6 py-3">
                        No
                    </th> -->
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Transaksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $s)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <!-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$loop->iteration}}
                        </th> -->
                        <td class="px-6 py-4">
                            {{$s->id}}
                        </td>
                        <td class="px-6 py-4">
                            {{$s->jumlah}}
                        </td>
                        <td class="px-6 py-4">
                            Rp.{{$s->harga}}
                        </td>
                        <td class="px-6 py-4">
                            Rp.{{$s->total}}
                        </td>
                        <td class="px-6 py-4">
                            {{$s->created_at}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection