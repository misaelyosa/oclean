@extends('base.superbase')

@section('content')
<div class="dark bg-white dark:bg-green-900 min-h-screen px-6 py-10">
    <div class="container mx-auto mt-10">
        <h1 class="text-4xl font-bold text-gray-100 mb-6 text-center">Tambah Pengguna</h1>
        <form action="{{ route('user.insert') }}" method="POST" class="bg-green-500 p-6 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="name" class="form-label text-white">Nama</label>
                <input type="text" class="form-control rounded-md border border-gray-300 p-2 w-full" id="name" name="name" required>
            </div>
            <div class="mb-4">
                <label for="alamat" class="form-label text-white">Alamat</label>
                <input type="text" class="form-control rounded-md border border-gray-300 p-2 w-full" id="alamat" name="alamat" required>
            </div>
            <div class="mb-4">
                <label for="umur" class="form-label text-white">Umur</label>
                <input type="number" class="form-control rounded-md border border-gray-300 p-2 w-full" id="umur" name="umur" required>
            </div>
            <div class="mb-4">
                <label class="form-label text-white">Jenis Kelamin</label>
                <div class="flex space-x-6">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-green-500" name="gender" value="Laki-laki" required>
                        <span class="ml-2 text-white">Laki-laki</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-green-500" name="gender" value="Perempuan" required>
                        <span class="ml-2 text-white">Perempuan</span>
                    </label>
                </div>
            </div>
            <div class="mb-4">
                <label for="no_telp" class="form-label text-white">No. Telepon</label>
                <input type="text" class="form-control rounded-md border border-gray-300 p-2 w-full" id="no_telp" name="no_telp" required>
            </div>
            <div class="mb-4">
                <label for="poin" class="form-label text-white">Poin</label>
                <input type="number" class="form-control rounded-md border border-gray-300 p-2 w-full" id="poin" name="poin" required>
            </div>
            <div class="mb-4">
                <label for="id_lokasi" class="form-label text-white">ID Lokasi</label>
                <input type="number" class="form-control rounded-md border border-gray-300 p-2 w-full" id="id_lokasi" name="id_lokasi" required>
            </div>
            <div class="mb-4">
                <label class="form-label text-white">Role</label>
                <div class="flex space-x-6">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-green-500" name="role" value="2" required>
                        <span class="ml-2 text-white">Admin Bank Sampah</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-green-500" name="role" value="3" required>
                        <span class="ml-2 text-white">Peternak Maggot</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-green-500" name="role" value="4" required>
                        <span class="ml-2 text-white">Users</span>
                    </label>
                </div>
            </div>
            <div class="mb-4">
                <label for="email" class="form-label text-white">Email</label>
                <input type="email" class="form-control rounded-md border border-gray-300 p-2 w-full" id="email" name="email" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" class="form-control rounded-md border border-gray-300 p-2 w-full" id="password" name="password" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="form-label text-white">Konfirmasi Password</label>
                <input type="password" class="form-control rounded-md border border-gray-300 p-2 w-full" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn bg-green-700 text-white rounded-md px-4 py-2 hover:bg-green-600 transition duration-200">Simpan</button>
        </form>
    </div>
</div>
@endsection
