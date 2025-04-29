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
            <a href="create.html" class="w-full sm:w-auto bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">Tambah Buku</a>
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
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-medium">Harry Potter dan Batu Bertuah</td>
                        <td class="px-6 py-4 whitespace-nowrap">Gramedia</td>
                        <td class="px-6 py-4 hidden md:table-cell truncate max-w-xs">Buku pertama dari seri Harry Potter yang menceritakan awal petualangan Harry di Hogwarts.</td>
                        <td class="px-6 py-4 whitespace-nowrap">1997</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="show.html" class="text-gray-500 hover:text-gray-700" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-gray-700" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="text-gray-500 hover:text-red-600 delete-btn" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-medium">Laskar Pelangi</td>
                        <td class="px-6 py-4 whitespace-nowrap">Bentang Pustaka</td>
                        <td class="px-6 py-4 hidden md:table-cell truncate max-w-xs">Novel yang menceritakan kisah persahabatan 10 anak dari Belitung yang bersekolah di SD Muhammadiyah.</td>
                        <td class="px-6 py-4 whitespace-nowrap">2005</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="show.html" class="text-gray-500 hover:text-gray-700" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-gray-700" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="text-gray-500 hover:text-red-600 delete-btn" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-medium">Bumi Manusia</td>
                        <td class="px-6 py-4 whitespace-nowrap">Hasta Mitra</td>
                        <td class="px-6 py-4 hidden md:table-cell truncate max-w-xs">Novel pertama dari tetralogi Buru karya Pramoedya Ananta Toer yang berlatar belakang masa kolonial Hindia Belanda.</td>
                        <td class="px-6 py-4 whitespace-nowrap">1980</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="show.html" class="text-gray-500 hover:text-gray-700" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-gray-700" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="text-gray-500 hover:text-red-600 delete-btn" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-medium">Filosofi Teras</td>
                        <td class="px-6 py-4 whitespace-nowrap">Kompas</td>
                        <td class="px-6 py-4 hidden md:table-cell truncate max-w-xs">Buku yang membahas filosofi Stoa dan bagaimana menerapkannya dalam kehidupan sehari-hari.</td>
                        <td class="px-6 py-4 whitespace-nowrap">2018</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="show.html" class="text-gray-500 hover:text-gray-700" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-gray-700" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="text-gray-500 hover:text-red-600 delete-btn" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-medium">Atomic Habits</td>
                        <td class="px-6 py-4 whitespace-nowrap">Penguin Random House</td>
                        <td class="px-6 py-4 hidden md:table-cell truncate max-w-xs">Buku tentang bagaimana membangun kebiasaan baik dan menghilangkan kebiasaan buruk.</td>
                        <td class="px-6 py-4 whitespace-nowrap">2018</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="show.html" class="text-gray-500 hover:text-gray-700" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-gray-700" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="text-gray-500 hover:text-red-600 delete-btn" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection