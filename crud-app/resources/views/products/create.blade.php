<!-- 
* Bootstrap for "Form"

* Allow input of "Non-auto generated items" (ie: NO date / ID needed. ;) )

* Send to "New Info" to "store" ie: <form method="POST" action="{{route('products.store')}}">

* Link "Cancel" button to index.blade ;)

* Validate via "@crsf" (here); Actual validation done in Controller.store().

* 

  -->

@extends('dashboard')

@section('content')
<div class="column col-3">
  <h3>Add a Product</h3>


  <form method="POST" action="{{route('products.store')}}">
    @csrf

    <div class="form-group">
      @include('products.form')
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Add Product</button>
      <a href="{{route('products.index')}}" class="btn btn-danger">Cancel</a>
    </div>
  </form>

  @endSection