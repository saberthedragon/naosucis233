<div class="container mt-5">
  <table class="table table-bordered mb-5">
    <label class="form-label" for="name">Product Name</label>
    <input type="text" class="form-control" name="name" value="{{old('name', $product->name)}}">

    <label class=" form-label" for="price">Price</label>
    <input step="0.01" type="number" name="price" class="form-control" value="{{old('price', $product->price)}}" />

    <label for="description">Item Description</label>
    <input class="form-control" name="description" rows="3" value="{{old('description', $product->description)}}"></input>

    <label class="form-label" for="item_number">Item Number</label>
    <input type="number" name="item_number" class="form-control" value="{{old('item_number', $product->item_number)}}" />
  </table>
</div>