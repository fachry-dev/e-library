@extends('layouts.app')
@section('content')

<!-- Book detail content -->
<div class="flex-1">
<main class="p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold tracking-tight">Detail Buku</h2>
        <div class="flex space-x-4">
            <a href="{{ route('books.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Kembali</a>
            <a href="{{ route('books.edit', $book) }}" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-md hover:bg-primary-700">
                <i class="fas fa-edit mr-2"></i>
                <span>Edit</span>
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-5 border-b border-gray-200">
            <h3 class="text-lg font-semibold">{{ $book->nama_buku }}</h3>
            <p class="text-sm text-gray-500">Diterbitkan oleh {{ $book->penerbit }} pada tahun {{ $book->tahun_terbit }}</p>
        </div>
        <div class="p-5 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-lg font-semibold mb-4">Informasi Buku</h4>
                    <dl class="space-y-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Penerbit</dt>
                            <dd class="text-base">{{ $book->penerbit }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Tahun Terbit</dt>
                            <dd class="text-base">{{ $book->tahun_terbit }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Jumlah Halaman</dt>
                            <dd class="text-base">{{ $book->jumlah_halaman }}</dd>
                        </div>
                    </dl>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Deskripsi</h4>
                    <p class="text-base text-gray-600 whitespace-pre-line">{{ $book->description }}</p>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-6">
                <h4 class="text-lg font-semibold mb-4">Status Peminjaman</h4>
                <div class="bg-green-50 text-green-700 px-4 py-3 rounded-md">Tersedia untuk dipinjam</div>
            </div>
        </div>
        <div class="p-5 border-t border-gray-200 flex justify-end">
            <button class="px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-md hover:bg-primary-700">Pinjam Buku</button>
        </div>
    </div>
</main>
</div>
@endsection