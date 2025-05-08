<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Mengambil semua user
        $users = User::all();

        foreach ($users as $user) {
            // Memeriksa apakah password sudah menggunakan bcrypt
            if (!str_starts_with($user->password, '$2y$')) {
                // Asumsikan admin mendapat password default
                if ($user->role === 'admin') {
                    $user->password = Hash::make('admin123');
                } else {
                    // Untuk user biasa, buat password acak
                    // Anda bisa mengirimkan email reset password ke mereka
                    $user->password = Hash::make('password123');
                }
                $user->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     * 
     * Note: Migration ini tidak bisa di-reverse karena kita tidak bisa kembali
     * ke format hashing yang lama setelah di-upgrade.
     */
    public function down(): void
    {
        // Tidak ada operasi down karena kita tidak ingin mengembalikan password ke format lama
    }
};
