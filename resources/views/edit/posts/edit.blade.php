@extends('edit.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-sm-6 col-xs-12">
                <form method="POST"
                      action="{{action('PostController@update',['post'=>$post->id])}}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group ">
                        @if(!empty($post->file))
                            <img class="img-responsive" src="{{$post->file}}"><br>
                        @endif
                        <label class="control-label" for="file">Choose a File</label>
                        <label class="btn btn-default btn-file">Browse <input name="file" type="file" style="display: none;"></label>
                    </div>
                    <div class="form-group ">
                        <label class="control-label" for="name">Post Name</label>
                        <input class="form-control" value="{{$post->name}}" id="name" name="name" type="text"/>
                    </div>
                    <div class="form-group ">
                        <label class="control-label" for="editor">Message</label>
                        <textarea name="content" id="editor">{{$post->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="select">Select a Category</label>
                        <select class="select form-control" id="select" name="category_id">
                            @foreach($categories as $category)
                                @if($post->category_id==$category->id)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-default" name="submit" value="Save"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection