@extends('layouts.app')
@section('title', $task->title)

@section('content')
<div class="container">
	@include('common.status')
	<div class="row">
		<div class="col-sm-9">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">{{$task->title}}</h3>
				</div>
				<div class="panel-body">
					{!!$task->description!!}
				</div>
				<div class="panel-footer clearfix">
					@if (auth()->user()->admin)
					<div class="btn-group pull-left">
						<a class="btn btn-xs btn-primary" href="{!!action('TaskController@getEdit',['id'=>$task->id])!!}">Sửa bài</a>
						<a class="btn btn-xs btn-danger" href="#">Xóa bài</a>
					</div>
					@endif
					<div class="pull-right">
						Đăng bởi <strong data-toggle="tooltip" title="{{$task->user->email}}">{{$task->user->name}}</strong>, {{$task->created_at->diffForHumans()}}
					</div>
				</div>
			</div>

			<!-- File sections -->
			@if (count($files) > 0)
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Các bài nộp</h3>
				</div>
				<div class="list-group">
					@foreach ($files as $file)
					<div class="list-group-item clearfix">
						<div class="pull-left" style="">
							<p><strong>{{basename($file->file_path)}}</strong></p>
							<small class="text-muted">Tải lên bởi <b>{{$file->user->name}}</b>, {{$file->created_at}}</small>
						</div>
						<div class="pull-right">
							<div class="btn-group">
							<a href="{!!action('HomeController@getFile', ['id' => $file->id ])!!}" class="btn btn-success">Tải xuống</a>
							@can('detete-file', $file)
							<a href="javascript:void(0)" class="btn btn-danger" onclick="deleteFile({{$file->id}})">Tải xuống</a>
							@endcan
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			@endif
		</div>
		<div class="col-sm-3">
			@if ($task->expired())
			<div class="alert alert-warning">
				<strong>Cảnh báo</strong>
				<p>Thời hạn nộp bài đã hết !</p>
			</div>
			@else
			@can('upload', $task)
			<!-- File submission -->
			@include('common.error')
			<form action="{!! action('HomeController@postFile', ['id'=>$task->id]) !!}" method="post" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<div class="input-group" style="margin-bottom: 10px">
					<input type="file" name="file" class="form-control">
  					<span class="input-group-btn">
  						<button type="submit" class="btn btn-primary">Nộp file</button>
  					</span>
				</div>	
			</form>
			@else
			<div class="alert alert-warning">
				Bạn đã nộp bài!
			</div>
			@endcan

			<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Thời hạn nộp bài sẽ kết thúc sau
				<strong>{{$task->end_at->diffForHumans()}}</strong>
			</div>
			@endif
		</div>
	</div>
</div>


<!-- Modal Dialogs -->
<div class="modal fade" id="delete-confirm">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Xác nhận xóa</h4>
      </div>
      <div class="modal-body">
        <p>Bạn muốn xóa file này?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-primary">Xóa</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@push('scripts')
<script type="text/javascript">
$(function(){
    $('[data-toggle="tooltip"]').tooltip()
});
</script>
@endpush