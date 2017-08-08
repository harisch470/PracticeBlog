@if($posts)
    @if($posts->count())
        @foreach($posts as $post)
            <article class="post" data-postid="{{ $post->id }}">
                <!-- First Blog Post -->
                <h2>
                    <a href="{{ route('show', ['post_id' => $post->id]) }}">{{ $post->title }}
                        {{$post->getPostCategoriesName()}}
                    </a>
                </h2>
                <p class="lead">
                    by <a href="#"> {{ $post->user->name }}</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>
                <hr>
                <img class="img-responsive" src='../assets/uploads/images/{{ $post->photo }}' alt="">
                <hr>
                <p>{{ $post->description }}</p>
                <a class="btn btn-primary" href="{{ route('posts.showMore',['post_id' => $post->id])}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                 <span class="like" data-postid="{{$post->id}}" id="mydiv">

                    <a href="#" class="btn btn-default btnLike"  >
                        <span>Like</span>
                    </a>
                     <?php
                     $data=\App\Models\Post::likeCounter($post->id);
                     echo $data ." likes";
                     ?>
<!--                     --><?php
//                     $dataa=\App\Models\Post::likeCheck($post->id);
//                     if($dataa == true){
//                         echo "success";
//                     }else{
//                         echo "no";
//                     }
//                     ?>
                </span>
                <h4>Comments: <span class="badge"><?php \App\Models\Post::Counter($post->id);?></span></h4>

                <hr>
            </article>
        @endforeach
    @else
        <article class="post">
            <h4>There is no post found!</h4>
        </article>
    @endif
@else
    <article class="post">
        <h1>There is no post found!</h1>
    </article>
@endif
<script>
    var token='{{ Session::token() }}';
    var urlLike='{{  route('like') }}' ;
</script>
<!-- Pager -->
{!! $posts->links() !!}