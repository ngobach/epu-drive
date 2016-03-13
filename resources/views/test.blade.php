@extends('layouts.app')

@section('content')
<div class="container">
    <div class="well well-sm">
        <form class="form-inline" action="{!! url('/test') !!}" method="GET">
            <div class="form-group">
                <label class="control-label">Dòng</label>
                <input type="text" name="rows" class="form-control" value="{{$rows}}">
            </div>
            <div class="form-group">
                <label class="control-label">Cột</label>
                <input type="text" name="cols" class="form-control" value="{{$cols}}">
            </div>
            <input type="submit" value="Đồng ý" class="btn btn-primary.">
        </form>
    </div>
    <table class="table table-hover table-striped">
        @for ($i=0;$i<$rows;$i++)
            <tr>
            @for ($j=0;$j<$cols;$j++)
                <td>Dòng {{$i}} cột {{$j}}</td>
            @endfor
            </tr>
        @endfor
    </table>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    CKEDITOR.replace('sample');
</script>
@endpush

@push('styles')
<style type="text/css">
    body {

    }
</style>
@endpush
