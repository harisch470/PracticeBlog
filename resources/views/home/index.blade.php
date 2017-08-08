
@extends('layouts.master')
@section('pageContent')
    <!-- Blog Entries Column -->
 <div class="col-md-8">

    <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
    </h1>
        @if(isset($posts))
        @foreach($posts as $post)
            <article class="post" data-postid="{{ $post->id }}">
            <!-- First Blog Post -->
            <h2>
                <a href="{{ route('show', ['post_id' => $post->id]) }}">{{ $post->title }}</a>
            </h2>
                <?php
//                $categories = $post->categories()->where('name','=','Happy')->get();
                $categories = $post->categories()->get();
//                        dd($categories);
                ?>
                    <p>categories:{
                @if($categories)
                    @if($categories->count())
                        @foreach($categories as $c)
                         <a href="{{route('searchViaCategory',['category_ids'=>$c->id])}}">{{ $c->name }}</a>,
                        @endforeach
                    @endif
                @endif
                        }
                    </p>

                </a>
            <p class="lead">
                by <a href="#"> {{ $post->user->name }}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>
            <hr>
            <img class="img-responsive" src='../assets/uploads/images/{{ $post->photo }}' alt="">
            <hr>
            <p>{{ $post->description }}</p>
            <a class="btn btn-primary" href="{{ route('show', ['post_id' => $post->id]) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <span class="like" data-postid="{{$post->id}}" id="mydiv">
                    <a href="#" class="btn btn-default btnLike">
                        <span>Like</span>
                    </a>
                    <?php
                    $data=\App\Models\Post::likeCounter($post->id);
                    echo $data ." likes";
                    ?>
                </span>
            <hr>
             </article>
          @endforeach
    @endif
     <!-- Pager -->
    <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul>

</div>
    <div  class="col-md-8">

        <h1 class="page-header">
            Welcome to Home,
            <small>Laravel Blog helpful for beginners</small>
        </h1>
        <div id="postDataContainer">
            @if(isset($postList))
            {!! $postList !!}
            @endif
        </div>
    </div>

@stop

@section('rightBar')
    @include('layouts.side-widgets')
@stop

@section('footerAssets')
    <script>
        $('form').submit(function (e) {
            e.preventDefault();
            var urlVal = $(this).attr('action');
            var frmData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: urlVal,
                data: frmData,
                success: function (response) {
                    $('#postDataContainer').html(response);
                }
            })
        })
    </script>
    <script>
        var token='{{ Session::token() }}';
        var urlLike='{{  route('like') }}' ;
    </script>
@stop