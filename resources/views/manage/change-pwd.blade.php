@extends('manage.base')

@section('container')
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span8 column">
                    <form action="{{ url('manage/change-pwd') }}" method="post">
                    <div class="field-box">
                        <label>原密码:</label>
                        <input class="span8 inline-input" data-toggle="tooltip" data-trigger="focus" title="请输入原密码" data-placement="right" type="text" name="oldpwd" />
                    </div>
                    <div class="field-box">
                        <label>新密码:</label>
                        <input class="span8 inline-input" data-toggle="tooltip" data-trigger="focus" title="请设置新密码" data-placement="right" type="password" name="newpwd" />
                    </div>
                    <div class="field-box">
                        <label>确认密码:</label>
                        <input class="span8 inline-input" data-toggle="tooltip" data-trigger="focus" title="请再次输入新密码" data-placement="right" type="password" name="newpwd2" />
                    </div>
                    <div class="field-box">
                        <label></label>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn-glow primary btn-next" value="确定">
                    </div>
                    @if(!empty($errors->first()))
                    <div class="field-box">
                        <div class="alert alert-error">
        	                <i class="icon-remove-sign"></i>
        									{{ $errors->first() }}
        	              </div>
                    </div>
      							@endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
