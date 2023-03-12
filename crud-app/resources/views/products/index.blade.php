@extends('dashboard')

@section('content')

@if (Route::has('login'))
<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
  @auth
  @else
  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

  @if (Route::has('register'))
  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
  @endif
  @endauth
</div>
@endif

<div class="container mt-5">
  @can('create', App\Models\Product::class)
  <a class="btn btn-primary" href="{{route('products.create')}}">Create Product</a>
  @endCan

  {{-- Pagination --}}
  <div class="d-flex justify-content-center">
    {!! $products->links() !!}
  </div>

  <table class="table table-bordered mb-5">
    <thead>
      <tr class="table-success">
        <th scope="col">#</th>
        <th scope="col">Product name</th>
        <th scope="col">Price</th>
        <th scope="col">Description</th>
        <th scope="col">Item Number</th>
        <th scope="col">Image</th>
        @can('update', App\Models\Product::class)
        <th></th>
        <th></th>
        <th></th>
        @endCan
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <th scope="row">{{ $product->id }}</th>
        <td>{{ $product->name }}</td>
        <td>${{ number_format($product->price), 2 }}</td>
        <td>{{ $product->discription }}</td>
        <td>{{ $product->item_number }}</td>
        <td><img src="{{$product->image}}" alt="{{$product->image}}" class="img-thumbnail"></td>
        <td><a href="{{route('products.show', $product->id)}}">Show Detail</a></td>
        @can('edit', $product)
        <td><a class="btn btn-secondary" href="{{route('products.edit', $product->id)}}">Edit</a></td>
        @endCan

        @can('delete', $product)
        <td>
          <form class="btn btn-danger" action="{{route('products.destroy', $product->id)}}" method="POST" onSubmit="return confirm('Are you sure you want to delete?');">
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

@endSection