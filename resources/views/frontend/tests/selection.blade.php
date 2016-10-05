@extends('frontend.layouts.master')
@section('section-title')
@lang('user.test.choice_test')
@stop
@section('content')
@include('messages')
<form action="{{ route('test.selection') }}" method="POST" class="form-horizontal form-label-left" novalidate id="print-bill">
  <div class="col-md-10 col-sm-10 col-xs-12">
    <div class="clearfix">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @foreach($groups as $group)
        <h2 class="title"> {{$group->name}}</h2>
          <h4>@lang('user.learn.lesson')</h4>
        @if(count($group->test))
        @foreach ($group->test as $test)
        <div class="col-md-6">
          <a href="{{ route('test.exercise', [$test->id]) }}" >
            <input class ="form-control" id="question"  class="col-md-12" type ="text" value="{{$test->name}}"/>
          </a>
        </div>
        @endforeach
        @else
        @break
        @endforeach
  </div>
</form>
@stop
@push('end-page-scripts')
<script src="/js/test/main.js" type="text/javascript">
</script>
@endpush
