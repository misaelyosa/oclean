@extends('base.BankSampahBase')

@section('content')
    <div class="my-5 mx-10 px-10">
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
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banks as $bank)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-green-50 even:dark:bg-green-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $bank->nama }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $bank->totalSampah }}
                            </td>
                            <td class="px-6 py-4">

                                <a href="{{ route('bankSampah.byIndex', $bank->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <button type="button"
                                        class="focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-green-900">
                                        Open
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
