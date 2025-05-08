@extends('layouts.app')

@section('content')
<!-- Main content -->
<div class="flex-1">
    <!-- Dashboard content -->
    <main class="p-6">
        <h2 class="text-3xl font-bold tracking-tight mb-6">Dashboard</h2>

        <!-- Stats cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-5 rounded-lg shadow">
                <div class="flex items-center justify-between mb-2">
                    <div class="text-sm font-medium text-gray-500">Total Buku</div>
                    <i class="fas fa-book text-gray-400"></i>
                </div>
                <div class="text-2xl font-bold">{{ $totalBooks }}</div>
                <div class="text-xs text-gray-500">Koleksi buku perpustakaan</div>
            </div>
            <div class="bg-white p-5 rounded-lg shadow">
                <div class="flex items-center justify-between mb-2">
                    <div class="text-sm font-medium text-gray-500">Pengguna</div>
                    <i class="fas fa-users text-gray-400"></i>
                </div>
                <div class="text-2xl font-bold">{{ $totalUsers }}</div>
                <div class="text-xs text-gray-500">Jumlah pengguna terdaftar</div>
            </div>
            {{-- <div class="bg-white p-5 rounded-lg shadow">
                <div class="flex items-center justify-between mb-2">
                    <div class="text-sm font-medium text-gray-500">Administrasi</div>
                    <i class="fas fa-cog text-gray-400"></i>
                </div>
                <div class="text-2xl font-bold">
                    @if(Auth::user()->isAdmin())
                        Admin
                    @else
                        User
                    @endif
                </div>
                <div class="text-xs text-gray-500">Level akses akun Anda</div>
            </div> --}}
            <div class="bg-white p-5 rounded-lg shadow">
                <div class="flex items-center justify-between mb-2">
                    <div class="text-sm font-medium text-gray-500">Kategori</div>
                    <i class="fas fa-tags text-gray-400"></i>
                </div>
                <div class="text-2xl font-bold">12</div>
                <div class="text-xs text-gray-500">Kategori buku</div>
            </div>
        </div>

        <!-- Book table card -->
        <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
            <div class="p-5 border-b border-gray-200">
                <h3 class="text-lg font-semibold">Buku Terbaru</h3>
                <p class="text-sm text-gray-500">Buku terbaru yang ditambahkan ke perpustakaan</p>
            </div>
            <div class="p-5">
                <div class="flex justify-between items-center mb-4">
                    @if (Auth::user()->isAdmin())
                    <a href="{{ route('books.create') }}" class="bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                        <i class="fas fa-plus"></i>
                        Tambah Buku</a>
                    @endif
                </div>
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
                            @forelse($latestBooks as $book)
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
                                        <a href="{{ route('books.create', $book) }}" class="text-gray-500 hover:text-gray-700" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        @if (Auth::user()->isAdmin())
                                        <a href="{{ route('books.edit', $book) }}" class="text-gray-500 hover:text-gray-700" title="Edit">
                                            <i class="fas fa-edit"></i>
                                            
                                        @endif
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
    </main>
</div>
@endsection