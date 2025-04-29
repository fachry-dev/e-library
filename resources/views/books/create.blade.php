@extends('layouts.app')
@section('content')

 <!-- Create book content -->
 <main class="p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold tracking-tight">Tambah Buku Baru</h2>
        <a href="dashboard.html" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Kembali</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-5 border-b border-gray-200">
            <h3 class="text-lg font-semibold">Detail Buku</h3>
            <p class="text-sm text-gray-500">Masukkan informasi lengkap tentang buku yang akan ditambahkan</p>
        </div>
        <div class="p-5">
            <form id="create-book-form">
                <div class="mb-5">
                    <label for="name" class="block text-sm font-medium mb-2">Nama Buku</label>
                    <input type="text" id="name" placeholder="Masukkan judul buku" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <div class="mb-5">
                    <label for="publisher" class="block text-sm font-medium mb-2">Penerbit</label>
                    <input type="text" id="publisher" placeholder="Nama penerbit" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <div class="mb-5">
                    <label for="description" class="block text-sm font-medium mb-2">Deskripsi</label>
                    <textarea id="description" placeholder="Deskripsi singkat tentang buku" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                    <div>
                        <label for="year" class="block text-sm font-medium mb-2">Tahun Terbit</label>
                        <input type="text" id="year" placeholder="Contoh: 2023" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    </div>

                    <div>
                        <label for="pages" class="block text-sm font-medium mb-2">Jumlah Halaman</label>
                        <input type="number" id="pages" placeholder="Contoh: 320" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    </div>
                </div>

                <div class="mb-5">
                    <label for="cover" class="block text-sm font-medium mb-2">Cover Buku</label>
                    <input type="file" id="cover" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="dashboard.html" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Batal</a>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-md hover:bg-primary-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection
    
