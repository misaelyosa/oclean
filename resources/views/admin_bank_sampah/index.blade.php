@extends('base.BankSampahBase')

@section('content')
    <div class="my-5 mx-10 px-10">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Bank Sampah
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Sampah (kg)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banks as $bank)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $bank->nama }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $bank->totalSampah }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('bankSampah.byIndex', $bank->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Open</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
