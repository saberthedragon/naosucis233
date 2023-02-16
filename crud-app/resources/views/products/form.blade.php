<label class="form-label" for="name">Product Name</label>
<input type="text" class="form-control" id="name" value="{{old('name', $product->name)}}">

<label class=" form-label" for="price">Price</label>
<input step="0.01" type="number" id="price" class="form-control" value=value="{{old('price', $product->price)}}" />

<label for="description">Item Description</label>
<textarea class="form-control" id="description" rows="3" value="{{old('discription', $product->discription)}}"></textarea>

<label class="form-label" for="typeNumber">Item Number</label>
<input type="number" id="typeNumber" class="form-control" value="{{old('item_number', $product->item_number)}}" />