@extends('layouts.app')

@section('content')
    <h1>
        <a href="{{LaravelLocalization::localizeURL(route('products.index'))}}">Products</a>
    </h1>
@endsection