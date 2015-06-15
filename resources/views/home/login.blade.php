<!DOCTYPE html>
<html class="login-bg">
<head>
	<title>Boomdawn Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="{{ asset('admin/css/bootstrap/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/bootstrap/bootstrap-responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/bootstrap/bootstrap-overrides.css') }}" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/layout.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/elements.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/icons.css') }}" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/lib/font-awesome.css') }}" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="{{ asset('admin/css/compiled/signin.css') }}" type="text/css" media="screen" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

    <div class="row-fluid login-wrapper">
        <a href=""></a>

        <div class="span4 box">
            <div class="content-wrap">
							<form action="{{ url('login') }}" method="post">
                <h6>Boomdawn</h6>
                <input class="span12" type="text" placeholder="Username" name="username" value="{{ old('username') }}" />
                <input class="span12" type="password" placeholder="Your password" name="password" />
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="submit" class="btn-glow primary login" value="登 录">
							</form>
							@if(!empty($errors->first()))
								<div class="alert alert-error">
	                <i class="icon-remove-sign"></i>
									{{ $errors->first() }}
	              </div>
							@endif
            </div>
        </div>
    </div>

	<!-- scripts -->
    <script src="{{ asset('admin/js/jquery.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/theme.js') }}"></script>
</body>
</html>
