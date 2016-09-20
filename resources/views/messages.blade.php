@if (Session::has('success'))

	<div class="alert alert-success" role="alert">
		<strong>{{trans('lang_admin.user.success')}}</strong> {{ Session::get('success') }}
	</div>

@endif

@if (Session::has('danger'))
	<div class="alert alert-danger" role="alert">
		<strong>{{trans('lang_admin.user.danger')}}</strong> {{ Session::get('danger') }}
	</div>
@endif
