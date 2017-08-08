<section>
    <div id="errors">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="col-md-8">
        <div class="row">
            <h1>@if($post->id == "") Create Post @else Edit Form @endif</h1>
        </div>
        <form id="frmPost" method="post" @if($post->id == "") action="{{route('posts.store')}}" @else action="{{route('posts.update',['id'=>$post->id])}}" @endif enctype="multipart/form-data">

        @if($post->id == "")
        @else
            <input type="hidden" name="_method" value="put">
        @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="pwd">Title:</label>
                <input type="text" id="title" name="title"  class="form-control" value="{{$post->title}}" >
            </div>
            <div class="form-group">
                <label class="col-xs-5 control-label asterisk">Category:</label>
                <select id="category" name="category[]" class="form-control" multiple="multiple">
                    <option value="">Select Category</option>

                        @foreach(category_drop_down() as $Category)
                            <option value="{{$Category->id}}" @if($post->id) {{ $post->categories()->where('post_id','=',$post->id)->get() }} selected="selected" @endif>{{$Category->name}}</option>
                        @endforeach
                </select>
                <span id="error_category" class="field-validation-msg"></span>
            </div>

            <div class="form-group">
                <div class="form-group col-md-6">
                    <label for="image">Image:</label>
                    <input type="file" class="file-loading btn black" name="image" @if($post->id==null)  @endif />
                </div>
                <div class="form-group col-md-6">
                    @if($post->photo)
                        <img class="img-responsive" id="post_photo" src='../assets/images/{{ $post->photo }}' alt="">
                        <input type="hidden" name="image" value="{{ $post->photo }}" />
                    @endif
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="pwd">Description:</label>
                <textarea class="form-control" name="description" id="description" rows="5" placeholder="Your Description">{{$post->description}}</textarea>
            </div>

            @if($post->id == "")
                <div class="form-group col-md-12">
                    <input type="submit" id="btnSave" name="btnSave" class="btn black"  value="Save Post">
                </div>

            @else
                <div class="form-group col-md-12">
                    <input type="submit" id="btnSave" name="btnSave" class="btn black"  value="Edit Post">
                </div>
            @endif
        </form>
    </div>
</section>