<!DOCTYPE html>
<html>
<head>
	<title>Boomdawn Manage</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="{{ asset('admin/css/bootstrap/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/bootstrap/bootstrap-responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/bootstrap/bootstrap-overrides.css') }}" type="text/css" rel="stylesheet" />

		<!-- libraries -->
    <link href="{{ asset('admin/css/lib/bootstrap-wysihtml5.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('admin/css/lib/uniform.default.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('admin/css/lib/select2.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('admin/css/lib/bootstrap.datepicker.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('admin/css/lib/font-awesome.css') }}" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/layout.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/elements.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/icons.css') }}" />
    <link href="{{ asset('admin/css/lib/font-awesome.css') }}" type="text/css" rel="stylesheet" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="{{ asset('admin/css/compiled/tables.css') }}" type="text/css" media="screen" />
		<link rel="stylesheet" href="{{ asset('admin/css/compiled/form-showcase.css') }}" type="text/css" media="screen" />
		<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" type="text/css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
		<div class="alert alert-success" id="alert-success">
				<i class="icon-ok-sign"></i><span></span>
		</div>
		<div class="alert alert-error" id="alert-error">
				<i class="icon-remove-sign"></i><span></span>
		</div>

    <!-- navbar -->
    @include('manage.navbar')
    <!-- end navbar -->

    <!-- sidebar -->
    @include('manage.sidebar')
    <!-- end sidebar -->

	  <!-- main container -->
    @yield('container')
		<!-- end main container -->

		<!-- scripts -->
		<script src="{{ asset('admin/js/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap-wysihtml5-0.0.2.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.datepicker.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.uniform.min.js') }}"></script>
    <script src="{{ asset('admin/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin/js/theme.js') }}"></script>

		<!-- call this page plugins -->
    <script type="text/javascript">
        $(function () {

            // add uniform plugin styles to html elements
            $("input:checkbox, input:radio").uniform();

            // select2 plugin for select elements
            $(".select2").select2({
                placeholder: "Select a State"
            });

            // datepicker plugin
            $('.datepicker').datepicker().on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });

            // wysihtml5 plugin on textarea
            $(".wysihtml5").wysihtml5({
                "font-styles": false
            });
        });
				$(function(){
					//异步csrf
					$.ajaxSetup({
			      headers: {
			        'X-CSRF-TOKEN': "{{ csrf_token() }}"
			      }
			    });
					//错误提示
					var status = "{{ session('status') }}";
					var error = "{{ $errors->first() }}";
					if (status == 1) {
						$('#alert-success span').text(error);
						$('#alert-success').slideDown('slow');
						setTimeout(function(){
							$('#alert-success').slideUp('slow');
						},2000);
					} else if (status == 2) {
						$('#alert-error span').text(error);
						$('#alert-error').slideDown('slow');
						setTimeout(function(){
							$('#alert-error').slideUp('slow');
						},2000);
					}
					//操作确定
					$('.del').click(function() {
						if (!confirm('确定执行该操作？')) {
							return false;
						}
					});
					//菜单选中
					$('#dashboard-menu li').each(function() {
						var class_name = $(this).attr('class-name');
						if (class_name == "{{ $current }}") {
							$(this).addClass('active');
							$(this).find('a').append('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');
						}
					});
				});
    </script>
		@yield('footjs')
</body>
</html>
