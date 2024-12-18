@extends('base.superbase')

@section('content')
    <div class="dark bg-white dark:bg-green-900 min-h-screen px-6 py-10">
        <a href="superadmin" class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-8 text-lg rounded">Back</a>
        <div class="text-center">
            <h1 class="dark:text-white text-4xl font-bold tracking-tight text-green-900 sm:text-6xl">TABEL ADMIN</h1>
            <p class="mt-4 text-gray-50">Tabel Admin menampilkan daftar admin yang terdaftar dalam aplikasi O-Clean. <br> Anda dapat melihat informasi kontak mereka.</p>
        </div>
        
        <br>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 bg-white shadow-md rounded">
                <thead class="bg-green-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Alamat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Umur</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Gender</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">NoTelp</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Poin</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->alamat }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->umur }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->gender }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->no_telp }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->poin }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('user.edit', $user) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                <form action="{{ route('user.delete', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex justify-center mt-8">
            <a href="{{ route('user.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 text-lg rounded">Insert Data</a>
        </div>
@endsection
