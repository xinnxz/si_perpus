<?php

namespace App\Http\Controllers;

use App\Exports\CategoryExport;
use App\Imports\CategoryImport;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::all();
        return view('categories.index')->with($data);
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => ['string', 'required']
        ]);

        Category::create($validated);

        $notification = [
            'message' => 'Data buku berhasil ditambahkan',
            'alert-type' => 'success'
        ];

        return redirect()->route('category.index')->with($notification);
    }

    public function edit($id){
        $data['category'] = Category::findOrFail($id);
        return view('categories.edit')->with($data);
    }

    public function update(Request $request, $id){
        $data = Category::findOrFail($id);
        $validated = $request->validate([
            'name' => ['string', 'required']
        ]);
        $data->update($validated);

        $notification = [
            'message' => 'Data buku berhasil diupdate',
            'alert-type' => 'success'
        ];

        return redirect()->route('category.index')->with($notification);
    }

    public function destroy(string $id)
    {
        $book = Category::findOrFail($id);

        $book->delete();
        $notification = array(
            'message' => 'Data buku category dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')->with($notification);
    }

    public function print(){
        $data['categories'] = Category::all();
        $pdf = Pdf::loadView('categories.print', $data);
        return $pdf->download('categories.pdf');
    }

    public function export(){
        return Excel::download(new CategoryExport, 'category.xlsx');
    }

    public function import(Request $req) {
        $req->validate([
            'file' => 'required|max:10000|mimes:xlsx,xls',
        ]);

        Excel::import(new CategoryImport, $req->file('file'));

        $notification = array(
            'message' => 'Import data berhasil dilakukan',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')->with($notification);
    }
}