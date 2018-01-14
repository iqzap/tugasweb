<html>
<head>
	<title>Login Admin</title>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bodyx">
<div class="loginBox">
	<img src="{{ asset('desain/log.png') }}" class="avatar">
	<h1 class="h1x">Login Admin</h1>
	<form class="form-horizontal" method="POST" action="{{ route('admin.valid') }}">
	{{ csrf_field() }} @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
        @endif
	<p>ID</p>
	<input type="text" name="id_admin" id="id_admin" placeholder="Enter ID" required autofocus>
	<p>Password</p>
	<input type="password" name="password" id="password" placeholder="Enter Password" required>
	<input type="submit" value="Login">
	
	</form>

</div>
</body>
</html>