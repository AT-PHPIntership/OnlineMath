@extends('backend.layouts.master')
@section('section-title')
@lang('backend.common.create_lesson')
@stop
@section('content')
@include('messages')
@section('content')
    <div class="x_content">
        <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.lesson.store') }}">
          {{ csrf_field() }}
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('lang_admin.lesson.label_name') <span class="required">@lang('lang_admin.label_required')</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12"  name="name" data-validetta="required,minLength[2],maxLength[128]" required="required" type="text" value="{{ old('name') }}">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('lang_admin.lesson.label_page') <span class="required">@lang('lang_admin.label_required')</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12"  name="page"  required="required" type="number">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('lang_admin.lesson.description') <span class="required">@lang('lang_admin.label_required')</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12"  name="description"  required="required" type="text">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('lang_admin.lesson.label_index') <span class="required">@lang('lang_admin.label_required')</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12"  name="index"  required="required" type="number">
            </div>
          </div>
          <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="groups">@lang('lang_admin.lesson.label_group')
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
          <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="groups">@lang('lang_admin.lesson.label_category')
            <span class="required">@lang('lang_admin.label_required')</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="category_id">
                  <option value="">--@lang('lang_admin.select_empty')--</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
            </div>
        </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-4 col-xs-offset-3">
              <a class="btn btn-primary" href="{{ route('admin.lesson.create') }}">@lang('lang_admin.btn_cancel')</a>
              <button id="send" type="submit" class="btn btn-success">@lang('lang_admin.btn_submit')</button>
            </div>
          </div>
        </form>
    </div>
@stop
