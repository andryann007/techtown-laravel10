<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Tech Town | {{ $title; }}</title>

  <!-- Fontawesome Templates -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- Bootstrap 5 Templates -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- Custom CSS Templates -->
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
  @include('partial.navbar');

  <main class="main-content">
    <div class="container-fluid">
      @yield('content');
    </div>
  </main>

  @include('partial.footer');

  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
</body>
</html>