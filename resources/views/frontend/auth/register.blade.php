@extends('frontend.layouts.master')

@section('page-title')
    @lang('common.auth.title_register') |
@endsection

@section('content')
@include('frontend.common.errors')
@include('frontend.common.success')
<!-- Registration form -->
<div class="col-sm-6 col-xs-12">
    <form id="registration_form" action="/register" method="post">
        <h3 class="form-header">@lang('common.auth.registration')</h3>

        {{ csrf_field() }}

        <div class="form-group col-lg-12">
            <label>@lang('common.auth.name')<span class="red">&nbsp;&ast;</span></label>
            <input type="text" name="name" class="form-control" data-validetta="required,minLength[2],maxLength[128]" value="">
        </div>

        <div class="form-group col-lg-12">
            <label>@lang('common.auth.username')<span class="red">&nbsp;&ast;</span></label>
            <input type="text" name="username" class="form-control"  data-validetta="required" value="">
        </div>

        <div class="form-group col-lg-6">
            <label>@lang('common.auth.password')<span class="red">&nbsp;&ast;</span></label>
            <input type="password" name="password" class="form-control" data-validetta="required,minLength[6],maxLength[32]" value="">
        </div>

        <div class="form-group col-lg-6">
            <label>@lang('common.auth.repeat_pass')<span class="red">&nbsp;&ast;</span></label>
            <input type="password" name="password_confirmation" class="form-control" data-validetta="required,minLength[6],maxLength[32],equalTo[password]" value="">
        </div>
          <div class="form-group col-lg-6">
            <label>@lang('common.auth.birthday')<span class="red">&nbsp;&ast;</span></label>
            <input type="text" name="birthday" class="form-control" data-validetta="required,minLength[6],maxLength[32]" value="">
        </div>
          <div class="form-group col-lg-6">
            <label>@lang('common.auth.address')<span class="red">&nbsp;&ast;</span></label>
            <input type="text" name="address" class="form-control" data-validetta="required,minLength[6],maxLength[32]" value="">
        </div>
        <div class="form-group col-sm-12">
            <input type="checkbox" class="checkbox agree-checkbox" id="agree-checkbox" data-validetta="required"/> <label for="agree-checkbox" class="agreement"> @lang('common.auth.agreement_text')</label>
        </div>

        <div class="hr center-block"></div>


        <div class="form-group col-lg-6">
            <button type="submit" class="btn btn-primary btn-block" name="signup">@lang('common.auth.signup')</button>
        </div>
    </form>
</div> <!--/ Registration form -->
@endsection
