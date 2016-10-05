@extends('backend.layouts.master')
@section('section-title')
@lang('backend.common.update_lesson')
@stop
@section('content')
@include('messages')
<div class="x_content">
  <br />
  <form class="form-horizontal form-label-left" method="POST"
        action = "{{ route('admin.lesson.update', [$lessons->id])}}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12"
             for="name">@lang('lang_admin.lesson.label_name')
        <span class="required">
          @lang('lang_admin.label_required')
        </span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="name"
               required="required" type="text" value="{{ $lessons->name }}" >
      </div>
    </div>
    <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">@lang('lang_admin.lesson.description')
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <textarea  name="description" class="form-control col-md-7 col-xs-12">{{ $lessons->description }}</textarea>
        </div>
      </div>
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12"
             for="name">@lang('lang_admin.lesson.label_page')
        <span class="required">
          @lang('lang_admin.label_required')
        </span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="page"
               required="page" type="text" value="{{ $lessons->page }}" >
      </div>
    </div>
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12"
             for="name">@lang('lang_admin.lesson.label_index')
        <span class="required">
          @lang('lang_admin.label_required')
        </span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="name"
               required="index" type="text" value="{{ $lessons->index }}" >
      </div>
    </div>
    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="groups">@lang('lang_admin.label_group')
      <span class="required">@lang('lang_admin.label_required')</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control" name="group_id">
            <option value="#">--@lang('lang_admin.select_empty')--</option>
            @foreach($groups as $group)
              <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
        </select>
      </div>
  </div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-4 col-xs-offset-3">
        <a class="btn btn-primary" href="{{ route('admin.lesson.index') }}">@lang('lang_admin.btn_cancel')
        </a>
        <button id="send" type="submit" class="btn btn-success"> @lang('lang_admin.btn_submit')
        </button>
      </div>
    </div>
  </form>
</div>
@stop
