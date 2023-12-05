<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rak;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'DESC')->get();
        $books = Book::with('raks')->get();
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }
    // public function rak()
    // {
    //     return view('book.rak');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'judul'       => 'required',
            'pengarang'   => 'required',
            'penerbit'    => 'required',
            'tahun'       => 'required',
            'kategori'    => 'required',
            'halaman'     => 'required',
            'jumlah'      => 'required',
        ]);
        Book::create($request->all());

        return redirect()->route('book.index')->with('success', 'Buku Berhasil di tambahkan');
    }
    public function storeRak(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'book_id'       => 'required|exists:books,id',
            'name'          => 'required',
            'description'   => 'required',
        ]);
         // Create kelas
        Rak::create([
            'book_id' => $request->input('book_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'book_id' => $request->book_id,
            'raks' => $request->raks,
        ]);

        // Redirect back
        return redirect()->route('book.index')->with('success', 'Rak Berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Book::findOrFail($id);

        return view('book.show', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Book::findOrFail($id);
        $raks = $books->raks; // Mengambil data rak terkait dengan buku ini

        return view('book.edit', compact('books', 'raks'));
        // $books = Book::findOrFail($id);

        // return view('book.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $customMessages = [
            'required' => 'Kolom :attribute harus diisi.',
        ];

        $request->validate([
            'judul' => 'required|unique:books,judul,' . $id,
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'kategori' => 'required',
            'halaman' => 'required',
            'jumlah' => 'required',
            'name' => 'required', // Menambahkan validasi untuk field "rak"
            'description' => 'required', // Menambahkan validasi untuk field "deskripsi"
        ], $customMessages);


        $books = Book::findOrFail($id);

        $books->raks->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        $books->update($request->all());

        return redirect()->route('book.index')->with('success', 'Buku berhasil di update');
        // return redirect()->route('book.edit', $id)->withErrors(['error' => 'Buku tidak berhasil diupdate. Pastikan semua kolom diisi.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Book::findOrFail($id);

        $books->delete();

        return redirect()->route('book.index')->with('success', 'Buku berhasil di delete');
    }
}
