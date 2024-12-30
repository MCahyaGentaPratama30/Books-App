@extends('layouts.app')

@section('content')
    <div class="container-fluid min-h-screen p-8">
        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
            <div class="mb-6">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        @if (session('update_success'))
            <div class="mb-6">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('update_success') }}</span>
                </div>
            </div>
        @endif
        @if (session('destroy_success'))
            <div class="mb-6">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('destroy_success') }}</span>
                </div>
            </div>
        @endif

        <div class="container mb-6">
            <!-- Tombol untuk menambah buku -->
            <a href="{{ route('books.create') }}"
                class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                Tambah Buku
            </a>
        </div>

        <!-- Form Search -->
        <div class="container mb-6">
            <form action="{{ route('books.index') }}" method="GET" class="flex items-center space-x-4">
                <input type="text" name="search" placeholder="Cari Buku..." value="{{ request('search') }}"
                    class="px-4 py-2 border rounded-lg w-full max-w-xs" />
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                    Cari
                </button>
            </form>
        </div>

        <!-- Tabel Buku -->
        <div class="container">
            <h3 class="text-white text-2xl mb-4">Daftar Buku</h3>
            <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-blue-700 text-white">
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Nama Buku</th>
                            <th class="px-4 py-2">Penulis</th>
                            <th class="px-4 py-2">Tanggal Terbit</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $data->namabuku }}</td>
                                <td class="px-4 py-2">{{ $data->penulis }}</td>
                                <td class="px-4 py-2">{{ $data->tanggalterbit }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('books.edit', ['id' => $data->id]) }}"
                                        class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition duration-300">Edit</a>

                                    <!-- Tombol untuk membuka modal konfirmasi hapus -->
                                    <button onclick="openModal({{ $data->id }})"
                                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300">
                                        Hapus
                                    </button>

                                    <!-- Modal konfirmasi hapus -->
                                    <div id="modal-{{ $data->id }}"
                                        class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
                                        <div class="bg-white rounded-lg p-8 w-1/2 max-w-3xl shadow-lg flex flex-col">
                                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Apakah Anda yakin ingin menghapus buku ini?</h3>
                                            <div class="flex flex-col gap-4 mt-4">
                                                <!-- Tombol Batal dengan ukuran yang sama -->
                                                <button onclick="closeModal({{ $data->id }})"
                                                    class="w-full px-6 py-3 bg-gray-400 text-white rounded-md hover:bg-gray-500">Batal</button>
                                                <!-- Tombol Hapus dengan ukuran yang sama -->
                                                <form action="{{ route('books.destroy', $data->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="w-full px-6 py-3 bg-red-600 text-white rounded-md hover:bg-red-700">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('script/modal.js') }}"></script>
@endsection
