<?php

namespace App\Http\Controllers;

use App\Models\Book; // Gunakan singular "Book" sesuai konvensi
use App\Models\books;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View; // Import the View class

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View // Specify the return type
    {
        $totalBooks = books::count(); // Gunakan "Book"
        $totalUsers = User::where('role', 'user')->count();
        $latestBooks = Books::latest()->take(5)->get(); // Gunakan "Book" dan ganti nama variabel

        return view('dashboard', [ // Gunakan array asosiatif untuk data ke view
            'totalBooks' => $totalBooks,
            'totalUsers' => $totalUsers,
            'latestBooks' => $latestBooks, // Gunakan nama variabel yang baru
        ]);
    }
}
