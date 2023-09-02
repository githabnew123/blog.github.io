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

        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>

        <!-- Blog Post -->
        @foreach($posts as $post)
        <div class="card mb-4">
          <div class="card-body">
            <h2 class="card-title">{{$post->title}}</h2>
            <p class="card-text">{!!$post->body!!}</p>
            <a href="{{route('my_post.show',$post->id)}}" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on {{$post->created_at->toFormattedDateString()}} by
            <a href="#">{{$post->user['name']}}</a>
          </div>
        </div>
        @endforeach

       

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
