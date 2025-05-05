@extends('layouts.app')

@section('content')

<!-- Dashboard table -->
<!-- Tabs -->
<div class="border-b border-gray-200 mb-6">
    <div class="flex -mb-px">
        <button class="tab-button active px-4 py-2 text-sm font-medium border-b-2 border-primary-600 text-primary-600" data-tab="all">Semua Buku</button>
        <button class="tab-button px-4 py-2 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="recent">Baru Ditambahkan</button>
        <button class="tab-button px-4 py-2 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="popular">Populer</button>
    </div>
</div>

<!-- Book table card -->
<div class="bg-white rounded-lg shadow overflow-hidden mb-6">
    <div class="p-5 border-b border-gray-200">
        <h3 class="text-lg font-semibold">Daftar Buku</h3>
        <p class="text-sm text-gray-500">Daftar semua buku yang tersedia di perpustakaan</p>
    </div>
    <div class="p-5">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-4 space-y-3 sm:space-y-0">
            <div class="w-full sm:w-64">
                <input type="text" id="search-books" placeholder="Cari buku..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
            </div>
            <a href="{{ route('books.create') }}" class="w-full sm:w-auto bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">Tambah Buku</a>
        </div>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Buku</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penerbit</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Deskripsi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Terbit</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($books as $book)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $book->nama_buku }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->penerbit }}</td>
                        <td class="px-6 py-4 hidden md:table-cell truncate max-w-xs">{{ $book->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->tahun_terbit }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('books.show', $book) }}" class="text-gray-500 hover:text-gray-700" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('books.edit', $book) }}" class="text-gray-500 hover:text-gray-700" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:text-red-600" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data buku</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection