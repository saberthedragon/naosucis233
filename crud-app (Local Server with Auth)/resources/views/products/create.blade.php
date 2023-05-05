@extends('dashboard')

@section('content')

@can('create', App\Models\Product::class)
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
  @endCan

  @endSection