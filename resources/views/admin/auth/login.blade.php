@extends('layouts.app')

@section('content')
<link href="{{ asset('css/admin_login.css') }}" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form method="POST" action="{{route('admin.login.attempt')}}" class="box">
                    @csrf
                    <h1>Admin</h1>
                    <p class="text-muted"> Please enter your email and password!</p>
                     <input type="text" name="email" placeholder="Email">
                      <input type="password" name="password" placeholder="Password"> 
                      <a class="forgot text-muted" href="#">Forgot password?</a> 
                      <input type="submit" name="" value="Login">
                    <!-- <div class="col-md-12">
                        <ul class="social-network social-circle">
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-google-plus"></i></a></li>
                        </ul>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection