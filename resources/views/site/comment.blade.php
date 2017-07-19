<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <form method="POST" id="add_comment" enctype = "multipart/form-data">
                {{ csrf_field() }}
                Ваше имя:<br>
                <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
                <input type="text" name="author" class="author form-control"/><br>
                Ваше сообщение:<br>
                <textarea name="content" class="text form-control"></textarea><br>
                <button type="submit" class="btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
@if(Session::has('message'))
    {{Session::get('message')}} <!-- здесь будем выводить сообщения об успешности добавления комментария -->
@endif