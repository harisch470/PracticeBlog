@extends('layouts.master')

@section('title') Edit Form @stop

@section('headAssets')
    <style>
        .ops{
            text-decoration: none;
            float:right;
        }
    </style>
@stop
@section('pageContent')
        <h4>Edit Comment:</h4>
        <form role="form" method="post" action="{{route('comment.update',['comment_id'=>$comment->id])}}">
            <div class="form-group">
                <textarea class="form-control" rows="3" name="message">{{$comment->message}}</textarea>
            </div>
            <input type="hidden" id="post_id" name="post_id" value="{{ $post_id }}" class="form-control" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
 @stop


@section('rightBar')@show
@section('footerAssets')@stop