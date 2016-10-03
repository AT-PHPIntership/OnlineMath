@extends('backend.layouts.master')
@section('section-title')
@lang('backend.common.create_category')
@stop

@section('content')
@include('messages')
    <div class="x_content">
        <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.category.store') }}">
          {{ csrf_field() }}
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('lang_admin.label_name') <span class="required">@lang('lang_admin.label_required')</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12"  name="name" data-validetta="required,minLength[2],maxLength[128]" required="required" type="text">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-4 col-xs-offset-3">
              <a class="btn btn-primary" href="{{ route('admin.category.create') }}">@lang('lang_admin.btn_cancel')</a>
              <button id="send" type="submit" class="btn btn-success">@lang('lang_admin.btn_submit')</button>
            </div>
          </div>
        </form>
    </div>
@stop
