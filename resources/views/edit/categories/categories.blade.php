@extends('edit.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-sm-6 col-xs-12">
                <table class="table-hover">
                    <thead class="thead-default">
                        <tr>
                            <th class="col-md-2">#</th>
                            <th class="col-md-2">Name</th>
                            <th class="col-md-2">Description</th>
                            <th class="col-md-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th class="col-md-2" scope="row">{{$category->id}}</th>
                            <td class="col-md-2">{{$category->name}}</td>
                            <td class="col-md-2">{{$category->description}}</td>
                            <td class="col-md-2"> <a href="{{action('CategoriesController@edit',['categories'=>$category->id])}}">Edit</a></td>
                            <td class="col-md-4">
                                <form method="POST" action="{{action('CategoriesController@destroy',['categories'=>$category->id])}}">
                                    <input type="hidden" name="_method" value="delete"/>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="submit" class="btn btn-default" value="Delete"/>
                                </form>
                            </td>
                            <td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection