<!-- 
* Similar to "Create()" page, w/ a few tweaks. ;)

* "Forms.blade" ==> Has the "Repeated Form" stuff. ;)

  -->

@extends('dashboard')

@section('content')

@can('update', App\Models\User::class)
<div class="column col-3">
  <h3>Edit User</h3>


  <form method="POST" action="{{route('users.update', $user->id)}}">
    @csrf
    @method('PUT')

    <div class="form-group">
      @include('users.form')
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Update User</button>
      <a class="btn btn-danger" href="{{route('users.index')}}">Cancel</a>
    </div>
  </form>
  @endCan

  @endSection