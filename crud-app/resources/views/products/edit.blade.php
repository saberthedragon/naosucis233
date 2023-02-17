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
<div class="alert alert-danger" role="alert">
  @forEach ( $errors->all() as $error)
  <span>{{$error}}</span><br />
  @endForEach
</div>
@endIf


<form method="POST" action="{{route('products.update', $product->id)}}">
  @csrf
  @method('PUT')

  <div class="form-group">
    @include('products.form')
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Update Product</button>
    <a class="btn btn-danger" href="{{route('products.index')}}">Cancel</a>
  </div>
</form>

@endSection