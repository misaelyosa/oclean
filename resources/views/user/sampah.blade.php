@extends('base.base')
@section('content')
<button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 my-28 mx-3 me-2 mb-4 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Input Sampah</button>
@if ($sampah->isEmpty())
    <p class="text-center text-gray-500 dark:text-gray-400">Anda belum memiliki data sampah</p>
@else
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Berat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Foto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sampah as $s)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$loop->iteration}}
                        </th>
                        <td class="px-6 py-4">
                            {{$s->id}}
                        </td>
                        <td class="px-6 py-4">
                            {{$s->berat}}
                        </td>
                        <td class="px-6 py-4">
                            {{$s->foto}}
                        </td>
                        <td class="px-6 py-4">
                            @if ($s->verified)
                            Verified
                            @else
                            Not Verified
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection