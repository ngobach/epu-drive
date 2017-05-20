@extends('layouts.app')

@section('title', 'Cấp quyền người dùng')

@section('content')
<div class="container">
	<div class="row">
		<div class="con-sm-8 col-sm-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<span class="panel-title">Quyền hạn người dùng</span>
				</div>
				<div class="panel-body">
					@include('common.status')
					@include('common.error')
				</div>
				@if ($user->id === auth()->user()->id)
				<div class="alert alert-danger">
					<strong>Cảnh báo</strong>
					<p>Bạn đang thực hiện phân quyền cho chính bạn. Hãy thận trọng!</p>
				</div>
				@endif
				<form action="{!! action('UserController@postPermission', ['id' => $user->id]) !!}" method="post" class="form form-horizontal">
					{!! csrf_field() !!}
					<div class="form-group">
						<div class="col-sm-2 text-right"><b>Quyền người dùng</b></div>
						<div class="col-sm-10 clearfix">
							<label><input type="radio" name="type" value="admin" @if ($user->admin) checked @endif/> Quản trị viên</label><br>
							<label><input type="radio" name="type" value="teacher" @if ($user->teacher) checked @endif/> Giảng viên</label><br>
							<label><input type="radio" name="type" value="student" @if (!$user->admin && !$user->teacher) checked @endif/> Người dùng bình thường (sinh viên)</label>
						</div>
					</div>
					<div class="form-group text-center">
						<div class="col-sm-12">
							<input type="submit" value="Xác nhận" class="btn btn-primary">
							<a href="javascript: void 0" onclick="history.back()" class="btn btn-warning">Trở lại</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script type="text/javascript">
	$('input').iCheck({
	    checkboxClass: 'icheckbox_square-blue',
	    radioClass: 'iradio_square-blue'
	});
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css" />
@endpush