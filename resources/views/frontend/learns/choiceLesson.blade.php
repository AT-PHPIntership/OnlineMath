@extends('frontend.layouts.master')
@section('section-title')
@lang('user.learn.choice_lesson')
@stop
@section('content')
<form action="{{ route('lesson.choice') }}" method="POST" class="form-horizontal form-label-left" novalidate id="print-bill">
  <div class="col-md-10 col-sm-10 col-xs-12">
    <div class="clearfix">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @foreach($groups as $group)
        <h3>@lang('user.learn.group')</h3>
        <h2 class="title"> {{$group->name}}</h2>
          <h4>@lang('user.learn.lesson')</h4>
        @if(count($group->lesson))
        @foreach ($group->lesson as $lesson)

        <div class="col-md-6">
          <a href="{{ route('test.lesson', [$lesson->id]) }}" >
            <input class ="form-control" id="question"  class="col-md-12" type ="text" value="{{$lesson->name}}"/>
          </a>
        </div>

        @endforeach
        @else
        @break
        @endif
        @endforeach


  </div>
</form>
@stop
@push('end-page-scripts')
<script src="/js/test/main.js" type="text/javascript">
</script>
@endpush
