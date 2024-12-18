@extends('base.homebase')

@section('content')
<div class="dark bg-white dark:bg-green-900 min-h-screen px-6 py-10">
    <div class="container mx-auto mt-10">
        <h1 class="text-4xl font-bold text-gray-100 mb-6 text-center">Edit Pengguna</h1>
        <form action="{{ route('user.update', $user->id) }}" method="POST" class="bg-green-500 p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT') <!-- Menambahkan method PUT untuk update -->
            <div class="mb-4">
                <label for="name" class="form-label text-white">Nama</label>
                <input type="text" class="form-control rounded-md border border-gray-300 p-2 w-full" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="mb-4">
                <label for="alamat" class="form-label text-white">Alamat</label>
                <input type="text" class="form-control rounded-md border border-gray-300 p-2 w-full" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}" required>
            </div>
            <div class="mb-4">
                <label for="umur" class="form-label text-white">Umur</label>
                <input type="number" class="form-control rounded-md border border-gray-300 p-2 w-full" id="umur" name="umur" value="{{ old('umur', $user->umur) }}" required>
            </div>
            <div class="mb-4">
                <label for="gender" class="form-label text-white">Jenis Kelamin</label>
                <select class="form-select rounded-md border border-gray-300 p-2 w-full" id="gender" name="gender" required>
                    <option value="Laki-laki" {{ $user->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="no_telp" class="form-label text-white">No. Telepon</label>
                <input type="text" class="form-control rounded-md border border-gray-300 p-2 w-full" id="no_telp" name="no_telp" value="{{ old('no_telp', $user->no_telp) }}" required>
            </div>
            <div class="mb-4">
                <label for="poin" class="form-label text-white">Poin</label>
                <input type="number" class="form-control rounded-md border border-gray-300 p-2 w-full" id="poin" name="poin" value="{{ old('poin', $user->poin) }}" required>
            </div>
            <div class="mb-4">
                <label for="id_lokasi" class="form-label text-white">ID Lokasi</label>
                <input type="number" class="form-control rounded-md border border-gray-300 p-2 w-full" id="id_lokasi" name="id_lokasi" value="{{ old('id_lokasi', $user->id_lokasi) }}" required>
            </div>
            <div class="mb-4">
                <label for="role" class="form-label text-white">Role</label>
                <select class="form-select rounded-md border border-gray-300 p-2 w-full" id="role" name="role" required>
                    <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Admin Bank Sampah</option>
                    <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Peternak Maggot</option>
                    <option value="4" {{ $user->role == 4 ? 'selected' : '' }}>Users</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="email" class="form-label text-white">Email</label>
                <input type="email" class="form-control rounded-md border border-gray-300 p-2 w-full" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label text-white">Password (kosongkan jika tidak ingin mengubah)</label>
                <input type="password" class="form-control rounded-md border border-gray-300 p-2 w-full" id="password" name="password">
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="form-label text-white">Konfirmasi Password</label>
                <input type="password" class="form-control rounded-md border border-gray-300 p-2 w-full" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit" class="btn bg-green-700 text-white rounded-md px-4 py-2 hover:bg-green-600 transition duration-200">Update</button>
        </form>
    </div>
</div>
@endsection
