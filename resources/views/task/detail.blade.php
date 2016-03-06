@extends('layouts.app')
@section('title', $task->title)

@section('content')
<div class="container">
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
			</div>
			@endif
			<div class="pull-right">
				Đăng bởi <strong data-toggle="tooltip" title="{{$task->user->email}}">{{$task->user->name}}</strong>, {{$task->created_at->diffForHumans()}}
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
$(function(){
    $('[data-toggle="tooltip"]').tooltip()
});
</script>
@endpush