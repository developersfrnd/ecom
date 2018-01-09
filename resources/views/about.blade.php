@extends('layouts.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2>{{ __('about.about_us') }}</h2>
      <p>{{ __('about.first_line') }}</p>
      <p class="colour-line">{{ __('about.second_line') }}</p>
      <div class="row">
        <div class="col-sm-2">
          <img src="{{ asset('assets/images') }}/image1.jpg" alt="Welcome">
        </div>
        <div class="col-sm-10">
          <p>{{ __('about.third_line') }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection    