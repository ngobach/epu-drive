@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Bảng tin</h2>
    <p>Các bài đăng bởi quản trị viên. Các thành viên chú ý nộp bài trước khi thời hạn kết thúc</p>
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-primary">
                @forelse ($tasks as $task)
                <div class="panel-body item {{ $task->expired()?'expired':''}}">
                    <div class="clearfix">
                        <img src="{!! Gravatar::get($task->user->email) !!}" class="img-thumbnail item-thumbnail pull-left">
                        <div>
                            <div class="cleafix">
                                <small>Đăng bởi <b class="text-primary">{{ $task->user->name }}</b> lúc <em>{{$task->created_at}}</em></small>
                                <div class="pull-right">
                                    <small title="{{$task->end_at}}" data-toggle="tooltip" data-placement="top">Hạn nộp: {{$task->end_at->diffForHumans()}}</small>
                                </div>
                            </div>
                            <div>
                                <a href="{!!action('HomeController@showDetail', ['id'=>$task->id])!!}"><strong style="font-size: 16pt">{{str_limit($task->title,180)}}</strong></a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="panel-body">
                    <h3>Hiện chưa có bài nào!</h3>
                </div>
                @endforelse
            </div>
        </div>


        <div class="col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-stats"></i> Thống kê</h3>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 70">Số thành viên</th>
                        <td class="text-center">{{ $stat['total_user'] }}</td>
                    </tr>
                    <tr>
                        <th style="width: 70">Thành viên chưa kích hoạt</th>
                        <td class="text-center">{{ $stat['unactivated_user'] }}</td>
                    </tr>
                    <tr>
                        <th style="width: 70">Số chủ đề</th>
                        <td class="text-center">{{ $stat['total_task'] }}</td>
                    </tr>
                    <tr>
                        <th style="width: 70">Số tệp tin</th>
                        <td class="text-center">{{ $stat['total_file'] }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endpush