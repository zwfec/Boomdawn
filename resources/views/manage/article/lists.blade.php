@extends('manage.base')

@section('container')
<div class="content">
		<div class="container-fluid">
				<div id="pad-wrapper">

						<!-- orders table -->
            <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>文章管理</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <a class="btn-flat success new-product" href="{{ url('manage/article/add') }}">新 增</a>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span3">标题</th>
                                    <th class="span3">
                                        <span class="line"></span>作者
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>分类
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>是否显示
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>排序
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>创建时间
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>修改时间
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
                                        {{ $v->title }}
                                    </td>
                                    <td class="description">
                                      {{ $v->user->username }}
                                    </td>
                                    <td class="description">
                                      {{ $v->category->name }}
                                    </td>
                                    <td class="description">
																			@if($v->is_show == 1)
																				<i class="icon-ok"></i>
																			@else
																				<i class="icon-remove"></i>
																			@endif
                                    </td>
                                    <td class="description">
                                      {{ $v->sort }}
                                    </td>
                                    <td class="description">
                                      {{ date('Y-m-d H:i',$v->created) }}
                                    </td>
                                    <td class="description">
                                      {{ date('Y-m-d H:i',$v->updated) }}
                                    </td>
                                    <td>
                                      <a href="{{ url('manage/article/edit/'.$v->id) }}" class="opera edit" ><i class="table-edit"></i></a>
                                      <a href="{{ url('manage/article/del/'.$v->id) }}" class="opera del"><i class="table-delete"></i></a>
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
@stop

@section('footjs')

@stop
