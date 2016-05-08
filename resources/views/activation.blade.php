@extends('layouts.app')
@section('title', 'Chờ kích hoạt')

@section('content')
<div class="container">
	<div class="alert alert-info">
		<strong>Thông tin</strong><br>
		Tài khoản của bạn đang chờ kích hoạt bởi quản trị viên!
		<div class="text-right">
			<a href="{!!url('logout')!!}" class="btn btn-primary">Đăng xuất</a>
		</div>
	</div>
</div>
@endsection