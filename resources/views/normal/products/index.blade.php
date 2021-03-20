
<!------ Include the above in your HEAD tag ---------->
<?php use Mcamara\LaravelLocalization\Facades\LaravelLocalization; ?>
@extends('layouts.app')

@section('content')
<link href="{{ asset('css/products.css') }}" rel="stylesheet">
<div class="clearfix"></div>
<section class="search-box">
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-5 listing-block">
        <span>@productsCount({{$products}})</span>
            @foreach($products as $product)
            <?php $currentLocale = LaravelLocalization::setLocale(); ?>
                <div class="media">
                    <img class="d-flex align-self-start" src="https://images.pexels.com/photos/358636/pexels-photo-358636.jpeg?h=350&auto=compress&cs=tinysrgb" alt="Generic placeholder image">
                    <div class="media-body pl-3">
                        <div class="price">{{$product->price}}<small>{{json_decode($product->name)->$currentLocale}}</small></div>
                        <div class="stats">
                            <span>{{json_decode($product->description)->$currentLocale}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
		</div>
	</div>
</div>
</section>

@endsection