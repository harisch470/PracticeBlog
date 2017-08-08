@extends('layouts.master')

@section('title') Posts Form @stop

@section('headAssets')
    <style>

    </style>
@stop
@section('pageContent')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Categories</th>
            <th>User</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
            <tr>
                <td><a href="{{route('posts.showMore',['post_id'=>$post->id])}}">{{$post->title}}</a></td>
                <td>{{$post->getPostCategoriesName()}}</td>
                <td><a href="#" >{{$post->user->name}}</a></td>

            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3">There is no record found!</td>
            </tr>
        @endif
        </tbody>
    </table>
@stop


@section('rightBar')@stop
@section('footerAssets')@stop