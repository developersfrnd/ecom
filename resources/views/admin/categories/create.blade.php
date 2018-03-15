@extends('layouts.admin')
@section('content')
<section class="content">
	<div class="row">
	<!-- left column -->
	<div class="col-md-10">
	  <!-- general form elements -->
	  <div class="box box-primary">
	    <div class="box-header">
	      <h3 class="box-title">Add Category</h3>
	    </div><!-- /.box-header -->
	    <!-- form start -->
	    <form method="post" action="<?php echo url($ADMIN_URL.'/categories',$category->id);?>">
	    <?php if($category->id){ ?>
	    <input type="hidden" name="_method" value="PATCH">	
	    <?php } ?>
	    {{ csrf_field() }}
	      <div class="box-body">
	        <div class="form-group">
	          <label for="name">Parent Category</label>
	          <select class="form-control" name="parent_id">
                <option value="0">Main Category</option>
                @foreach($categories as $key=>$val)
                	<option value="{{ $key }}" <?php if(old('parent_id',$category->parent_id)){ ?> selected="selected" <?php } ?>>{{ $val }}</option>
                @endforeach
              </select>
	        </div>
	        <div class="form-group">
	          <label for="name">Name</label>
	          <input type="text" class="form-control" id="title" placeholder="Enter name" name="title" value="<?php echo old('name',$category->title); ?>">
	        </div>
	      </div><!-- /.box-body -->
	      <div class="box-footer">
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	    </form>
	  </div><!-- /.box -->
</section>
@endsection