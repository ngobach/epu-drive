@extends('layouts.app')
@section('title', 'Xóa bài: ' . $task->title)
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="well">
				@if (!$deleted)
				<h3>Chắc chắn xóa?</h3>
				<p>Bài đăng sẽ không thể khôi phục, các tệp tin đồng thời cũng sẽ bị xóa</p>
				<p class="text-muted">{{$task->title}}</p>
				<div class="text-right">
					<form action="{!! action('TaskController@postDelete', ['id' => $task->id]) !!}" method="POST">
						{{ csrf_field() }}
						<button class="btn btn-default" type="button" onclick="javascript:history.back()">Trở lại</button>
						<button class="btn btn-primary" type="submit">Xác nhận</button>
					</form>
				</div>
				@else
				<h3>Bài đăng đã xóa thành công</h3>
				<a class="btn btn-default" href="{!! action('HomeController@index') !!}">Về trang chủ</a>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
