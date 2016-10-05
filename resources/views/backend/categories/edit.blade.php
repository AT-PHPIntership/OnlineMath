@extends('backend.layouts.master')
@section('section-title')
@lang('backend.common.update_category')
@stop
@section('content')
@include('messages')
<div class="x_content">
  <br />
  <form class="form-horizontal form-label-left" method="POST"
        action = "{{ route('admin.category.update', [$categories->id])}}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12"
             for="name">@lang('lang_admin.category.label_name')
        <span class="required">
          @lang('lang_admin.label_required')
        </span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="name"
               required="required" type="text" value="{{ $categories->name }}" >
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-4 col-xs-offset-3">
        <a class="btn btn-primary" href="{{ route('admin.category.index') }}">@lang('lang_admin.btn_cancel')
        </a>
        <button id="send" type="submit" class="btn btn-success"> @lang('lang_admin.btn_submit')
        </button>
      </div>
    </div>
  </form>
</div>
@stop
