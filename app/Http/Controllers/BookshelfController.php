<?php

namespace App\Http\Controllers;

use App\Exports\BookshelfExport;
use App\Imports\BookshelfImport;
use App\Models\Bookshelf;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookshelfController extends Controller
{
    public function index()
    {
        $data['bookshelves'] = Bookshelf::all();
        return view('bookshelves.index')->with($data);
    }

    public function create(){
        return view('bookshelves.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'code' => ['integer', 'required',],
            'name' => ['string', 'required']
        ]);

        Bookshelf::create($validated);

        $notification = [
            'message' => 'Data buku berhasil ditambahkan',
            'alert-type' => 'success'
        ];

        return redirect()->route('bookshelf.index')->with($notification);
    }

    public function edit($id){
        $data['bookshelf'] = Bookshelf::findOrFail($id);
        return view('bookshelves.edit')->with($data);
    }

    public function update(Request $request, $id){
        $data = Bookshelf::findOrFail($id);
        $validated = $request->validate([
            'code' => ['integer', 'required'],
            'name' => ['string', 'required']
        ]);
        $data->update($validated);

        $notification = [
            'message' => 'Data buku berhasil diupdate',
            'alert-type' => 'success'
        ];

        return redirect()->route('bookshelf.index')->with($notification);
    }

    public function destroy(string $id)
    {
        $book = Bookshelf::findOrFail($id);

        $book->delete();
        $notification = array(
            'message' => 'Data buku bookshelf dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('bookshelf.index')->with($notification);
    }

    public function print(){
        $data['bookshelves'] = Bookshelf::all();
        $pdf = Pdf::loadView('bookshelves.print', $data);
        return $pdf->download('bookshelves.pdf');
    }

    public function export(){
        return Excel::download(new BookshelfExport, 'bookshelf.xlsx');
    }

    public function import(Request $req) {
        $req->validate([
            'file' => 'required|max:10000|mimes:xlsx,xls',
        ]);

        Excel::import(new BookshelfImport, $req->file('file'));

        $notification = array(
            'message' => 'Import data berhasil dilakukan',
            'alert-type' => 'success'
        );
        return redirect()->route('bookshelf.index')->with($notification);
    }
}