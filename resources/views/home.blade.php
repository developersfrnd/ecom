<!doctype html>
<html lang="en">
  <head>
    <title>{{ $SITE_TITLE }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css') }}/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css') }}/style.css">
    <link rel="stylesheet" href="{{ asset('assets/css') }}/font-awesome.min.css">
  </head>
  <body>
    <!-- Navbar -->
    @include('layouts.partials.header')
    <!-- Navbar End -->

    <!-- Parallax Banner -->
    <div class="parallax-banner" data-type="background" data-speed="5">
      <!-- <div class="search-box">
        <input type="text" placeholder="Search something from here..." class="form-control">
        <i class="fa fa-search"></i>
      </div> -->
    </div>
    <!-- Parallax Banner End -->

    <!-- About Section -->
    <!-- <section class="about-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <h3><i class="fa fa-power-off" aria-hidden="true"></i>{{__('home.how_it_works')}}</h3>
            <p>{{__('home.how_it_works_text')}}</p>
          </div>
          <div class="col-sm-3">
            <h3><i class="fa fa-cog" aria-hidden="true"></i>{{__('home.what_we_do')}}</h3>
            <p>{{__('home.what_we_do_text')}}</p>
          </div>
          <div class="col-sm-3">
            <h3><i class="fa fa-user" aria-hidden="true"></i>{{__('home.support')}}</h3>
            <p>{{__('home.support_text')}}</p>
          </div>
          <div class="col-sm-3">
            <h3><i class="fa fa-pie-chart" aria-hidden="true"></i>{{__('home.solutions')}}</h3>
            <p>{{__('home.solutions_text')}}</p>
          </div>
        </div>
      </div>
    </section> -->
    <!-- About Section End -->

    <!-- Main Content -->
    <section class="main-content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2>{{__('home.welcome_to_our_group')}}</h2>
            <p>{{__('home.welcome_to_our_group_text')}}</p>
            <p class="colour-line">{{__('home.blue_text')}}</p>
            <div class="row">
              <div class="col-sm-2">
                <img src="{{ asset('assets/images') }}/image1.jpg" alt="Welcome">
              </div>
              <div class="col-sm-10">
                <p>{{__('home.below_blue_text')}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Main Content Ends -->

    <!-- Footer -->
    <footer>
      @include('layouts.partials.footer')
    </footer>
    
    <script src="{{ asset('assets/js') }}/jquery-3.2.1.slim.min.js"></script>
    <script src="{{ asset('assets/js') }}/popper.min.js"></script>
    <script src="{{ asset('assets/js') }}/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js') }}/custom.js"></script>
  </body>
</html>