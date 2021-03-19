@extends('admin.dashboard')

@section('content')
<div class="container">
<form>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-4">
        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-4">
        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Name">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-4">
        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-4">
        <input type="email" name="Phone" class="form-control" id="inputEmail3" placeholder="Phone">
        </div>
    </div>
    </form>
</div>
    
@endsection