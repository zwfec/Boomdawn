@extends('home.layout.base')

@section('header')
<header class="intro-header" style="background-image: url('{{ asset("home/img/home-bg.jpg") }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>{{ empty($name) ? $webset->title : $name }}</h1>
                    <hr class="small">
                    <span class="subheading">{{ empty($des) ? $webset->des : $des }}</span>
                </div>
            </div>
        </div>
    </div>
</header>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @foreach($list as $v)
            <div class="post-preview">
                <a href="{{ url('article/'.$v->id) }}">
                    <h2 class="post-title">
                      {{ $v->title }}
                    </h2>
                    <h3 class="post-subtitle">
                      {{ strip_tags($v->des) }}
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#">{{ $v->user->username }}</a> on {{ date('Y-n-j',$v->created) }}. {{ $v->view }} views</p>
            </div>
            <hr>
            @endforeach

            @if(empty($list->first()))
              <h4 class="list-empty">主人很懒，什么都没有写</h4>
            @endif

            <!-- Pager -->
            {!! $list->render() !!}
        </div>
    </div>
</div>
@stop
