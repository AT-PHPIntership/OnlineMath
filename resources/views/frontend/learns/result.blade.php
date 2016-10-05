@extends('frontend.layouts.master')
@section('section-title')
@lang('user.learn.learn_score')
@stop
@section('content')
@include('messages')
<div   style="color:#070">
  <label>
    @lang('user.learn.score')
  </label>
  <input name="score" value="{{$score}}" >
  </input>

</div>
@stop
@push('end-page-scripts')
@endpush
