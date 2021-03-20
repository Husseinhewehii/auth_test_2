@extends('layouts.app')

@section('content')
<link href="{{ asset('css/admin_login.css') }}" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form method="POST" action="{{\LaravelLocalization::localizeURL(route('admin.login.attempt'))}}" class="box">
                    @csrf
                    <h1>Admin</h1>
                    @include('errors')
                    <p class="text-muted"> Please enter your email and password!</p>
                     <input type="text" name="email" value="{{old('email')}}" placeholder="Email">
                      <input type="password" name="password" placeholder="Password"> 
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
                      <input type="submit" name="" value="Login">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection