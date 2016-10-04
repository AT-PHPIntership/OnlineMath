@extends('backend.layouts.master')
@section('section-title')
@lang('backend.common.list_lesson')
@stop
@section('content')
@include('messages')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <table class="table table-bordered" id="lessons-table">
        <thead>
            <tr>
                <th>@lang('lang_admin.lesson.label_id')</th>
                <th>@lang('lang_admin.lesson.label_name')</th>
                <th>@lang('lang_admin.lesson.description')</th>
                <th>@lang('lang_admin.lesson.label_page')</th>
                <th>@lang('lang_admin.lesson.label_index')</th>
                <th>@lang('lang_admin.lesson.action')</th>
            </tr>
        </thead>
    </table>

@stop
@push('end-page-scripts')
<script>
$(function() {
    $('#lessons-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('lessons.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'page', name: 'page' },
            { data: 'index', name: 'index' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
var lessonData = {
        'examId' : 0,
        'token' : '{{csrf_token()}}',
        'url' : '{{ action('Backend\LessonController@destroy') }}/'
    };
</script>
@endpush
@push('stylesheet')
<link rel="stylesheet" href="{{asset('bower/datatables/media/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="{{asset('bower/datatables/media/css/jquery.dataTables.min.css') }}" media="screen" title="no title" charset="utf-8">
@endpush
@push('end-page-scripts')
<script src="{{asset('bower/datatables/media/js/jquery.js')}}">
</script>
<script src="{{asset('bower/datatables/media/js/jquery.dataTables.min.js')}}">
</script>
<script src="{{asset('bower/datatables/media/js/dataTables.bootstrap.min.js')}}">
</script>
<script src="{{asset('bower/datatables/media/js/jquery.dataTables.min.js')}}">
</script>
<script src="{{asset('js/lesson/main.js')}}"></script>
@endpush
