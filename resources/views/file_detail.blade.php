@extends('layouts.app')
@section('title', 'Tải xuống file: ' . $name)
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3" style="margin-top: 100px">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="glyphicon glyphicon-download"></i> Tải xuống</h3>
				</div>
				<div class="panel-body">
					<h3>{{$name}}</h3>
					<hr>
					<p>Đăng bởi: <b>{{$file->user->name}}</b>({{$file->user->email}})</p>
					<p>Lúc: <b>{{$file->created_at}}</b></p>
					<hr>
					<div class="btn-group btn-group-justified btn-group-lg">
						<a href="{!!action('HomeController@showDetail', ['id' => $file->task->id])!!}" class="btn btn-primary">Trở lại</a>
						@if ($file->url() !== false)
						<a href="{!!$file->url()!!}" class="btn btn-success">Tải xuống <i class="glyphicon glyphicon-download-alt"></i></a>
						@else
						<a href="#" class="btn btn-danger">Tệp tin đã xóa</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection