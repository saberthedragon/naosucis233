<!-- 
* Bootstrap for "Form"

* Allow input of "Non-auto generated items" (ie: NO date / ID needed. ;) )

* Send to "New Info" to "store" ie: <form method="POST" action="{{route('products.store')}}">

* Link "Cancel" button to index.blade ;)

* Validate via "@crsf" (here); Actual validation done in Controller.store().

* 

  -->

@extends('layout')

@section('content')
<div class="column col-3">
  <h3>Add a Product</h3>

</div>
@if ( $errors->any() )
<div class="toast toast-error">
  @forEach ( $errors->all() as $error)
  <span>{{$error}}</span><br />
  @endForEach
</div>
@endIf


<form method="POST" action="{{route('products.store')}}">
  @crsf

  <div class="form-group">
    @include('products.form')
  </div>
</form>

@endSection