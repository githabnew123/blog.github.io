<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Home - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/app.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('home1/css/blog-home.css')}}" rel="stylesheet">
  

 

</head>

<body>

  <!-- Navigation -->
  @include('part.nav')

  <!-- Page Content -->
  <div class="container my-5">


      <div class="row">
        <div class="col-lg-8 col-md-8 offset-2">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <h2>Edit Form</h2>
          <form method="post" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Title : </label>
              <input type="text" name="c_name" class="form-control" value="{{$category->name}}">
            </div>
            <input type="submit" name="save" value="Update" class="btn btn-info">
          </form>
        </div>
      </div>

      <!-- Sidebar Widgets Column -->
     

    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
 <!--  @include('part.footer') -->

  <!-- Bootstrap core JavaScript -->
  
  <script src="{{asset('js/app.js')}}"></script>
 <!--  <script src="{{asset('home/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
  

</body>

</html>
