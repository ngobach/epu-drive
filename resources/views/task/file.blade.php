<div class="list-group-item clearfix" id="file-{{$file->id}}">
	<div class="pull-left" style="">
		<p>
			<span style="font-size: 18pt"><i class="glyphicon glyphicon-download-alt"></i> {{basename($file->file_path)}}</span>
		</p>
		<small class="text-muted">Tải lên bởi <a href="{!!$file->user->profileUrl!!}"><b>{{$file->user->name}}</b></a>, {{$file->created_at}}</small>
	</div>
	<div class="pull-right">
		<div class="btn-group">
		<a href="{!!action('HomeController@getFile', ['id' => $file->id ])!!}" class="btn btn-success">Tải xuống</a>
		@if (Gate::check('delete-file', $file))
		<a href="javascript:void(0)" class="btn btn-danger" onclick="deleteFile({{$file->id}})">Xoá</a>
		@endif
		</div>
	</div>
</div>