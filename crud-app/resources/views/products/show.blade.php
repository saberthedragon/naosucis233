@extends('dashboard')

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
          <h5> <a href="{{ route('products.index') }}">All Products</h5>
        </td>
      </tr>
    </tbody>
  </table>
</div>


<h4 class="fw-bold">
  Reviews:
</h4>



<!-- <label class="form-label" for="rating">Sort by Rating</label>
    <select class="form-select" name="rating">

      @forEach (range(1,5) as $ratingOption)
      <option value="{{$ratingOption}}">{{$ratingOption}}</option>
      @endForEach
    </select> -->

<div class="column col-3">
  <h3>Add a Review</h3>


  <form method="POST" action="{{route('reviews.store')}}">
    @csrf

</div>
@if ( $errors->any() )
<div class="alert alert-danger" role="alert">
  @forEach ( $errors->all() as $error)
  <span>{{$error}}</span><br />
  @endForEach
</div>
@endIf


<div class="container mt-5 form-group">
  <table class="table table-bordered mb-5">
    <label class="form-label" for="comment">Your Comment</label>
    <input type="text" class="form-control" rows="3" name="comment" value="{{old('comment')}}">

    <label class="form-label" for="rating">Choose Rating</label>
    <select class="form-select" name="rating">

      @forEach (range(1,5) as $ratingOption)
      <option value="{{$ratingOption}} ">{{$ratingOption}}</option>
      @endForEach
    </select>

    <label class="form-label" for="product_id" hidden>Product ID</label>
    <input type="number" name="product_id" class="form-control" value="{{$product->id}}" hidden />
  </table>
</div>
<div class="form-group">
  <button type="submit" class="btn btn-primary">Add Review</button>
</div>
</form>

@if( count($product->reviews) == 0 )
<div>
  <h2>No reviews yet</h2>
</div>
@else

<div class="container mt-5">
  <!-- <a class="btn btn-primary" href="{{route('reviews.store', $product->id)}}">Add Review</a> -->

  <table class="table table-bordered mb-5">
    <thead>
      <tr class="table-success">
        <th scope="col">Comment</th>
        <th scope="col">Rating</th>
        <th scope="col">Date Added</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($product->reviews as $review)
      <tr>
        <td scope="row">{{ $review->comment }}</td>


        <td class="text-nowrap">@for($i = 0; $i < $review->rating; $i++ ) &#9733 @endFor </td>

        <td>{{ $review->created_at }}</td>
        @can('delete', $$review)
        <td>
          <form class="btn btn-danger" action="{{route('reviews.destroy', $review->id)}}" method="POST" onSubmit="return confirm('Are you sure you want to delete?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-error" type="submit">Delete</button>
          </form>
        </td>
        @endCan
      </tr>
      @endforeach
    </tbody>
  </table>

</div>

@endIf


@endSection