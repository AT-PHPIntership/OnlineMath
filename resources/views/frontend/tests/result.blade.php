@extends('frontend.layouts.master')
@section('section-title')
@lang('user.question.exercise')
@stop
@section('content')
@include('messages')
<div class="form-group col-lg-12">
  <label>@lang('user.test.score')
  </label>
<input type="text" name="score" id="score">
</div>
@stop
