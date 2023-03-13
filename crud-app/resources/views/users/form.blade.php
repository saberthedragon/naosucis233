<div class="form-group">
</div>
@if ( $errors->any() )
<div class="alert alert-danger" role="alert">
  @forEach ( $errors->all() as $error)
  <span>{{$error}}</span><br />
  @endForEach
</div>
@endIf

<div class="container mt-5">
  <table class="table table-bordered mb-5">
    <label class="form-label" for="name">Name</label>
    <input type="text" class="form-control" name="name" value="{{old('name', $user->name)}}">


    <label for="description">email</label>
    <input class="form-control" name="email" rows="3" value="{{old('email', $user->email)}}"></input>
  </table>
</div>
</div>