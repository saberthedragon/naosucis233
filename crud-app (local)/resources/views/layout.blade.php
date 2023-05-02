<!--
 * Make title more dynamic. ;)

 * Has the "Shared" Bootstrap stuff (like "Main Header", "Footers", etc etc)

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