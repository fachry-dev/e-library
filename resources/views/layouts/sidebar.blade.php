<button id="mobile-menu-button" class="md:hidden fixed top-4 left-4 z-50 flex items-center justify-center w-10 h-10 rounded-full bg-white border border-gray-200 text-gray-600 shadow-md">
    <i class="fas fa-bars"></i>
</button>

<!-- Sidebar -->
<aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-200 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col">
    <div class="flex items-center justify-between p-4 border-b border-gray-200">
        <h1 class="text-xl font-bold text-primary-600">E-Library</h1>
        <button id="close-sidebar" class="md:hidden flex items-center justify-center w-8 h-8 rounded-full text-gray-600 hover:bg-gray-100">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <nav class="flex-1 p-4 overflow-y-auto">
        <div class="space-y-1">
            <a href="{{ route('dashboard.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ Request::routeIs('dashboard.index') ? 'bg-primary-600 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <i class="fas fa-home w-5 h-5 mr-3"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('books.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ Request::routeIs('books.index') ? 'bg-primary-600 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <i class="fas fa-book w-5 h-5 mr-3"></i>
                <span>Buku</span>
            </a>
            <a href="{{ route('books.create') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ Request::routeIs('books.create') ? 'bg-primary-600 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <i class="fas fa-plus w-5 h-5 mr-3"></i>
                <span>Tambah Buku</span>
            </a>
            @if(Auth::user()->isAdmin())
            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
                <i class="fas fa-users w-5 h-5 mr-3"></i>
                <span>Pengguna</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
                <i class="fas fa-cog w-5 h-5 mr-3"></i>
                <span>Pengaturan</span>
            </a>
            @endif
        </div>
    </nav>
    <div class="p-4 border-t border-gray-200">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                <i class="fas fa-sign-out-alt mr-2"></i>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</aside>