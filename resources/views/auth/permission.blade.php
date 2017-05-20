@extends('layouts.app')

@section('title', 'Quyền hạn người dùng')

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
				<form action="{!! action('UserController@postPermission') !!}" method="post" class="form form-horizontal">
					{!! csrf_field() !!}
					<div class="form-group">
						<label for="admin" class="col-sm-2 text-right">Admin</label>
						<div class="con-sm-10">
							<input type="checkbox" name="admin" id="admin" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script type="text/javascript" charset="utf-8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<script type="text/javascript">
	$(function() {
		$("input[type='checkbox']").bootstrapSwitch();
	})
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap2/bootstrap-switch.min.css" />
@endpush