@extends('dashboard')

@section('content')

@can('create', App\Models\User::class)
<div class="column col-3">
  <h3>Add New User</h3>


  <form method="POST" action="{{route('users.store')}}">
    @csrf

    <div class="form-group">
      @include('users.form')
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Add User</button>
      <a href="{{route('users.index')}}" class="btn btn-danger">Cancel</a>
    </div>
  </form>
  @endCan

  @endSection