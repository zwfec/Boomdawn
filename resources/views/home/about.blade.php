@extends('home.layout.base')

@section('header')
<header class="intro-header" style="background-image: url('{{ asset("home/img/about-bg.jpg") }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>{{ $about->title }}</h1>
                    <hr class="small">
                    <span class="subheading">{{ $webset->des }}</span>
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
            {!! $about->content !!}

            <hr>

            {{-- 评论 --}}
            {!! $webset->comment !!}
        </div>
    </div>
</div>
@stop
