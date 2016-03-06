@extends('layouts.app')
@section('title', 'Kích hoạt tài khoản')
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Kích hoạt tài khoản</h3>
		</div>
		<div class="panel-body">
			<h4>Danh sách tài khoản chưa kích hoạt</h4>
			@include('common.status')
		</div>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th style="width: 40%">Email</th>
					<th style="width: 40%">Họ tên</th>
					<th class="text-center">Thao tác</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($users as $user)
				<tr>
					<td>{{ $user->email }}</td>
					<td>{{ $user->name }}</td>
					<td class="text-center">
						<form action="{!! action('UserController@postActivation') !!}" method="POST">
							{!! csrf_field() !!}
							<input type="hidden" name="id" value="{!! $user->id !!}">
							<input type="submit" href="#" class="btn btn-xs btn-primary" name="activate" value="Kích hoạt">
							<input type="submit" href="#" class="btn btn-xs btn-danger" name="delete" value="Xóa">
						</form>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="3" class="text-center" style="padding: 20px 0px">
						<strong>Không có tài khoản nào chờ kích hoạt!</strong>
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection