@extends('edit.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-sm-6 col-xs-12">
                <form method="POST" class="form-horizontal"
                      action="{{action('CategoriesController@update',['categories'=>$category->id])}}"/>
                <div class="form-group text-center">
                    <input type="text" name="name" value="{{$category->name}}"/><br>
                </div>
                <div class="form-group text-center">
                <input type="text" name="description" value="{{$category->description}}"/><br>
                </div>
                <input type="hidden" name="_method" value="put"/>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-default" value="Save">
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection