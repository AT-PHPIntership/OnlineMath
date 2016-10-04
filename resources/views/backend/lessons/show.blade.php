@extends('backend.layouts.master')
@section('section-title')
@lang('backend.common.show_lesson')
@stop
@section('content')
@include('messages')
@section('content')
<div class="x_content">
  <br />
  <form class="form-horizontal form-label-left" method="POST">
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12"
    for="name">@lang('lang_admin.lesson.label_name')
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input id="name" class="form-control col-md-7 col-xs-12"  name="name"  type="text" value="{{ $lesson->name }}" disabled="" >
    </div>
  </div>
  <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">@lang('lang_admin.lesson.description')
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea  name="description" class="form-control col-md-7 col-xs-12" disabled="">{{ $lesson->description }}</textarea>
      </div>
    </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">
    @lang('lang_admin.lesson.label_page')</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="page"   class="form-control col-md-7 col-xs-12"  disabled="" value="{{ $lesson->page}}">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">
    @lang('lang_admin.lesson.label_index')</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="index"   class="form-control col-md-7 col-xs-12" value="{{ $lesson->index}}">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">
    @lang('lang_admin.lesson.label_group')</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="group_id"   class="form-control col-md-7 col-xs-12" disabled="" value="{{ $lesson->group_id}}">
    </div>
  </div>
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">
      @lang('lang_admin.lesson.label_category')</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="category_id"   class="form-control col-md-7 col-xs-12" disabled=""  value="{{ $lesson->category_id}}">
      </div>
    </div>
  <div class="form-group">
    <div class="col-md-6 col-xs-offset-3">
      <a class="btn btn-primary" href="{{ route('admin.lesson.index') }}">@lang('lang_admin.lesson.btn_cancel')</a>
    </div>
  </div>
</form>
</div>
@stop
