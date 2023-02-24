@section('form')
<div class="column col-3">
  <h3>Add a Review</h3>


  <form method="POST" action="{{route('reviews.store', $review->product_id)}}">
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
    <input type="text" class="form-control" rows="3" name="comment" value="{{old('comment', $review->comment)}}">

    <label class="form-label" for="rating">Choose Rating</label>
    <select class="form-select" name="rating">

      @forEach (range(1,5) as $ratingOption)
      <option value="{{$ratingOption}} {{$ratingOption == $review->rating ? 'selected' : ''}}">{{$ratingOption}}</option>
      @endForEach
    </select>

    <label class="form-label" for="product_id">Product ID</label>
    <input type="number" name="product_id" class="form-control" value="{{old('product_id', $review->product_id)}}" />
  </table>
</div>
<div class="form-group">
  <button type="submit" class="btn btn-primary">Add Review</button>
  <a href="{{route('products.show')}}" class="btn btn-danger">Cancel</a>
</div>
</form>

@endSection