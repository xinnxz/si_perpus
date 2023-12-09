<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BookImport implements WithHeadingRow, ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'title' => $row['title'],
            'author' => $row['author'],
            'year' => $row['year'],
            'publisher' => $row['publisher'],
            'city' => $row['city'],
            'cover' => $row['cover'],
            'quantity' => $row['quantity'],
            'category_id' => $row['category_id'],
            'bookshelf_id' => $row['bookshelf_id'],
        ]);
    }
}
