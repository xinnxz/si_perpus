<?php

namespace App\Http\Controllers;

use App\Exports\BookExport;
use App\Imports\BookImport;
use App\Models\Book;
use App\Models\Category;
use App\Models\Bookshelf;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class BookController extends Controller
{
    public function index()
    {
        $data['books'] = Book::all();
        return view('books.index')->with($data);
    }

    public function create()
    {
        $books = Book::all(); 
        $categories = Category::all(); 
        $bookshelves = Bookshelf::all(); 
    
        return view('books.create', compact('books', 'categories', 'bookshelves'));
    }
    


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['string', 'required'],
            'author' => ['string', 'required'],
            'year' => ['integer', 'required'],
            'publisher' => ['string', 'required'],
            'city' => ['string', 'required'],
            'cover' => ['string', 'nullable'],
            'quantity' => ['integer', 'required'],
            'category_id' => ['exists:categories,id'], // Validasi foreign key
            'bookshelf_id' => ['exists:bookshelves,id'], // Validasi foreign key
        ]);
    
        Book::create($validated);
    
        $notification = [
            'message' => 'Data buku berhasil ditambahkan',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('book.index')->with($notification);
    }
    
    public function edit($id){
        $data['book'] = Book::findOrFail($id);
        $data['categories'] = Category::all();
        $data['bookshelves'] = Bookshelf::all();
        return view('books.edit')->with($data);
    }
    

    public function update(Request $request, $id)
    {
        $data = Book::findOrFail($id);
        $validated = $request->validate([
            'title' => ['string', 'required'],
            'author' => ['string', 'required'],
            'year' => ['integer', 'required'],
            'publisher' => ['string', 'required'],
            'city' => ['string', 'required'],
            'cover' => ['string', 'nullable'],
            'quantity' => ['integer', 'required'],
            'category_id' => ['exists:categories,id'], // Validasi foreign key
            'bookshelf_id' => ['exists:bookshelves,id'], // Validasi foreign key
        ]);
    
        $data->update($validated);
    
        $notification = [
            'message' => 'Data buku berhasil diupdate',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('book.index')->with($notification);
    }        

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        $book->delete();
        $notification = array(
            'message' => 'Data buku book dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('book.index')->with($notification);
    }

    public function print(){
        $data['books'] = Book::all();
        $pdf = Pdf::loadView('books.print', $data);
        return $pdf->download('books.pdf');
    }

    public function export(){
        return Excel::download(new BookExport, 'book.xlsx');
    }

    public function import(Request $req) {
        $req->validate([
            'file' => 'required|max:10000|mimes:xlsx,xls',
        ]);

        Excel::import(new BookImport, $req->file('file'));

        $notification = array(
            'message' => 'Import data berhasil dilakukan',
            'alert-type' => 'success'
        );
        return redirect()->route('book.index')->with($notification);
    }
}