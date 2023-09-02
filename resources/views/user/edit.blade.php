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

    <div class="row justify-content-center my-5">
      <div class="col-md-8">
        @php
            $user = Auth::user();
          @endphp
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        <form method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <img src="{{asset($user->avatar)}}" class="img-fluid rounded-circle w-50">
          <div class="form-group">
            <label>Change Profile</label>
            <input type="hidden" name="oldprofile" value="{{$user->avatar}}" class="img-fluid rounded-circle w-50">
            <input type="file" name="profile" class="form-control-file">
          </div>
          <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}">
          </div>
          <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{$user->email}}" readonly="readonly">
          </div>
          <div class="form-group">
            <input type="submit" name="btnsubmit" class="btn btn-primary" value="Update">
            <a href="{{route('my_post.index')}}" class="btn btn-secondary">Cancel</a>
          </div>
        </form>
      </div>
    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  @include('part.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('js/app.js')}}"></script>
  <!-- <script src="{{asset('home/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->

</body>

</html>
