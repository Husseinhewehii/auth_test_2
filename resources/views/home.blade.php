@extends('layouts.app')

@section('content')
    <h1>
        <a href="{{LaravelLocalization::localizeURL(route('products.index'))}}">Products</a><span>(@productsCount)</span>
    </h1>
@endsection