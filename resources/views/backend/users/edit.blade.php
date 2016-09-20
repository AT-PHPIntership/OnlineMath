@extends('backend.layouts.master')
@section('section-title')
@lang('backend.common.updateuser')
@stop
@section('content')
@include('messages')
<div class="x_content">
  <br />
  <form class="form-horizontal form-label-left" method="POST"
        action = "{{ route('admin.user.update', [$users->id])}}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12"
             for="name">@lang('lang_admin.label_name')
        <span class="required">
          @lang('lang_admin.label_required')
        </span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="name"
               required="required" type="text" value="{{ $users->name }}" >
      </div>
    </div>
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12"
             for="name">@lang('lang_admin.label_username')
        <span class="required">
          @lang('lang_admin.label_required')
        </span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="username"
               required="required" type="text" value="{{ $users->username }}" >
      </div>
    </div>
    @if (Auth()->user()->role_id == \Config::get('common.ADMIN_ROLE_ID') &&
    $users->role_id != \Config::get('common.ADMIN_ROLE_ID'))
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">
        @lang('lang_admin.label_permission')
        <span class="required">@lang('lang_admin.label_required')
        </span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control" name="role_id" class="form-control col-md-7 col-xs-12">
          <option value="{{ \Config::get('common.USER_ROLE_ID') }}" {{ $users->role_id == \Config::get('common.USER_ROLE_ID') ? 'selected' : '' }}>
            @lang('lang_admin.option_user')
          </option>
          <option value="{{ \Config::get('common.CUSTOMER_ROLE_ID') }}" {{ $users->role_id == \Config::get('common.CUSTOMER_ROLE_ID') ? 'selected' : '' }}>
            @lang('lang_admin.option_customer')
          </option>
        </select>
      </div>
    </div>
    @endif
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12"
             for="name">@lang('lang_admin.label_birthday')
        <span class="required">
          @lang('lang_admin.label_required')
        </span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="birthday"
               required="required" type="text" value="{{ $users->birthday }}" >
      </div>
    </div>
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">
        @lang('lang_admin.label_gender')
        <span class="required">@lang('lang_admin.label_required')
        </span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="radio" name="gender" value="{{ \Config::get('common.MALE_GENDER') }}" {{ $users->gender == \Config::get('common.MALE_GENDER') ? 'checked':''}} />
        <label class="control-label"> @lang('lang_admin.label_male')
        </label>
        &nbsp;
        <input type="radio" name="gender" value="{{ \Config::get('common.FEMALE_GENDER') }}" {{ $users->gender == \Config::get('common.FEMALE_GENDER') ? 'checked':''}} />
        <label class="control-label">@lang('lang_admin.label_female')
        </label>
      </div>
    </div>
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12"
             for="name">@lang('lang_admin.label_address')
        <span class="required">
          @lang('lang_admin.label_required')
        </span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="address"
               required="required" type="text" value="{{ $users->address}}" >
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-4 col-xs-offset-3">
        <a class="btn btn-primary" href="{{ route('admin.user.index') }}">@lang('lang_admin.btn_cancel')
        </a>
        <button id="send" type="submit" class="btn btn-success"> @lang('lang_admin.btn_submit')
        </button>
      </div>
    </div>
  </form>
</div>
@stop
