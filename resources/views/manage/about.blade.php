@extends('manage.base')

@section('container')
<div class="content">
  <div class="container-fluid">
    <div id="pad-wrapper" class="form-page">
      <div class="row-fluid head" style="margin-bottom:50px;">
          <div class="span12">
              <h4>关于</h4>
          </div>
      </div>
      <div class="row-fluid form-wrapper">
        <!-- left column -->
        <div class="span12 column">
          <form method="post" action="{{ url('manage/about/edit') }}">
            <div class="field-box">
                <label>标题:</label>
                <input class="span8 inline-input" data-toggle="tooltip" data-trigger="focus" title="" data-placement="top" type="text" data-original-title="标题不能为空" name="title" value="{{        $about->title }}" required="">
            </div>
            <div class="field-box">
                <label>内容:</label>
                <div class="span8" style="margin-left:0px;">
                <!-- 加载编辑器的容器 -->
                <script id="content" name="content" type="text/plain"><?php echo $about->content; ?></script>
                <!-- 配置文件 -->
                <script type="text/javascript" src="{{ asset('ueditor/ueditor.config.js') }}"></script>
                <!-- 编辑器源码文件 -->
                <script type="text/javascript" src="{{ asset('ueditor/ueditor.all.js') }}"></script>
                <!-- 实例化编辑器 -->
                <script type="text/javascript">
                    var ue = UE.getEditor('content',{
                      initialFrameHeight:320,
                    });
                </script>
              </div>
            </div>
            <div class="field-box">
                <label></label>
                <input type="hidden" name="id" value="{{ $about->id }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn-glow primary btn-next" value="确定">
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
