<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Data Buku</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
   </head>
   <body>
      <h1 class="text-center">Data Buku</h1>
      <p class="text-center">Laporan Data Buku Tahun 2023</p>
      <br/>
      <table id="table-data" class="table table-bordered">
         <thead>
            <tr>
               <th>NO</th>
               <th>Title</th>
               <th>Author</th>
               <th>Year</th>
               <th>Publisher</th>
               <th>City</th>
               <th>Cover</th>
               <th>Quantity</th>
               <th>Bookshelf</th>
               <th>Category</th>
            </tr>
         </thead>
         <tbody>
            @php $no=1; @endphp
            @foreach($books as $book)
            <tr>
               <td>{{ $no++ }}</td>
               <td>{{ $book->title }}</td>
               <td>{{ $book->author }}</td>
               <td>{{ $book->year }}</td>
               <td>{{ $book->publisher }}</td>
               <td>{{ $book->city }}</td>
               <!-- <td>
                  <img src="{{ asset('storage/cover_buku/'.$book->cover) }}" width="100px" />
               </td> -->
               <td>{{ $book->quantity }}</td>
               <td>{{ $book->bookshelf->name }}</td>
               <td>{{ $book->category->name }}</td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </body>
</html>
