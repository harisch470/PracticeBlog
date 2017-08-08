
@section('commentForm')
    <form role="form" method="post" action="{{route('comment.store')}}">
        <div class="form-group">
            <textarea class="form-control" rows="3" name="message"></textarea>
        </div>
        <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}" class="form-control" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 @show
