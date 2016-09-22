@extends('backend.layouts.master')
@section('section-title')
@lang('backend.common.listuser')
@stop
@section('content')
@include('messages')
<h2 class="text-left">{{trans('lang_admin_manager_user.user_list')}}
</h2>
<br>
<div class="box box-success">
  <div class="col-md-12">
    <div class="table-responsive">
      <table id="list_users"  class="table table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="text-center">@lang('lang_admin.user.no')
            </th>
            <th class="text-center">@lang('lang_admin.user.name')
            </th>
            <th class="text-center">@lang('lang_admin.user.username')
            </th>
            <th class="text-center">@lang('lang_admin.user.birthday')
            </th>
            <th class="text-center">@lang('lang_admin.user.gender')
            </th>
            <th class="text-center">@lang('lang_admin.user.address')
            </th>
            <th class="text-center">@lang('lang_admin.user.option')
            </th>
          </tr>
        </thead>
        <tbody>
          <?php $index=1; ?>
          @foreach($users as $item)
          <tr>
            <td>{!! $index++ !!}
            </td>
            <td>
              <a href="{{ route('admin.user.show',$item ->id) }}">{{$item->name}}
              </a>
            </td>
            <td>{{$item->username}}
            </td>
            <td>{{$item->birthday}}
            </td>
            <td>{{$item->gender}}
            </td>
            <td>{{$item->address}}
            </td>
            <td>
              <a href="{{ route('admin.user.edit', [$item->id]) }}" class="btn btn-warning btn-xs">
                <i class="fa fa-pencil-square-o" aria-hidden="true">
                </i>
              </a>
              <a id='del' data-toggle="modal" data-target="#confirm-deleting" class="btn btn-danger btn-xs btn_delete" title="@lang('products.btn_remove_product')">
                <i class="fa fa-trash">
                </i>
              </a>
              <input id="user_id" type="hidden" value="{{$item->id }}">
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @if (count($users) > 0 )
  <!-- Modal Confirmation -->
  <div class="modal fade" id="confirm-deleting" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;
          </button>
          <h4 class="modal-title">@lang('lang_admin.confirm_title')
          </h4>
        </div>
        <div class="modal-body">
          <h5>@lang('lang_admin.confirm_msg')
          </h5>
        </div>
        <div class="modal-footer">
          <form action="{{ url('$item->id') }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">@lang('lang_admin.btn_delete')
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('lang_admin.btn_cancel')
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
@endsection
@push('stylesheet')
<link rel="stylesheet" href="/bower/datatables/media/css/dataTables.bootstrap.min.css" media="screen" title="no title" charset="utf-8">
@endpush
@push('end-page-scripts')
<script src="/bower/datatables/media/js/dataTables.bootstrap.min.js">
</script>
<script src="/bower/datatables/media/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#list_users').DataTable();
  }
                   );
</script>
<!-- event delte user -->
<script>
  $(document).ready(function() {
    $(document).on('click',".btn_delete", function() {
      var id = $(this).next().val();
      $('form').attr('action','user/'+id);
      $('#idDel').text(id);
    }
                  );
  }
                   );
</script>
@endpush
