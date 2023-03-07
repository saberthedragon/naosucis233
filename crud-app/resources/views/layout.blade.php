<!--
 * Make title more dynamic. ;)

 * Has the "Shared" Bootstrap stuff (like "Main Header", "Footers", etc etc)

 * Update "Dashboard" info on "Authentication Part 2" lecture @ 21:00

    ** Use this code (where?):

      Navigation Links
 <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
  <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Dashboard') }}
  </x-nav-link>
</div>

-->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <title>Products</title>
</head>

<body>

  <h1>Available Products</h1>

  @if( session()->get('success') )
  <div class="alert alert-success" role="alert">
    {{session()->get('success')}}
  </div>
  @endIf

  @yield('content')
</body>

</html>