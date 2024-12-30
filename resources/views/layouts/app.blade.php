<!doctype html>

<html>

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    @include('partials.navbar')
    @yield('content')


    <script src="{{ asset('script/navbar.js') }}"></script>

</body>

</html>
