@extends('backend.layouts.master')
@section('section-title')
@lang('backend.common.list_category')
@stop
@section('content')
@include('messages')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <table class="table table-bordered" id="categories-table">
        <thead>
            <tr>
                <th>@lang('lang_admin.category.label_id')</th>
                <th>@lang('lang_admin.category.label_name')</th>
                <th>@lang('lang_admin.category.label_action')</th>
            </tr>
        </thead>
    </table>

@stop
@push('end-page-scripts')
<script>
$(function() {
    $('#categories-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('categories.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
var categoryData = {
        'examId' : 0,
        'token' : '{{csrf_token()}}',
        'url' : '{{ action('Backend\CategoryController@destroy') }}/'
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
<script src="{{asset('js/category/main.js')}}"></script>
@endpush
