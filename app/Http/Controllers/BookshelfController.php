<?php

namespace App\Http\Controllers;

use App\Models\Bookshelf;
use Illuminate\Http\Request;

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
            'message' => 'Data buku berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('book')->with($notification);
    }
}
