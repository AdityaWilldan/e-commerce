<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  
  {{-- <style>
    .container{
      max-width: 80%;

      table {
      width: 100%;
    }

    table th, table td {
      width: 12%; /* Sesuaikan lebar kolom sesuai kebutuhan Anda */
    }
    }
  </style> --}}
  </head>
  <body>
    
      <!-- partial -->
      @include('admin.sidebar')

      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <div class="container my-4">
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>Nama</th>
                          <th>Deskripsi</th>
                          <th>Kualitas</th>
                          <th>Harga</th>
                          <th>Gambar</th>
                          <th>update</th>
                          <th>delete</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $product)
                    
                      <tr>
                          <td>{{$product->title}}</td>
                          <td>{{$product->description}}1</td>
                          <td>{{$product->quantity}}</td>
                          <td>{{$product->price}}</td>
                          <td>
                            <img height="200" width="200" src="/productimage/{{$product->image}}" alt="">
                          </td>
                          <td>
                              <a class="btn btn-primary" href="{{url('updateview', $product->id)}}" type="submit">Update</a>
                          </td>
                          <form action="/deleteproduct/{{$product->id}}" method="POST">
                            @csrf
                            @method('delete')
                          <td>
                            <button class="btn btn-danger" href="{{url('deleteproduct', $product->id)}}" type="submit" >Delete</button>
                          </td>
                        </form>
                      </tr>
                    
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
          <!-- partial -->
        @include('admin.script')
  </body>
</html>