
<!------ Include the above in your HEAD tag ---------->
<?php use Mcamara\LaravelLocalization\Facades\LaravelLocalization; ?>
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
            @foreach($products as $product)
            <?php $currentLocale = LaravelLocalization::setLocale(); ?>
                <div class="media">
                    <img class="d-flex align-self-start" src="{{$product->image}}" alt="Generic placeholder image">
                    <div class="media-body pl-3">
                        <div class="price">{{$product->price}}<small>{{json_decode($product->name)->$currentLocale}}</small></div>
                        <div class="stats">
                            <span>{{json_decode($product->description)->$currentLocale}}</span>
                        </div>
                    </div>
                    <div class="pull-right action-buttons">
                        <form method="POST" action="{{ \LaravelLocalization::localizeURL(route('admin.products.destroy', ['product' =>$product])) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <div class="trash">
                                <span class="delete-product glyphicon glyphicon-trash" value="Delete product"></span>
                                <!-- <input type="submit" class="btn btn-danger delete-product" value="Delete user"> -->
                            </div>
                        </form>
                        <!-- <a  class="trash"><span class="glyphicon glyphicon-trash" ></span></a> -->
                    </div>
                </div>
            @endforeach
		</div>
	</div>
</div>
</section>

@endsection

@section('scripts')
<script>
    $('.delete-product').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure you want to delete this product?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
</script>

@endsection