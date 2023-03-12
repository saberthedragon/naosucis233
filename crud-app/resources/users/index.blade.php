@extends('dashboard')

@section('content')

@if (Route::has('login'))
<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
  @auth
  <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
  @else
  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

  @if (Route::has('register'))
  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
  @endif
  @endauth
</div>
@endif

@can('viewAny', App\Models\Users::classs) <!-- Needed? -->

<div class="container mt-5">
  <a class="btn btn-primary" href="{{route('users.create')}}">Create User</a>
  {{-- Pagination --}}
  <div class="d-flex justify-content-center">
    {!! $users->links() !!}
  </div>

  <table class="table table-bordered mb-5">
    <thead>
      <tr class="table-success">
        <th scope="col">Name</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <th scope="row">{{ $user->user }}</th>
        <td>{{ $user->email }}</td>
        <td><a href="{{route('users.show', $user->id)}}">Show Detail</a></td>
        <td><a class="btn btn-secondary" href="{{route('users.edit', $user->id)}}">Edit</a></td>
        <td>
          <form class="btn btn-danger" action="{{route('users.destroy', $user->id)}}" method="POST" onSubmit="return confirm('Are you sure you want to delete?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-error" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>

@endSection