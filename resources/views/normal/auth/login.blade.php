@extends('layouts.app')

@section('content')
<link href="{{ asset('css/normal_auth.css') }}" rel="stylesheet">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
	<title>Login Page</title>
</head>
<body>
	<!-- Main Content -->
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<h4 class="company_title">Welcome</h4>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						<h2>Log In</h2>
						@include('errors')
					</div>
					<div class="row">
						<form action="{{route('login.attempt')}}" method="POST" class="form-group">
                            @csrf
							<div class="row">
								<input type="text" name="email" id="email" class="form__input" placeholder="Email">
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="password" id="password" class="form__input" placeholder="Password">
							</div>
							<!-- @if ($errors->has('email'))
								<span>
									<h3>{{ $errors->first('email') }}</h3>
								</span>
							@endif
							@if ($errors->has('password'))
								<span>
									<h3>{{ $errors->first('password') }}</h3>
								</span>
							@endif -->
							<div class="row">
								<input type="submit" value="Submit" class="btn">
							</div>
						</form>
					</div>
					<div class="row">
						<p>Don't have an account? <a href="{{route('register')}}">Register Here</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
@endsection