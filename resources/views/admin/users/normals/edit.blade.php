@extends('admin.dashboard')
<?php use App\Constants\UserStatus; ?>
@section('content')
<div class="container">
<h1>Edit Admin</h1>
<form action="{{ \LaravelLocalization::localizeURL(route('admin.normals.update', ['user' => $user])) }}" method="post">
    @csrf
    @method("PUT")
    <input type="hidden" name="id" value="{{ $user->id}}" />
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-4">
        <input value="{{old('email', $user->email)}}" type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-4">
        <input value="{{old('name', $user->name)}}" type="text" name="name" class="form-control" id="inputEmail3" placeholder="Name">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-4">
        <input value="{{old('password', $user->password)}}" type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-4">
        <input value="{{old('phone', $user->phone)}}" type="text" name="phone" class="form-control" id="inputEmail3" placeholder="Phone">
        </div>
    </div>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control active" name="status">
            <option value="">{{ trans('select_status') }}</option>
            @foreach(UserStatus::getList() as $key => $value)
                <option
                    value="{{ $key }}" {{ old("status",$user->status) == "$key" ? "selected":null }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>
    </div>
	<div class="form-group row">
    		<div class="col-sm-10">
      			<button type="submit" class="btn btn-primary">Update</button>
    		</div>
  	</div>
    </form>
</div>
    
@endsection