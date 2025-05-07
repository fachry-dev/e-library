<?php

namespace App\Http\Controllers;
use App\Models\books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Dislay a listing of the resource.
     */
    public function index()
    {
        $books = books::all();
        return view("books.index", compact('books'));
    }

    public function create(){
        return view("books.create");
    }

    public function store(Request $request){
        $request->validasi([
            'nama_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'description' => 'required|string',
            'tahun_terbit' => 'required|integer|min:1900|max:'.date('Y'),
            'jumlah_halaman' => 'required|integer|min:1',
        ]);

        Books::create($request->all());
        return redirect()->route('books.index')
        ->with('success', 'Buku berhasil ditambahkan');
        
    }

    public function show(Books $books){
        return view('books.show', compact('books'));
    }

    public function edit(Books $books){
        return view('books.create', compact('books'));
    }
    public function update(Request $request, Books $books){
        $request->validasi([
            'nama_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'description' => 'required|string',
            'tahun_terbit' => 'required|integer|min:1900|max:'.date('Y'),
            'jumlah_halaman' => 'required|integer|min:1',
        ]);
        $books->update($request->all());

        return redirect()->route('books.index')
        ->with('success', 'Buku berhasil diupdate');
    }
    public function destroy(Books $books){
        $books->delete();
        
        return redirect()->route('books.index')
        ->with('success', 'Buku berhasil dihapus');
    }
}
