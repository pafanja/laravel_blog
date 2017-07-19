@extends('edit.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-sm-6 col-xs-12">
                <form method="POST"  action="{{action('CategoriesController@store')}}"/>
                <div class="form-group ">
                    <input type="text" name="name" placeholder="Name"/>
                </div>
                <div class="form-group ">
                    <input name="description" type="text" class="form-control"/>
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-default" value="Save">
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection