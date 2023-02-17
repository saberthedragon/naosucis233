<!--
   * Reformat for "Single Product" (found at: /product/<id>, ie. /products/35)

   * Show full/mid size image for product

   * Show all data for a product (ie: forEach Products as Product)

   * Link back to "All Products" page (shown below)
<h5> <a href="{{ route('products.index', $product->id) }}">{{$product->name}}</h5>

 * Bootstrap moved to "view/layout.blade.php"
      
 * format "price" in code
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

      <tr>
        <th scope="row">{{ $product->id }}</th>
        <td>{{ $product->name }}</td>
        <td>${{ number_format($product->price, 2) }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->item_number }}</td>
        <td><img src="{{$product->image}}" alt="{{$product->image}}" class="img-thumbnail"></td>
        <td>
          <h5> <a href="{{ route('products.index', $product->id) }}">All Products</h5>
        </td>
      </tr>
    </tbody>
  </table>
</div>

@endSection