<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
   </head>
   <body>
      <h1 class="text-center">Data Category</h1>
      <p class="text-center">Laporan Data Category Tahun 2023</p>
      <br/>
      <table id="table-data" class="table table-bordered">
         <thead>
            <tr>
               <th>NO</th>
               <th>NAME</th>
            </tr>
         </thead>
         <tbody>
            @php $no=1; @endphp
            @foreach($categories as $category)
            <tr>
               <td>{{ $no++ }}</td>
               <td>{{ $category->name }}</td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </body>
</html>
