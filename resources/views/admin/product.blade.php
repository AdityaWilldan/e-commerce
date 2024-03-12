<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')

  <style type="text/css">
    .title{
        color:white; 
        padding:-top: 25px; 
        font-size: 25px
    }

    label{
        display: inline-block;
        width: 200px;
    }

    input[type="text"],
      input[type="number"],
      input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }

      input[type="text"]:focus,
      input[type="number"]:focus {
        border-color: #007bff;
        outline: none;
      }

      .btn-success {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      .btn-success:hover {
        background-color: #218838;
      }
  </style>
  </head>
  <body>
    
      <!-- partial -->
      @include('admin.sidebar')

      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <div class="container" align="center">
       <h1 class="title">Add Product</h1>

              @if (session()->has('message'))
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">x</button>
              {{session()->get('message')}}
              </div>
              @endif

       <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
        @csrf
       <div style="padding: 20px";>
        <label for="">Nama Product</label>

        <input style="color: black" type="text" name="title" placeholder="berinama product" required="">
       </div>

       <div style="padding: 15px";>
        <label for="">Harga</label>

        <input style="color: black" type="text" name="price" placeholder="Beri Harga" required="">
       </div>
       
       <div style="padding: 15px";>
        <label for="">Deskripsi</label>

        <input style="color: black" type="text" name="des" placeholder="Deskripsikan" required="">
       </div>

       <div style="padding: 15px";>
        <label for="">Kualitas</label>

        <input style="color: black" type="text" name="quantity" placeholder="Kualitas Product" required="">
       </div>

       <div style="padding: 15px";>
        <input type="file" name="file">
       </div>

       <div style="padding: 15px";>
        <input class="btn btn-outline-success" type="submit">
       </div>
       
    </form>
            </div>
       </div>
          <!-- partial -->
        @include('admin.script')
  </body>
</html>