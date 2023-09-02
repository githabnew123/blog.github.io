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
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        
        <h1 class="my-4">Category
            <a href="{{route('category.create')}}" class="btn btn-info">Add New Category</a>
        </h1> 
        <!-- Blog Post -->
       
        <table class="table">
          <thead>
            <tr>
              <th>NO</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach($categories as $category)
            <tr>
              <td>{{$category->id}}</td>
              <td>{{$category->name}}</td>
              <td>
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-info">Edit</a>
                <form method="post" action="{{route('category.destroy',$category->id)}}" onsubmit="return confirm('Are you sure to delete?')" class="d-inline-block">
                  @csrf
                  @method('DELETE')
                  <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger"
                   >
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        

       

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
       @include('part.sidebar')

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  @include('part.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('js/app.js')}}"></script>
  <!-- <script src="{{asset('home/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->

</body>

</html>
