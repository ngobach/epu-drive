@extends('layouts.app')
@section('title','Tài khoản: ' . auth()->user()->name)
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Đổi thông tin tài khoản</h3>
				</div>
				<div class="panel-body">

					@include('common.status')
					@include('common.error')

					<form action="{{ action('UserController@postEdit') }}" class="form-horizontal" method="post">

						{!! csrf_field() !!}

						
						<div class="form-group">
							<div class="col-sm-2" style="text-align: right">
								<img src="{!! Gravatar::get(Auth::user()->email) !!}" class="img-thumbnail" />
							</div>
							<div class="col-sm-10">
								<b>Thay đổi ảnh đại diện?</b><br>
								<small class="text-muted">Truy cập gravatar để thay đổi ảnh đại diện của bạn</small><br>
								<a href="http://vi.gravatar.com/" target="_blank" class="btn btn-sm btn-info">
									<i class="glyphicon glyphicon-picture"></i> Đi đến
								</a>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2">Họ tên</label>
							<div class="col-sm-10">
								<input type="text" name="name" class="form-control" value="{{ old('name',auth()->user()->name) }}" />
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2">Mật khẩu</label>
							<div class="col-sm-10">
								<input type="password" name="password" class="form-control"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-sm-2">Nhập lại</label>
							<div class="col-sm-10">
								<input type="password" name="password_confirmation" class="form-control"/>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<input type="submit" value="Đồng ý" class="btn btn-primary" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection