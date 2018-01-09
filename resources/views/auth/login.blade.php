@extends('layouts.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-4 offset-sm-4">
      <div class="catalog">
        <h3><span>Login</span></h3>
        <div class="tools-body">
          <form method="POST" action="{{ url('/login') }}">
          {{ csrf_field() }}
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required 
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <!-- <div class="row mb-3">
              <div class="col-sm-6">
                <div class="custom-checbox">
                  <label>
                    Remember me
                    <input type="checkbox">
                    <span></span>
                  </label>
                </div>
              </div>
              <div class="col-sm-6 text-right">
                <a href="javascript:void(0)" class="link">Forgot Password?</a>
              </div>
            </div> -->
            <button type="submit" class="btn-blue">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
