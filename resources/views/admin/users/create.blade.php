@extends('layouts.admin')
@section('content')
<section class="content">
	<div class="row">
	<!-- left column -->
	<div class="col-md-10">
	  <!-- general form elements -->
	  <div class="box box-primary">
	    <div class="box-header">
	      <h3 class="box-title">Add Projects</h3>
	    </div><!-- /.box-header -->
	    <!-- form start -->
	    <form method="post" action="<?php echo url($ADMIN_URL.'/users/'.$user->id);?>" enctype="multipart/form-data">
	    <?php if($user->id){ ?>
	    <input type="hidden" name="_method" value="PATCH">	
	    <?php } ?>
	    {{ csrf_field() }}
	      <div class="box-body">
	        <div class="form-group">
	          <label for="name">Name</label>
	          <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo old('name',$user->name); ?>">
	        </div>
	        <div class="box-body">
		        <div class="form-group">
		          <label for="name">Email</label>
		          <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo old('email',$user->email); ?>">
		        </div>
		    </div>
		    <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" value="<?php echo old('phone',$user->phone); ?>">
              </div>  
	      	</div><!-- /.box-body -->
	      <div class="box-footer">
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	    </form>
	  </div><!-- /.box -->
</section>
@endsection