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
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('message'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
          <li>{{ session('message') }}</li>
        </ul>
    </div>
@endif
