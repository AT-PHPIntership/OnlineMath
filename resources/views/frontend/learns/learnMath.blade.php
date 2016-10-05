@extends('frontend.layouts.master')
@section('section-title')
@lang('user.learn.lesson_test')
@stop
@section('content')
@include('messages')
<form action="{{ url('user/learn/lesson/'.$id.'')}}" method="POST" class="form-horizontal form-label-left" >
  <div>
    <div class="clearfix">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div id="items_container">
      <table id="selected-product-datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th class="text-center" style="color:#070">@lang('user.learn.label_name')
            </th>
            <th class="text-center" style="color:#070">@lang('user.learn.label_question')
            </th>
            <th class="text-center"  style="color:#070" >@lang('user.learn.label_answer')
            </th>
          </tr>
        </thead>
        <tbody>
          <?php $index=1; ?>
          @foreach($testLessons as $testLesson)
          <tr>
            <td>
              <h6 style="color:#070"> {{$index++}}</h6>
            </td>
            <td  style="color:#AF34C2">
              {{$testLesson->question}}
            </td>
            <td>
              <input type="text" name="answer[]" value="" id="{{$index}}" class="event_answer"/>
              <input type="hidden" name="answer_question[]" value="{{$testLesson->answer}}">
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="ln_solid">
      </div>
      <div class="form-group print-hidden">
        <div class="col-md-9 col-sm-12 col-xs-12 col-md-offset-2 col-xs-offset-2">
          <button type="submit" class="btn btn-success">
            @lang('user.question.submit')
          </button>
        </div>
      </div>
    </div>
  </div>
</form>
@stop
@push('end-page-scripts')
@endpush
