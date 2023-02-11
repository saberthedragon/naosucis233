<!--
  * Reformat page for "All Products" (found at: /products)

  * Use 'thumbnail' for the image

  * Show name, price (formatted as dollar amount), and item_number only

  * Assure the index page paginates the products - 10 per page

  * From the index page, each product's name should be linkable to the show page (<h5> format needs updating ;) )

  * Bootstrap moved to "view/layout.blade.php"
-->

@extends('layout')

@section('layout')

@forEach (stuff here)

individual bootstrap here

@endForEach

@endSection

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" contentName="IE=edge">
  <meta name="viewport" contentName="width=device-width, initial-scale=1.0">
  <title>All Products</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> <!-- JavaScript -->
</head>

<body>


  @if(!$episodes->isEmpty())


  <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($episodes as $show_obj)

    <div class="col">
      <div class="card h-100">
        <img src="{{$show_obj->image}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"> <a href="{{ route('products.show', $show_obj->id) }}">{{$show_obj->name}}</h5>
          <p class="card-text">{{ strip_tags( $show_obj->summary ) }}</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">{{$show_obj->episode }}</small>
        </div>
      </div>
    </div>
    @endForEach
  </div>

  @else
  No Episodes to show.

  @endif


</body>

</html>