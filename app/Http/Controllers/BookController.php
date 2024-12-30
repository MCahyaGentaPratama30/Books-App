<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Bool_;

class BookController extends Controller
{
    public function index(Request $request){
        $query = Book::query();

        // Jika ada parameter pencarian, terapkan pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('namabuku', 'like', '%' . $request->search . '%')
                  ->orWhere('penulis', 'like', '%' . $request->search . '%');
        }

        // Ambil data buku berdasarkan query yang sudah difilter
        $datas = $query->get();
        return view('books.index', compact('datas'));
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request $request){

        $validate = $request->validate([
            'namabuku' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tanggalterbit' => 'required|date'
        ]);

        Book::create($validate);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id){
        $datas = Book::findOrFail($id);
        return view('books.edit', compact('datas'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'namabuku' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tanggalterbit' => 'required|date'
        ]);

        $book = Book::findOrFail($id);
        $book->update($validate);

        return redirect()->route('books.index')->with('update_success', 'Buku berhasil diupdate');
    }

    public function destroy($id){
        $book = Book::findOrFail($id);

        $book->delete();
        return redirect()->route('books.index')->with('destroy_success', 'Buku berhasil dihapus');
    }
}

