@extends('layouts.admin')
@section('content')
<link href="{{ asset('assets/vendor/plugins') }}/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<section class="content">
	<div class="row">
	<!-- left column -->
	<div class="col-md-10">
	  <!-- general form elements -->
	  <div class="box box-primary">
	    <div class="box-header">
	      <h3 class="box-title">Add Products</h3>
	    </div><!-- /.box-header -->
	    <!-- form start -->
	    <form method="post" action="<?php echo url($ADMIN_URL.'/products',$product->id);?>" enctype="multipart/form-data">
	    <?php if($product->id){ ?>
	    <input type="hidden" name="_method" value="PATCH">	
	    <?php } ?>
	    {{ csrf_field() }}
	      <div class="box-body">
	        <div class="form-group">
	          <label for="name">Name</label>
	          <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo old('name',$product->name); ?>">
	        </div>
	        <div class="form-group">
	          <label for="name">Model number</label>
	          <input type="text" class="form-control" id="model" placeholder="Enter model number" name="model_no" value="<?php echo old('model_no',$product->model_no); ?>">
	        </div>
	        <div class="form-group">
	          <label for="sku">SKU</label>
	          <input type="text" class="form-control" id="sku" placeholder="Enter SKU" name="sku" value="<?php echo old('sku',$product->sku); ?>">
	        </div>
	        <div class="form-group">
	          <label>MetaTag Keyword</label>
	          <textarea class="form-control" rows="3" placeholder="Enter ..." name="meta_keyword"><?php echo old('meta_keyword',$product->meta_keyword); ?></textarea>
	        </div>
	        <div class="form-group">
	          <label>MetaTag Description</label>
	          <textarea class="form-control" rows="3" placeholder="Enter ..." name="meta_description"><?php echo old('meta_description',$product->meta_description); ?></textarea>
	        </div>
	        <div class="form-group">
	          <label>short Description</label>
	          <textarea class="form-control" rows="3" placeholder="Enter ..." name="short_description"><?php echo old('short_description',$product->short_description); ?></textarea>
	        </div>
	        <div class="form-group">
	          <label>Description</label>
	          <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"><?php echo old('description',$product->description); ?></textarea>
	        </div>
	      </div><!-- /.box-body -->
	      <div class="box-footer">
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	    </form>
	  </div><!-- /.box -->
</section>
@endsection