@extends('manage.base')

@section('container')
<div class="content">
  <div class="container-fluid">
    <div id="pad-wrapper" class="form-page">
      <div class="row-fluid head" style="margin-bottom:50px;">
          <div class="span12">
              <h4>网站设置</h4>
          </div>
      </div>
      <div class="row-fluid form-wrapper">
        <!-- left column -->
        <div class="span12 column">
          <form method="post" action="{{ url('manage/set/edit') }}">
            <div class="field-box">
                <label>标题:</label>
                <input class="span8 inline-input" data-toggle="tooltip" data-trigger="focus" title="" data-placement="top" type="text" data-original-title="网站标题不能为空" name="title" value="{{        $set->title }}" required="">
            </div>
            <div class="field-box">
                <label>关键字:</label>
                <input class="span8 inline-input" data-toggle="tooltip" data-trigger="focus" title="" data-placement="top" type="text" data-original-title="请输入网站关键字" name="keyword" value="{{        $set->keyword }}" required="">
            </div>
            <div class="field-box">
                <label>描述:</label>
                <input class="span8 inline-input" data-toggle="tooltip" data-trigger="focus" title="" data-placement="top" type="text" data-original-title="请输入网站描述" name="des" value="{{        $set->des }}" required="">
            </div>
            <div class="field-box">
                <label>版权信息:</label>
                <input class="span8 inline-input" data-toggle="tooltip" data-trigger="focus" title="" data-placement="top" type="text" data-original-title="底部版权信息" name="copy" value="{{        $set->copy }}" required="">
            </div>
            <div class="field-box">
                <label>分页条数:</label>
                <input class="span8 inline-input" data-toggle="tooltip" data-trigger="focus" title="" data-placement="top" type="text" data-original-title="文章分页的数量" name="page_num" value="{{        $set->page_num }}" required="">
            </div>
            <div class="field-box">
                <label></label>
                <input type="hidden" name="id" value="{{ $set->id }}">
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
