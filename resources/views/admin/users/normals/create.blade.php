@extends('admin.dashboard')

@section('content')
<h1>Add New Normal User</h1>
<div class="container">
<form action="{{ \LaravelLocalization::localizeURL(route('admin.normals.store')) }}" method="post">
    @csrf
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-4">
        <input value="{{old('email')}}" type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-4">
        <input value="{{old('name')}}" type="text" name="name" class="form-control" id="inputEmail3" placeholder="Name">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-4">
        <input value="{{old('password')}}" type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-4">
        <input value="{{old('phone')}}" type="text" name="phone" class="form-control" id="inputEmail3" placeholder="Phone">
        </div>
    </div>
	<div class="form-group row">
    		<div class="col-sm-10">
      			<button type="submit" class="btn btn-primary">Create</button>
    		</div>
  	</div>
    </form>
</div>
    
@endsection