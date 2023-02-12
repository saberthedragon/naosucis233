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

Bootstrap == Form Here
<form method="POST" action="{{route('products.store')}}">
  @crsf

</form>

@endSection