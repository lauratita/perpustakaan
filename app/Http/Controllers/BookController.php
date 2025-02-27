<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth');
        // memastikan hanya user yang login yang bisa mengakses
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer'
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function storeMass()
    {
        Book::create([
            'nama' => 'Laptop',
            'harga' => 15000000,
            'stok' => 10
        ]);

        return "Data berhasil disimpan dengan mass assignment!";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return "Menampilkan buku dengan ID: " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
       $book = Book::find($id);
       return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer'
        ]);

        Book::where('id', $id)->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil diupdate!');
    }

    public function updateMass($id)
    {
        Book::where('id', $id)->update(['harga' => 16000000]);

        return "Harga buku berhasil diupdate dengan mass update!";
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Book::destroy($id);
        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus!');
    }

    public function getData()
    {
        $book = Book::all(); // Mengambil semua data
        $book = Book::find(1); // Mengambil data dengan ID 1
        $book = Book::where('harga', '>', 1000000)->get();
        // Mengambil book dengan harga > 1 juta
    }
}
