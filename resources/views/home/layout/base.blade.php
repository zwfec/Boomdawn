<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $webset->des }}">
    <meta name="keyword" content="{{ $webset->keyword }}">

    <title>{{ empty($name) ? '' : $name.' - ' }} {{ $webset->title }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://cdn.bootcss.com/prettify/r298/prettify.min.css" rel="stylesheet">
    <link href="{{ asset('home/css/clean-blog.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Navigation -->
    @include('home.layout.nav')
    <!-- end Navigation -->

    <!-- Page Header -->
    @yield('header')
    <!-- end Page Header -->

    <!-- Main Content -->
    @yield('content')

    @include('home.layout.footer')

    <!-- jQuery -->
    <script src="{{ asset('home/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://cdn.bootcss.com/prettify/r298/prettify.min.js"></script>
    <script src="{{ asset('home/js/clean-blog.min.js') }}"></script>
    <script>
      $(window).load(function(){
        $("pre").addClass("prettyprint");
        prettyPrint();
      })

      //返回顶部
      $(window).scroll(function() {
        var wt = $(window).scrollTop();
        if (wt > 200) {
          $('#backtop').fadeIn();
        } else {
          $('#backtop').fadeOut();
        }
      });
      $('#backtop').click(function() {
        $('html,body').animate({scrollTop:0},500);
        return false;
      });

      //内容页图片显示
      $(function(){
        $('.post p img').width($('.post').width());
        $(window).resize(function() {
          $('.post p img').width($('.post').width());
        });
      });
    </script>
</body>

</html>
