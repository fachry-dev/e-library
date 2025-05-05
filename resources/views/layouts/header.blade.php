<!-- Top bar -->
<div class="flex-1 md:ml-64">
    <!-- Top bar -->
    <header class="sticky top-0 z-10 bg-white border-b border-gray-200 shadow-sm h-20 flex items-center justify-between px-4 md:px-6">
        <h1 class="text-2xl font-semibold text-gray-900 hidden md:block">E-Library Dashboard</h1>
        <div class="ml-auto relative">
            <button id="user-menu-button" class="relative rounded-full p-1 flex items-center justify-center">
                <img src="https://i.pinimg.com/736x/ef/3b/d4/ef3bd4f4993e41f31ec7b12b6bf35bb4.jpg" alt="User" class="h-8 w-8 rounded-full border border-gray-300 mr-3">
                <p class="text-[#1d1d1d] ">Admin</p>
            </button>
            <div id="user-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-200 z-20">
                <div class="py-1 px-4 text-sm font-medium border-b border-gray-200">Akun Saya</div>
                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-user mr-2 w-4 h-4"></i>
                    <span>Profil</span>
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-cog mr-2 w-4 h-4"></i>
                    <span>Pengaturan</span>
                </a>
                <div class="border-t border-gray-200 my-1"></div>
                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-sign-out-alt mr-2 w-4 h-4"></i>
                    <span>Keluar</span>
                </a>
            </div>
        </div>
    </header>
</div>