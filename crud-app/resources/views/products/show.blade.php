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

<div>
  <h4 class="fw-bold">
    Reviews:
  </h4>
  <div>
    @if( empty($product->rating) )
    <p>
      No reviews yet
    </p>
    @else
    <label class="form-label" for="review->rating">Sort by Rating</label>
    <select class="form-select" name="review">

      @forEach (range(1,5) as $ratingOption)
      <option value="{{$ratingOption}}" {{$ratingOption == old('rating') ? 'selected': ''}}>{{$ratingOption}}</option>
    </select>
    @endForEach
    @endIf


  </div>
</div>


<!-- 
  * Display a small form to add a review (comment and rating)

     * Has the "n+1" fix here (??)

  * Rating will be acquired by a select list displaying numbers 1-5

  * Below the form will be a list/table of reviews

    * For each row display comment and number of stars the review is.

       * You can use an html entity for star (https://www.toptal.com/designers/htmlarrows/symbols/black-star/https://www.toptal.com/designers/htmlarrows/symbols/black-star/Links to an external site.) or use an image of your choice.

* If no reviews have been given yet, display a message saying "No reviews yet"

* You should be able to delete a review (with JavaScript confirmation)


-->

@endSection