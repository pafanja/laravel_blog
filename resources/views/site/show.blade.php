<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Laravel Blog</title>
    <script type="text/javascript" src="{{asset('js/addCom.js')}}"></script>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clean-blog.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/comments.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-center">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/edit">Edit Info</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<header class="intro-header" style="background-image: url('/images/about-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Blog</h1>
                    <hr class="small">
                    <span class="subheading">Created with Laravel</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- fdfdfdf  -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h2 class="section-heading">{{$post->name}}</h2>
                <span class="caption text-muted">Posted at: {{$post->updated_at}}</span>
                <p>{{$post->content}}</p>
                <img class="img-responsive" src="{{$post->file}}" alt="">
            </div>
        </div>
    </div>
</article>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <ul>
        @foreach($comments as $comment)
            <li class="media">
                <div class="media-body">
                    <div class="well well-sm">
                        <h4 class="media-heading text-uppercase reviews">{{$comment->author}}</h4>
                        <ul class="media-date reviews list-inline">
                            Created: {{$comment->created_at}}
                        </ul>
                        <p class="media-comment">
                            {{$comment->content}}
                        </p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
    </div>
</div>
<!-- add comment -->
    @include('site.comment')
<!-- fdfdfd -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p class="copyright text-muted">2017</p>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/clean-blog.min.js') }}"></script>
</body>
</html>