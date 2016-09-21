@extends('backend.layouts.master')
@section('section-title')
@lang('backend.common.create')
@stop

@section('content')
@include('messages')
    <div class="x_content">
        <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.user.store') }}">
          {{ csrf_field() }}
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('lang_admin.label_name') <span class="required">@lang('lang_admin.label_required')</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12"  name="name" placeholder="@lang('lang_admin.user.eg_name')" data-validetta="required,minLength[2],maxLength[128]" required="required" type="text" value="{{ old('name') }}">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('lang_admin.label_username') <span class="required">@lang('lang_admin.label_required')</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12"  name="username" placeholder="@lang('lang_admin.user.eg_username')" required="required" type="text" value="{{ old('usernamename') }}">
            </div>
          </div>
          <div class="item form-group">
            <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">@lang('lang_admin.label_password') <span class="required">@lang('lang_admin.label_required')</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="password" type="password"  name ="password" class="form-control col-md-7 col-xs-12"  data-validetta="required,minLength[6],maxLength[32]">
            </div>
          </div>
          <div class="item form-group">
            <label for="password_confirmation" class="control-label col-md-3 col-sm-3 col-xs-12">@lang('lang_admin.label_password_confirm') <span class="required">@lang('lang_admin.label_required')</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="password_confirmation" type="password" name="password_confirmation" data-validate-linked="required,minLength[6],maxLength[32],equalTo[password]" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="groups">@lang('lang_admin.label_role')
            <span class="required">@lang('lang_admin.label_required')</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="role_id">
                  <option value="">--@lang('lang_admin.select_empty')--</option>
                  @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
              </select>
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
            <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('lang_admin.label_gender') <span class="required">@lang('lang_admin.label_required')</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" id="gender" name="gender">
                <option value="@lang('lang_admin.label_male_number')">@lang('lang_admin.label_male')</option>
                <option value="@lang('lang_admin.label_female_number')">@lang('lang_admin.label_female')</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthday">@lang('lang_admin.label_birthday') <span class="required">@lang('lang_admin.label_required')</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12"  name="birthday" placeholder="birthday" required="required" type="text" value="{{ old('name') }}">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" data-validetta="required" for="address">@lang('lang_admin.label_address') <span class="required">@lang('lang_admin.label_required')</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12" data-validetta="required,minLength[6],maxLength[100]" name="address"  type="text">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-4 col-xs-offset-3">
              <a class="btn btn-primary" href="{{ route('admin.user.create') }}">@lang('lang_admin.btn_cancel')</a>
              <button id="send" type="submit" class="btn btn-success">@lang('lang_admin.btn_submit')</button>
            </div>
          </div>
        </form>
    </div>
@stop
