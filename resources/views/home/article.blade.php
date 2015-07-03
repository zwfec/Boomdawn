@extends('home.layout.base')

@section('header')
<header class="intro-header" style="background-image: url('{{ asset("home/img/post-bg.jpg") }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1>{{ $article->title }}</h1>
                    <h2 class="subheading">{{ strip_tags($article->des) }}</h2>
                    <span class="meta">Posted by <a href="#">{{ $article->user->username }}</a> on {{ date('Y-n-j',$article->created) }}. {{ $article->view }} views</span>
                </div>
            </div>
        </div>
    </div>
</header>
@stop

@section('content')
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 post">
                {!! $article->content !!}

                <hr>

                {{-- 评论 --}}
                {!! $webset->comment !!}
            </div>
        </div>
    </div>
</article>
@stop
