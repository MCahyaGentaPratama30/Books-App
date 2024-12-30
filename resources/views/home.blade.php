@extends('layouts.app')

@section('content')
<div class=" text-black py-16 sm:py-24 px-4 sm:px-6 lg:px-8 rounded-lg shadow-lg">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl sm:text-5xl font-bold leading-tight mb-4">Selamat Datang di Aplikasi Manajemen Buku</h1>
        <p class="text-lg sm:text-xl mb-6">Aplikasi ini merupakan latihan dasar Laravel CRUD untuk manajemen buku.</p>
        <hr class="my-8 border-gray-300 mx-auto w-16">

        <h2 class="text-2xl sm:text-3xl font-semibold mb-6">Fitur Aplikasi</h2>
        <ul class="text-lg sm:text-xl list-inside list-disc mx-auto max-w-xl text-left">
            <li>Menampilkan daftar buku.</li>
            <li>Menambah buku baru.</li>
            <li>Mengedit buku.</li>
            <li>Menghapus buku.</li>
        </ul>

        <a href="{{ route('books.index') }}" class="mt-6 inline-block px-8 py-3 bg-blue-700 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">
            Coba Sekarang
        </a>
    </div>
</div>
@endsection
