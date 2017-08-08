@extends('layouts.master')

@section('title') Show Post @stop

@section('headAssets')
    <style>
            .ops{
                text-decoration: none;
                float:right;
            }
    </style>
@stop
@section('pageContent')

        @if(isset($post))

            <div class="col-lg-8">
                <!-- Title -->
                <h1>{{ $post->title }}</h1>
                <span class="like" data-postid="{{$post->id}}" id="mydiv" style="float:right">
                               <a href="#" class="btn btn-default btnLike" id='btnLike' >
                                   <span>Like</span>
                               </a>
                    <?php
                    $data=\App\Models\Post::likeCounter($post->id);
                    echo $data ." likes";
                    ?>
                        </span>
                <a class="btn btn-primary" href="{{ route('edit', ['post_id' => $post->id]) }}" style="float:right">Edit</a>
                <a class="btn btn-danger" href="{{ route('delete', ['post_id' => $post->id]) }}" style="float:right">Delete</a>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{ $post->user->name }}</a>
                </p>
                <p>Categories:{
                    <a href="{{ route('show', ['post_id' => $post->id]) }}">
                        {{$post->getPostCategoriesName()}}
                    </a>
                    }
                </p>

                <hr>
                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>
                <hr>
                <!-- Preview Image -->
                <img class="img-responsive" src='../assets/uploads/images/{{ $post->photo }}' alt="">
                <hr>
                <!-- Post Content -->
                <p class="lead">{{ $post->description }}</p>
                <hr>
                <!-- Blog Comments -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    @include('comment.includes.commentForm')
                </div>
                <hr>
                <!-- Posted Comments -->
                @if(isset($comments))
                        @foreach($comments as $comment)
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->user->name}}
                            <small>{{$comment->created_at}}</small>
                            <a class="ops" href="{{route('comment.delete',['post_id'=>$post->id,'comment_id'=>$comment->id])}}">Delete</a>
                            <a class="ops" href="{{route('comment.edit',['post_id'=>$post->id,'comment_id'=>$comment->id])}}">Edit||</a>
                        </h4>
                        <p>{{$comment->message}}</p>
                    </div>
                </div>
                    @endforeach
                @endif
            </div>

        @endif

@stop


@section('rightBar')@show
@section('footerAssets')
    <script>
        var token='{{ Session::token() }}';
        var urlLike='{{  route('like') }}' ;
    </script>
@stop