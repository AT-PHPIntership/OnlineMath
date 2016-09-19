@extends('backend.layouts.master')

@section('title', trans('lang_admin_manager_user.title_manage_user'))
@section('content')

	<h2 class="text-left">{{trans('lang_admin_manager_user.user_list')}}</h2><br>
    <div class="box box-success">

    <div class="col-md-12">
        <div class="table-responsive">
            <table id="list_users"  class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">@lang('lang_admin.user.no')</th>
                        <th class="text-center">@lang('lang_admin.user.name')</th>
                        <th class="text-center">@lang('lang_admin.user.username')</th>
                        <th class="text-center">@lang('lang_admin.user.birthday')</th>
                        <th class="text-center">@lang('lang_admin.user.gender')</th>
                        <th class="text-center">@lang('lang_admin.user.address')</th>
                        <th class="text-center">@lang('lang_admin.user.option')</th>
                    </tr>
                </thead>
	                <tbody>
	                    <?php $index=1; ?>
                        @foreach($users as $item)
                        <tr>
                            <td>{!! $index++ !!}</td>
                            <td><a href="{{ route('admin.user.show',$item ->id) }}">{{$item->name}}</a></td>
                              <td>{{$item->username}}</td>
                            <td>{{$item->birthday}}</td>
                              <td>{{$item->gender}}</td>
                                <td>{{$item->address}}</td>
                                                                <td>
                        <a href="" title="@lang('products.title_show_product')" class="btn btn-info btn-xs"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                        <a href="" title="@lang('products.title_edit_product')" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                         <a  data-toggle="modal" data-target="#confirm-deleting" class="btn btn-danger btn-xs btn_delete" title="@lang('products.btn_remove_product')"><i class="fa fa-trash"></i></a>
                         <input id="" type="hidden" value="">
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
<script src="/bower/datatables/media/js/dataTables.bootstrap.min.js"></script>
<script src="/bower/datatables/media/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#list_users').DataTable();
    });
</script>
@endpush
