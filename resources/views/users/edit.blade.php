@extends('layouts.default')
@section('content')
<div class="container">
    <div class="col-sm-4 offset-sm-4">
      <div class="catalog">
        <h3><span>Update Profile</span></h3>
        <div class="tools-body">
          <form method="POST" action="{{ url('/users/'.Auth::user()->id) }}">
          <input type="hidden" name="_method" value="PATCH">  
          {{ csrf_field() }}
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name',$user->name) }}" required> 
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email',$user->email) }}" readonly="readonly"> 
            </div>
            <div class="form-group">
              <label>Phone</label>
              <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone',$user->phone) }}"> 
            </div>
            <div class="form-group">
              <label>Fax</label>
              <input type="text" class="form-control" placeholder="Fax" name="fax" value="{{ old('fax',$user->fax) }}">
            </div>
            <hr>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password_confirmation">
            </div>
            
            <button type="submit" class="btn-blue">Update</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection