@extends('layouts.app')
@section('title', 'Thông tin tài khoản ' . $user->name)
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Thông tin người dùng</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-sm-2" style="text-align: right">
							<img src="{!! Gravatar::get($user->email) !!}" class="img-thumbnail" />
						</div>
						<div class="col-sm-10">
							<h3>{{$user->name}}</h3>
							<p><span class="label label-success">{{$user->email}}</span></p>
							<hr>
							@if ($user->actived)
							<p class="text-muted">Thành viên</p>
							@else
							<p class="text-warning">Thành viên chờ kích hoạt</p>
							@endif
							@if ($user->admin)
							<p class="text-danger">Quản trị viên</p>
							@endif
							@if ($user->teacher)
							<p class="text-warning">Giảng viên</p>
							@endif
							<p>Tham gia từ: {{$user->created_at->format('d/m/Y')}}</p>
							<div class="text-center">
								@if (auth()->user()->admin || auth()->user()->id == $user->id)
								<a href="{!!action('UserController@getEdit', ['id'=>$user->id])!!}" class="btn btn-primary">Chỉnh sửa</a>
								<a href="{!!action('UserController@getPermission', ['id'=>$user->id])!!}" class="btn btn-info">Phân quyền</a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection