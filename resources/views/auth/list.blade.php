@extends('layouts.app')
@section('title', 'Danh sách thành viên')
@section('content')
	<div class="container">
		<h2>Danh sách thành viên</h2>
		<table class="table table-hover table-bordered table-centered">
			<thead>
				<tr>
					<th style="width: 10%">ID</th>
					<th style="width: 20%">Họ tên</th>
					<th style="width: 30%">Email</th>
					<th style="width: 30%">Quyền hạn</th>
					<th style="width: 10%">Chi tiết</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $u)
				<tr>
					<td>{{$u->id}}</td>
					<td>{{$u->name}}</td>
					<td>{{$u->email}}</td>
					@if ($u->admin)
					<td><span class="label label-danger"><b>Quản trị viên</b></span></td>
					@elseif ($u->teacher)
					<td><span class="label label-success"><b>Giảng viên</b></span></td>
					@else
					<td><span class="label label-default"><b>Sinh viên</b></span></td>
					@endif
					<td><a href="{!!action('UserController@getDetail', ['id'=>$u->id])!!}" class="btn btn-xs btn-info btn-block">Chi tiết</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection