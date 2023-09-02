<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Post - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/app.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('post/css/blog-post.css')}}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}"><!-- for ajax -->

</head>

<body>

  <!-- Navigation -->
  @include('part.nav')

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{$post->user['name']}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p class="d-inline-block">
          Posted on {{$post->created_at->toDateTimeString()}}
        </p>
        
        @if(Auth::check() && Auth::id()==$post->user_id)
        <div class="d-inline-block float-right">
          <a href="{{route('my_post.edit',$post->id)}}" class="btn btn-info">Edit</a>
          <form method="post" action="{{route('my_post.destroy',$post->id)}}" onsubmit="return confirm('Are you sure to delete?')" class="d-inline-block">
            @csrf
            @method('DELETE')
            <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger"
             >
          </form>
        </div>
        @endif
        

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{asset($post->image)}}" alt="">

        <hr>

        <!-- Post Content -->
        {!!$post->body!!}

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            {{--<form>--}}
              <div class="form-group">
                <textarea class="form-control" rows="3" id="body"></textarea>
              </div>
              <input type="hidden" name="pid" value="{{$post->id}}" id="pid">
              <button type="submit" class="btn btn-primary click">Submit</button>
            {{--</form>--}}
          </div>
        </div>

        <!-- Single Comment -->
      {{-- <div class="media mb-4">
         <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
         <div class="media-body">
           <h5 class="mt-0">Commenter Name</h5>
           <p id="comment"></p>
         </div>
       </div> --}}
        <div id="showcomment">
          
        </div>

       

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
  <script type="text/javascript">
    $(document).ready(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      var pid = $('#pid').val();
      $('.click').click(function(){
        var body = $('#body').val();
        //alert(text+pid);
        /*Ajax*/
        $.post("{{route('comment.store')}}",{body : body,pid : pid},function(response){
          //alert(response);
          $('#body').val('');
          getComments(pid);
        });
      })
      getComments(pid);
      function getComments(pid){
        $.post("{{route('getcomments')}}",{pid:pid},function(response){
          console.log(response);
          var html='';
          //var num = response[0].length;
          //console.log(num);
          /*for(var i=0;i<num;i++){
            //console.log(response[0][i]['body']);
            //console.log(response[1]['name']);
            html += `<div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                          <h5 class="mt-0">`+response[1]['name']+`</h5>`+
                          response[0][i]['body']
                        +`</div>
                      </div>`;
                      //console.log(response[1]);
          }*/
          $.each(response,function(i,v){
            html += `<div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" width="50" height="50" src="{{asset('${v.user.profile}')}}" alt="">
                        <div class="media-body">
                          <h5 class="mt-0">${v.user.name}</h5>
                          ${v.body}
                        </div>
                      </div>`;
                      //console.log(response);
          })
          $('#showcomment').html(html);
        })
      }
    })
  </script>
  <!-- <script src="{{asset('post/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->

</body>

</html>
