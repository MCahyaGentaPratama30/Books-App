@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center p-8">
        <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-lg transform transition-transform hover:scale-105 duration-300">
            <h2 class="text-2xl font-semibold text-blue-900 mb-6">Tambah Buku Baru</h2>
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="namabuku" class="block text-sm font-medium text-gray-700">Nama Buku</label>
                    <input type="text" id="namebooks" name="namabuku" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Nama Buku">
                    @error('namabuku')
                        <small class="text-red-600">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                    <input type="text" id="penulis" name="penulis" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Nama Penulis">
                    @error('penulis')
                        <small class="text-red-600">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="tanggalterbit" class="block text-sm font-medium text-gray-700">Tanggal Terbit</label>
                    <input type="date" id="tanggalterbit" name="tanggalterbit" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('tanggalterbit')
                        <small class="text-red-600">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-4 flex justify-between items-center">
                    <a href="{{ route('books.index') }}" class="text-blue-600 hover:text-blue-800">Kembali ke Daftar Buku</a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 shadow-lg transition duration-300">Simpan Buku</button>
                </div>
            </form>
        </div>
    </div>
@endsection
