@extends('frontend.layouts.master')
@section('section-title')
@lang('frontend.test.choice_test')
@stop
@section('content')
@include('messages')
<form action="{{ route('test.selection') }}" method="POST" class="form-horizontal form-label-left" novalidate id="print-bill">
  <div class="col-md-7 col-sm-7 col-xs-12">
    <div class="clearfix">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div id="items_container" class="row">
      @foreach($groups as $group)
      <input type="text" name="name_group" value="{{$group->name}}"/>
      @if(count($group->test))
      @foreach ($group->test as $test)
      <a href="{{ route('test.exercise', [$test->id]) }}" class="btn btn-warning btn-xs">
        <input type ="text" value="{{$test->name}}"
        <i class="fa fa-pencil-square-o" aria-hidden="true">
        </i>
      </a>
      @endforeach
      @else
      @break
      @endif
      @endforeach
    </div>
  </div>
</form>
@stop
@push('end-page-scripts')
<script src="/js/test/main.js" type="text/javascript">
</script>
@endpush
