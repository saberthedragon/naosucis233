Comment form here
Mimics "create.blade"
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
  <td>
    <form class="btn btn-danger" action="{{route('products.destroy', $product->id)}}" method="POST" onSubmit="return confirm('Are you sure you want to delete?');">
      @csrf
      @method('DELETE')
      <button class="btn btn-error" type="submit">Delete</button>
    </form>
  </td>