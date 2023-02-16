<!-- 
* Similar to "Create()" page, w/ a few tweaks. ;)

* "Forms.blade" ==> Has the "Repeated Form" stuff. ;)

  -->

@extends('layout')

@section('content')
<div class="column col-3">
  <h3>Edit a Product</h3>

</div>
@if ( $errors->any() )
<div class="toast toast-error">
  @forEach ( $errors->all() as $error)
  <span>{{$error}}</span><br />
  @endForEach
</div>
@endIf


<form method="POST" action="{{route('products.update', $product->id)}}">
  @crsf
  @method('PUT')

  <div class="form-group">
    @include('products.form')
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Update Product</button>
    <a href="{{route('products.index')}}">Cancel</a>
  </div>
</form>

@endSection