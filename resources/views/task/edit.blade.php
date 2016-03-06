@extends('layouts.app')
@section('title', $task?'Sửa bài':'Bài mới')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">{{ $task?'Sửa bài':'Bài mới' }}</h3>
					</div>
					<div class="panel-body">
						@include('common.error')
						@include('common.status')
						<form action="{{ action('TaskController@postEdit') }}" method="POST" class="form-horizontal" role="form">
							{!! csrf_field() !!}
							<input type="hidden" name="id" value="{!! $task?$task->id:0 !!}">
							<div class="form-group">
								<label class="control-label col-sm-2">Tiêu đề</label>
								<div class="col-sm-10">
									<input class="form-control" name="title" placeholder="Tiêu đề của bài" required="required" value="{{old('title',$task?$task->title:'')}}">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-sm-2">Nội dung</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="5" name="content">{!!old('content',$task?$task->description:'')!!}</textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2">Ngày kết thúc</label>
								<div class="col-sm-10">
									<input name="end_at" id="end_at" class="form-control" required="" value="{{old('end_at',$task?$task->end_at->format('Y/m/d H:i'):'')}}">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									<button type="submit" class="btn btn-primary">Đồng ý</button>
									@if ($task!==false)
									<a href="{!!action('HomeController@showDetail',['id'=>$task->id])!!}" class="btn btn-warning">Xem bài</a>
									@endif
									&nbsp; Bài sẽ được đăng với tư cách là: <strong>{{ auth()->user()->name }}</strong>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('styles')
<link rel="stylesheet" href="/plugins/jquery.datetimepicker.css">
@endpush

@push('scripts')>
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script type="text/javascript" src="/plugins/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
	CKEDITOR.replace('content');
	var opt = {
		mask: true,
		defaultDate: new Date(),
	};
	$('#end_at').datetimepicker(opt);
</script>
@endpush