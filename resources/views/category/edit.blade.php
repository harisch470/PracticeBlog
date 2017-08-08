@extends('layouts.master')
@section('rightBar')
@stop
@section('pageContent')
        <!-- Page Content -->
<div class="col-lg-8">
    <!-- Title -->
    <h1>Catagory</h1>
    <hr>
    <div class="form-group">
    <form id="frmPost" method="post" action="{{route('updateCategory',['id'=>$category->id])}}">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put">
    <label for="pwd">Catagory Name:</label>
    <input type="text" id="title" name="name" id="myInput" class="form-control" value="{{$category->name}}">
    <input type="submit" id="title" name="submit"  class="form-control" value="Edit Catagory">
    </form>
    </div>
    <h1>Catagory List</h1>
    @foreach($categories as $category)
        <ul class="list-group">
            <li class="list-group-item">{{$category->name}}
                <div style="float: right">
                    <button style="padding:3px;" class="btn btn-primary "> <a style="text-decoration: none; color: white"  href="{{route('editCategory',['id'=>$category->id])}}"class="edit" >Edit</a></button>
                    <button style="padding:3px;" class="btn btn-danger"><a style="text-decoration: none; color: white"  href="{{route('delete_category',['id'=>$category->id])}}" >Delete</a></button>
                </div>
            </li>
        </ul>
    @endforeach
</div>
@stop