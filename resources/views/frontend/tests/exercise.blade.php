@extends('frontend.layouts.master')
@section('section-title')
@lang('user.question.exercise')
@stop
@section('content')
@include('messages')
<form action="{{ url('user/exercise/test/'.$id.'')}}" method="POST" class="form-horizontal form-label-left" novalidate id="print-bill">
  <div class="col-md-7 col-sm-7 col-xs-12">
    <div class="clearfix">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div id="items_container" class="row">
      <table id="selected-product-datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th class="text-center">@lang('user.question.label_name')
            </th>
            <th class="text-center">@lang('user.question.label_question')
            </th>
            <th class="text-center">@lang('user.question.label_answer')
            </th>
          </tr>
        </thead>
        <tbody>
          <?php $index=1; ?>
          @foreach($questions as $question)
          <tr>
            <td>
              <input type="text" class="form-control col-md-7 col-xs-12" name="id" value="{{$index++}}" class="form-control col-md-7 col-xs-12"  />
            </td>
            <td>
              {{$question->question}}
            </td>
            <td>
              <input type="text" name="answer[]" value="" id="{{$index}}" class="event_answer"/>
              <script type="text/javascript">
               var answer =  {{$question->answer}}
                var index = {{  $index}}
              </script>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="form-group col-lg-12">
        <label>@lang('user.test.score')
        </label>
      <input type="text" name="test_scores" id="score">
      </div>

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
<script src="/js/test/main.js" type="text/javascript">
</script>
@endpush
