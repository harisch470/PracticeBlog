@extends('layouts.master')
@section('rightBar')
@stop
@section('pageContent')
        <!-- Page Content -->
<div class="col-lg-8">
    <!-- Title -->
    <h1>Catagory</h1>
    <hr>
    <form id="frmPost" method="post" action="{{route('createcategory')}}">
        <div class="form-group">
            {{csrf_field()}}
            <label for="pwd">Catagory Name:</label>
            <input type="text" id="title" name="name"  class="form-control" >
            <input type="submit" id="title" name="submit"  class="form-control" value="Add Catagory">
        </div>
    </form>
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