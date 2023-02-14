<!--
 * Make title more dynamic. ;)

 * 

-->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
</head>

<body>
  <shared bootstrap here></shared>
  @if( session())->get('success') )
  <div class="toast toast-success">
    {{session()->get('success')}}
  </div>
  @endIf
  @yield('content')
</body>

</html>