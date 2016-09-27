@extends('backend.layouts.master')
@section('section-title')
@lang('lang_admin.test.create')
@stop

@section('content')
@include('messages')
    <div class="x_content">
        <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.test.store') }}" enctype="multipart/form-data" id="upload_form" >
          {{ csrf_field() }}
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('lang_admin.label_image')
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="file"  name="image" id="image"/>
              <img src="{{url(config('path.imagetest'))}}" class = "setpicture img-thumbnail" id ="image_no"></img><br>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('lang_admin.test.label_name') <span class="required">@lang('lang_admin.label_required')</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12"  name="name" data-validetta="required,minLength[2],maxLength[128]" required="required" type="text">
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
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthday">@lang('lang_admin.test.number_question') <span class="required">@lang('lang_admin.label_required')</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12"  name="number_questions" required="required" type="text">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-4 col-xs-offset-3">
              <button id="send" id="addbtn" type="submit" class="btn btn-success">@lang('lang_admin.btn_submit')</button>
            </div>
          </div>
        </form>
    </div>
@stop
@push('end-page-scripts')
<script>
$(".addbtn").click(function(){
$.ajax({
      url:'',
      data:{
        data:new FormData($("#upload_form")[0]),
        },
      dataType:'json',
      async:false,
      type:'post',
      processData: false,
      contentType: false,
      success:function(response){
        console.log(response);
      },
    });
 });
 </script>
@endpush
