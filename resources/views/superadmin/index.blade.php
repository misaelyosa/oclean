@extends('base.superbase')

@section('content')
    <div id="content" class="dark bg-white dark:bg-green-900 min-h-screen">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="/" class="dark:text-white text-sm font-semibold leading-6 text-green-900">Log Out</a>
                </div>
            </nav>
        </header>
        
        <div class="relative isolate px-2 pt-6 lg:px-2">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#80ffb5] to-[#50b37c] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="mx-auto w-2xl py-32 sm:py-48 lg:pt-16 lg:pb-12">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                </div>
                <div class="text-center">
                    <h1 class="dark:text-white text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Super Admin Control</h1>
                    <p class="dark:text-white mt-6 text-lg leading-8 text-green-700">Disini superadmin bisa melakukan penambahan data, penghapusan data, dan perubahan data dari <br> baik user, admin, maupun peternak</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                    </div>
                </div>

                <div class="grid lg:grid-cols-3 justify-items-center px-24">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                        <img class="w-full h-48 object-cover" src="https://asset.kompas.com/crops/K5jlXc07YU2TZAdKbA_wznU5SHA=/14x9:989x659/1200x800/data/photo/2017/04/06/1441962017.jpg" alt="User" />
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">USER</div>
                            <p class="text-gray-700 text-base">
                                User atau pengguna adalah konsumen yang memberikan informasi sampah dan memanfaatkan aplikasi O-Clean.
                            </p>
                        </div>
                        <div class="px-6 py-4">
                            <a href="/tableuser" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">TABLE USER</a>
                        </div>
                    </div>

                    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                        <img class="w-full h-48 object-cover" src="https://rajaplastikindonesia.com/wp-content/uploads/2024/02/PEKERJAAN-ADMIN-ADALAH-3.jpg" alt="Admin" />
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">ADMIN</div>
                            <p class="text-gray-700 text-base">
                                Admin adalah jembatan dari user dan peternak yang mengatur/memanajemen sampah dan produk dari aplikasi O-Clean.
                            </p>
                        </div>
                        <div class="px-6 py-4">
                            <a href="/tableadmin" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">TABLE ADMIN</a>
                        </div>
                    </div>

                    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                        <img class="w-full h-48 object-cover" src="https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/66/2023/06/26/budidaya-maggot-3958399207.jpeg" alt="Peternak" />
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">PETERNAK</div>
                            <p class="text-gray-700 text-base">
                                Peternak atau peternak maggot adalah produsen yang menerima, mengolah dan memberikan produk dari aplikasi O-Clean.
                            </p>
                        </div>
                        <div class="px-6 py-4">
                            <a href="/tablepeternak" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">TABLE PETERNAK</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
