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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">

 

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
          <form method="post" action="{{route('my_post.update',$post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Title : </label>
              <input type="text" name="title" class="form-control" value="{{$post->title}}">
            </div>
            <div class="form-group">
              <label>Body : </label>
              <textarea name="body" class="form-control" id="summernote">{!!$post->body!!}</textarea>
            </div>
            <div class="form-group">
              <label>Image : </label>
              <input type="file" name="image" class="form-control-file">
              <img src="{{asset($post->image)}}" class="img-fluid">
              <input type="hidden" name="oldimg" value="{{$post->image}}">
            </div>
            <div class="form-group">
              <label>Category : </label>
              <select name="category" class="form-control">
                <option disabled="disabled" value="0">Category</option>
                @foreach($categories as $row)
                <option value="{{$row->id}}"
                  @if($post->category_id==$row->id){{'selected'}}
                  @endif
                  >{{$row->name}}</option>
                @endforeach
              </select>
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
  @include('part.footer')

  <!-- Bootstrap core JavaScript -->
  
  <script src="{{asset('js/app.js')}}"></script>
 <!--  <script src="{{asset('home/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
   <script>
      $('#summernote').summernote({
        placeholder: 'Hello bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>

</body>

</html>
