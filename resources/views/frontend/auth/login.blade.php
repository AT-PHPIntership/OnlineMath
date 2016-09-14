@extends('frontend.layouts.master')
@section('page-title')
@lang('common.auth.login') |
@endsection
@section('content')
<div class="col-md-4 well">
  <form id="login_form" action="{{route('auth.login')}}" method="post">
    <h3 class="form-header">@lang('common.auth.login')
    </h3>
    <div class="form-group col-lg-12">
      @include('frontend.common.errors')
    </div>
    {{ csrf_field() }}
    <div class="form-group col-lg-12">
      <label>@lang('common.auth.username')
        <span class="red">&nbsp;&ast;
        </span>
      </label>
      <input type="text" name="username" class="form-control"  data-validetta="required" value="">
    </div>
    <div class="form-group col-lg-12">
      <label>@lang('common.auth.password')
        <span class="red">&nbsp;&ast;
        </span>
      </label>
      <input type="password" name="password" class="form-control" data-validetta="required,minLength[6],maxLength[32]" value="">
    </div>
    <div class="form-group col-sm-12">
      <input type="checkbox" name="remember" id="agree-checkbox" class="checkbox agree-checkbox"/>
      <label for="agree-checkbox" class="agreement"> @lang('common.auth.remember')
      </label>
    </div>
    <div class="hr center-block">
    </div>
    <div class="form-group">
      <div class="col-md-6 col-md-offset-3">
        <button id="send" type="submit" class="btn btn-success">@lang('common.auth.login')
        </button>
        <a href="{{url('/register')}}" class="btn btn-primary">@lang('common.auth.signup')
        </a>
      </div>
    </div>
    <div class="hr center-block">
    </div>
    <div class="form-group col-lg-12">
      <a href="{{url('/password/reset')}}" class="pull-right">@lang('common.auth.forget_pass')
      </a>
    </div>
  </form>
</div>
@endsection
