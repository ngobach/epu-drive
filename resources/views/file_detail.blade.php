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
					<div class="text-center">
						<h3>{{$name}}</h3>
						@if (!is_null($file->mark))
						<h2 style="font-size: 40pt">{{number_format($file->mark,1)}}</h2>
						<a href="{!!action('UserController@getDetail', ['id'=>$file->teacher->id])!!}"><span class="label label-success">{{$file->teacher->name}}</span></a>
						@endif
					</div>
					<hr>
					<p>Đăng bởi: <b>{{$file->user->name}}</b> ({{$file->user->email}})</p>
					<p>Lúc: <b>{{$file->created_at}}</b></p>
					<hr>
					@if (auth()->user()->teacher)
					@include('common.error')
					@include('common.status')
					<form action="" method="POST">
						{!!csrf_field()!!}
						<div class="input-group">
							<span class="input-group-addon">Cho điểm</span>
							<input type="text" name="mark" class="form-control" placeholder="Nhập điểm của bài làm..." value="{{$file->mark}}">
							<span class="input-group-btn">
								<input type="submit" class="btn btn-primary">Đồng ý</a>
							</span>
						</div>
					</form>
					<hr>
					@endif
					<div class="btn-group btn-group-justified btn-group-lg">
						<a href="{!!action('HomeController@showDetail', ['id' => $file->task->id])!!}#file-{{$file->id}}" class="btn btn-primary">Trở lại</a>
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