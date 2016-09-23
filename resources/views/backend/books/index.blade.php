@extends('backend.layouts.master')
@section('section-title')
@lang('lang_admin.book.list_books')
@stop
@section('content')
@include('messages')
<h2 class="text-left">{{trans('lang_admin.book.list_books')}}
</h2>
<br>
<div class="box box-success">
  <div class="col-md-12">
    <div class="table-responsive">
      <table id="list_book"  class="table table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="text-center">@lang('lang_admin.book.no')
            </th>
            <th class="text-center">@lang('lang_admin.book.name')
            </th>
            <th class="text-center">@lang('lang_admin.book.author')
            </th>
            <th class="text-center">@lang('lang_admin.book.description')
            </th>
          </tr>
        </thead>
        <tbody>
          <?php $index=1; ?>
          @foreach($books as $item)
          <tr>
            <td>{!! $index++ !!}
            </td>
            <td>
              <a href="{{ route('admin.book.show',$item ->id) }}">{{$item->name}}
              </a>
            </td>
            <td>{{$item->author}}
            </td>
            <td>{{$item->description}}
            </td>
            <td>
              <a href="{{ route('admin.book.edit', [$item->id]) }}" class="btn btn-warning btn-xs">
                <i class="fa fa-pencil-square-o" aria-hidden="true">
                </i>
              </a>
              <a id='del' data-toggle="modal" data-target="#confirm-deleting" class="btn btn-danger btn-xs btn_delete" title="">
                <i class="fa fa-trash">
                </i>
              </a>
              <input id="book_id" type="hidden" value="{{$item->id }}">
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@push('stylesheet')
<link rel="stylesheet" href="/bower/datatables/media/css/dataTables.bootstrap.min.css" media="screen" title="no title" charset="utf-8">
@endpush
@push('end-page-scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('#list_book').DataTable();
  });
</script><!-- event delte book -->
<script src="/bower/datatables/media/js/dataTables.bootstrap.min.js">
</script>
<script src="/bower/datatables/media/js/jquery.dataTables.min.js">
</script>
@endpush
