<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
<h4>Blog Search</h4>
<div class="input-group">
    <form id="frmHomeSearch" action="{{route('filterPosts')}}" method="post">
        <input type="text" class="form-control" name="searchKey">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
            </form>
        </div>
        <!-- /.input-group -->
    </div>
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('searchViaCategory')}}" method="get" enctype="multipart/form-data">
                    @foreach(category_drop_down() as $Categories)
                        <ul class="list-unstyled">
                            <li>
                                <input type="checkbox" name="category_ids[]" value="{{$Categories->id}}">
                                <a href="{{route('searchViaCategory',['category_ids'=>$Categories->id])}}" style="text-decoration: none">{{$Categories->name}}</a>
                            </li>
                        </ul>
                    @endforeach
                    <input type="submit" value="Search">
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>