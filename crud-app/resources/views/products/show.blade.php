<!--
   * Reformat for "Single Product" (found at: /product/<id>, ie. /products/35)

   * Show full/mid size image for product

   * Show all data for a product (ie: forEach Products as Product)

   * Link back to "All Products" page (shown below)
<h5> <a href="{{ route('products.index', $show_obj->id) }}">{{$show_obj->name}}</h5>

 * Bootstrap moved to "view/layout.blade.php"

 // "Show" lecture @ 29:00 for 'finished' code
      
-->

@extends('layout')

@section('content')
<h1>Product Detail</h1>

<div class="container mt-5">
  <table class="table table-bordered mb-5">
    <thead>
      <tr class="table-success">
        <th scope="col">#</th>
        <th scope="col">Product name</th>
        <th scope="col">Price</th>
        <th scope="col">Description</th>
        <th scope="col">Item Number</th>
        <th scope="col">Image</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <th scope="row">{{ $product->id }}</th>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->discription }}</td>
        <td>{{ $product->item_number }}</td>
        <td><img src="{{$product->image}}" alt="{{$product->image}}" class="img-thumbnail"></td>
        <td>
          <h5> <a href="{{ route('products.index', $product->id) }}">All Products</h5>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{-- Pagination --}}
  <div class="d-flex justify-content-center">
    {!! $products->links() !!}
  </div>
</div>

@endSection