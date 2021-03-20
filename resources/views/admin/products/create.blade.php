@extends('admin.dashboard')

@section('content')
<h1>Add New Product</h1>
<div class="container">
<form action="{{ \LaravelLocalization::localizeURL(route('admin.products.store')) }}" method="post">
<!-- <form id='productForm' action="#" > -->
    @include('errors')
    @csrf
    <div class="container">
        <input type="hidden" id="name" name="name" value="">
        <input type="hidden" id="description" name="description" value="">

        @foreach($languages as $language)
            <div class="container" >
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">{{$language->title}} Name</label>
                    <div class="col-sm-4">
                    <input value="{{old('name_'.$language->slogan)}}" type="text" name="name_slogan" id="{{$language->slogan}}" class="form-control" id="inputEmail3" placeholder="Name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">{{$language->title}} Description</label>
                    <div class="col-sm-4">
                    <textarea placeholder="Description" class="form-control" rows="6" name="description_slogan" id="{{$language->slogan}}">{{old('description_'.$language->slogan)}}</textarea>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-4">
        <input value="{{old('price')}}" type="price" name="price" class="form-control" id="price" placeholder="Price">
        </div>
    </div>

    <div class="form-group row">
        <label>Image</label>
        <div class="image-box">
            <div class="js--image-preview"></div>
            <div class="upload-options">
                <label>
                    <input type="file" class="image-upload" accept="image/*" name="image" />
                </label>
            </div>
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


@section('scripts')
<script>
    $(document).ready(function(){
        $("form").submit(function(e){
            var namesObj = {};
            var descriptionsObj = {};

            var names = $('input[name="name_slogan"]');
            var descriptions = $('textarea[name="description_slogan"]');

            names.each(function() {
                var slogan = $(this).attr("id");
                var name = $(this).val();
                namesObj[slogan] = name;
            });
            
            descriptions.each(function() {
                var slogan = $(this).attr("id");
                var description = $(this).val();
                descriptionsObj[slogan] = description;
            });
            
            $("#name").val(JSON.stringify(namesObj));
            $("#description").val(JSON.stringify(descriptionsObj));
        });
    });
</script>

@endsection
