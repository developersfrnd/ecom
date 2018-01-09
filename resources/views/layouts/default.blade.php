<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ $SITE_TITLE }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css') }}/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css') }}/style.css">
    <link rel="stylesheet" href="{{ asset('assets/css') }}/font-awesome.min.css">
  </head>
  <body>
    @include('layouts.partials.header')
    @yield('header')
      <!-- Main content -->
      <section class="main-content">

        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
          </div>
        @endif
      
        @yield('content')
      </section>

      <footer>
        @include('layouts.partials.footer')
      </footer>
    </div>
    <!-- jQuery 3 -->
    <script src="{{ asset('assets/js') }}/jquery-3.2.1.slim.min.js"></script>
    <script src="{{ asset('assets/js') }}/popper.min.js"></script>
    <script src="{{ asset('assets/js') }}/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js') }}/custom.js"></script>
  </body>
</html>
