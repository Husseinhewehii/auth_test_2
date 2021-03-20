
<!------ Include the above in your HEAD tag ---------->

@extends('admin.dashboard')

@section('content')
<link href="{{ asset('css/products.css') }}" rel="stylesheet">
<div class="clearfix"></div>
<section class="search-box">
    <div class="container-fluid">
    <button style="margin:5px" class="btn btn-warning">
        <a href="{{\LaravelLocalization::localizeURL(route('admin.products.create'))}}">Add New Product</a>
    </button>
	<div class="row">
		<div class="col-md-5 listing-block">
        <div class="media">
              <img class="d-flex align-self-start" src="https://images.pexels.com/photos/358636/pexels-photo-358636.jpeg?h=350&auto=compress&cs=tinysrgb" alt="Generic placeholder image">
              <div class="media-body pl-3">
                <div class="price">$506,400<small>New York</small></div>
                <div class="stats">
                    <span>1678 Sq ft</span>
                    <span>>2 Beadrooms</span>
                </div>
              </div>
            </div>
		</div>
	</div>
</div>
</section>

@endsection