@section('content')

<form class="form-signin" method="post" action="{{ $login_form_action }}">
	<h2 class="form-signin-heading">Please sign in</h2>
	@if ($invalid_login)
		{{ View::make('message/error', array('messages' => $invalid_login)) }}
	@endif
	<input type="text" name="username" class="input-block-level" placeholder="Username">
	<input type="password" name="password" class="input-block-level" placeholder="Password">
	<button class="btn btn-large btn-primary" type="submit">Sign in</button>
</form>
	      
@stop