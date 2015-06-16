@extends('manage.base')

@section('container')
<div class="content">
		<div class="container-fluid">
				<div id="pad-wrapper">

						<!-- orders table -->
            <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>链接管理</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <a class="btn-flat success new-product" data-toggle="modal" data-target="#myModal" href="javascript:;">新 增</a>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span3">
                                      名称
                                    </th>
                                    <th class="span3">
                                      描述
                                    </th>
                                    <th class="span3">
                                      链接
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>排序
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row -->
                                @foreach($list as $v)
                                <tr>
                                    <td>
                                        {{ $v->name }}
                                    </td>
                                    <td class="description">
                                      {{ $v->des }}
                                    </td>
                                    <td class="description">
                                      {{ $v->url }}
                                    </td>
                                    <td class="description">
                                      {{ $v->sort }}
                                    </td>
                                    <td>
                                      <a href="javascript:;" data-toggle="modal" data-target="#myModal" class="opera edit" tag-id="{{ $v->id }}" name="{{ $v->name }}" sort="{{ $v->sort }}"><i class="table-edit"></i></a>
                                      <a href="{{ url('manage/tag/del/'.$v->id) }}" class="opera del"><i class="table-delete"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
						<!-- end orders table -->
						{!! $list->render() !!}
				</div>
		</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">添加</h4>
      </div>
      <form action="{{ url('manage/tag/add') }}" method="post">
        <div class="modal-body">
          <div class="container-fluid">
            <div class="field-box">
                <label>名称:</label>
                <input class="span5 inline-input" data-trigger="focus" type="text" name="name">
            </div>
            <div class="field-box">
                <label>排序:</label>
                <input class="span5 inline-input" data-trigger="focus" type="text" name="sort" placeholder="数字从大到小排序" value="0">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id" value="0">
          <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          <button type="submit" class="btn btn-primary" id="sub">确定</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop

@section('footjs')
<script type="text/javascript">
  $(function(){
    $('.new-product').click(function() {
      $('input[name=name]').val('');
      $('input[name=sort]').val('0');
      $('input[name=id]').val('0');
    });

    $('.edit').click(function() {
      var name = $(this).attr('name');
      var sort = $(this).attr('sort');
      var id   = $(this).attr('tag-id');

      $('input[name=name]').val(name);
      $('input[name=sort]').val(sort);
      $('input[name=id]').val(id);
    });
  });
</script>
@stop
