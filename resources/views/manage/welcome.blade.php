@extends('manage.base')

@section('container')
<div class="content">
		<div class="container-fluid">
				<div id="pad-wrapper">

						<!-- orders table -->
						<div class="table-wrapper orders-table section">
								<div class="row-fluid head" style="margin-bottom:30px;">
										<div class="span12">
												<h4>欢迎回来，{{ $user->username }}</h4>
										</div>
								</div>

								<div class="row-fluid">
										<table class="table table-hover">
														<!-- row -->
														<tr class="first">
															<td>用户名</td>
															<td>{{ $user->username }}</td>
														</tr>
														<tr>
															<td>最后登录时间</td>
															<td>{{ date('Y-m-d H:i', $user->last_login_time) }}</td>
														</tr>
														<tr>
															<td>最后登录IP</td>
															<td>{{ $user->last_login_ip }}</td>
														</tr>
														<tr>
															<td>运行环境</td>
															<td>{{ $data['os'] }}</td>
														</tr>
														<tr>
															<td>上传许可</td>
															<td>{{ $data['max_upload'] }}</td>
														</tr>
														<tr>
															<td>系统版本</td>
															<td>Boomdawn v-1.0</td>
														</tr>
												</tbody>
										</table>
								</div>
						</div>
						<!-- end orders table -->
				</div>
		</div>
</div>
@stop
