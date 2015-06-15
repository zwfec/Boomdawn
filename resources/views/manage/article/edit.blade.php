@extends('manage.base')

@section('container')
<div class="content">
  <div class="container-fluid">
    <div id="pad-wrapper" class="form-page">
      <div class="row-fluid head" style="margin-bottom:50px;">
          <div class="span12">
              <h4>编辑文章</h4>
          </div>
      </div>
      <div class="row-fluid form-wrapper">
        <!-- left column -->
        <div class="span12 column">
          <form method="post" action="{{ url('manage/article/edit') }}">
            <div class="field-box">
                <label>标题:</label>
                <input class="span8 inline-input" data-toggle="tooltip" data-trigger="focus" title="" data-placement="top" type="text" data-original-title="文章标题不能为空" name="title" value="{{        $article->title }}" required="">
            </div>
            <div class="field-box">
                <label>分类:</label>
                <div class="ui-select">
                    <select name="category_id">
                      <option value="0">请选择</option>
                      @foreach($categorys as $cate)
                        <option value="{{ $cate->id }}" @if($article->category_id == $cate->id) selected="selected" @endif>{{ $cate->name }}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="field-box">
                <label>内容:</label>
                <div class="span8" style="margin-left:0px;">
                <!-- 加载编辑器的容器 -->
                <script id="content" name="content" type="text/plain"><?php echo $article->content; ?></script>
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
                <label>简介:</label>
                <div class="span8" style="margin-left:0px;">
                <!-- 加载编辑器的容器 -->
                <script id="des" name="des" type="text/plain"><?php echo $article->des; ?></script>
                <!-- 实例化编辑器 -->
                <script type="text/javascript">
                    var ue = UE.getEditor('des');
                </script>
              </div>
            </div>
            @if(!empty($tags->first()))
              <div class="field-box">
                  <label>标签:</label>
                  @foreach($tags as $tag)
                    <label class="checkbox">
                        <div class="checker"><span><input type="checkbox" name="tag_id[]" value="{{ $tag->id }}" @if(in_array($tag->id, $tags_cur)) checked="checked" @endif></span></div>
                        {{ $tag->name }}
                    </label>
                  @endforeach
              </div>
            @endif
            <div class="field-box">
                <label>是否显示:</label>
                <div class="span8">
                    <label class="radio">
                        <div class="radio" id="uniform-optionsRadios1"><span class=""><input type="radio" name="is_show" id="optionsRadios1" value="1" @if($article->is_show == 1) checked="checked" @endif></span></div>
                        显示
                    </label>
                    <label class="radio">
                        <div class="radio" id="uniform-optionsRadios2"><span class="checked"><input type="radio" name="is_show" id="optionsRadios2" value="0" @if($article->is_show == 0) checked="checked" @endif></span></div>
                        不显示
                    </label>
                </div>
            </div>
            <div class="field-box">
                <label>排序:</label>
                <input class="span8 inline-input" data-toggle="tooltip" data-trigger="focus" title="" data-placement="top" type="text" data-original-title="数字从大到小排序" name="sort" value="{{ $article->sort }}">
            </div>
            <div class="field-box">
                <label></label>
                <input type="hidden" name="id" value="{{ $article->id }}">
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
