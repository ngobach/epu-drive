<div class="list-group-item" id="file-{{$file->id}}">
	<div class="file">
		<div style="flex: 1">
			<p>
				<span style="font-size: 18pt"><i class="glyphicon glyphicon-download-alt"></i> {{basename($file->file_path)}}</span>
			</p>
			<small class="text-muted">Tải lên bởi <a href="{!!$file->user->profileUrl!!}"><b>{{$file->user->name}}</b></a>, {{$file->created_at}}</small>
		</div>
		<div class="file-mark">
			<div class="file-mark__mark">
				<span>{{ is_numeric($file->mark) ? number_format($file->mark, 1) : '--'}}</span>
			</div>
			<div class="btn-group btn-group-xs btn-group-justified">
				<a href="{!!action('HomeController@getFile', ['id' => $file->id ])!!}" class="btn btn-success">XEM</a>
				@if (Gate::check('delete-file', $file))
				<a href="javascript:void(0)" class="btn btn-danger" onclick="deleteFile({{$file->id}})">Xoá</a>
				@endif
			</div>
		</div>
	</div>
</div>