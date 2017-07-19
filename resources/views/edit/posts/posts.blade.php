@extends('edit.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-sm-6 col-xs-12">
                <table class="table-hover">
                    <thead class="thead-default">
                        <tr>
                            <th class="col-md-2">#</th>
                            <th class="col-md-2">File</th>
                            <th class="col-md-2">Name</th>
                            <th class="col-md-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th class="col-md-2" scope="row">{{$post->id}}</th>
                                <td class="col-md-2"><img width=20 height=20 src="{{$post->file}}"></td>
                                <td class="col-md-2">{{$post->name}}</td>
                                <td class="col-md-2"> <a href="{{action('PostController@edit',['posts'=>$post->id])}}">Edit</a></td>
                                <td class="col-md-4"> <form method="POST" action="{{action('PostController@destroy',['posts'=>$post->id])}}">
                                        <input type="hidden" name="_method" value="delete"/>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <input type="submit" class="btn btn-default" value="Delete"/>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection