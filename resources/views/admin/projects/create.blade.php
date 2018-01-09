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
	    <form method="post" action="<?php echo url($ADMIN_URL.'/projects/'.$project->id);?>" enctype="multipart/form-data">
	    <?php if($project->id){ ?>
	    <input type="hidden" name="_method" value="PATCH">	
	    <?php } ?>
	    {{ csrf_field() }}
	      <div class="box-body">
	        <div class="form-group">
	          <label for="name">Name</label>
	          <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo old('name',$project->name); ?>">
	        </div>
	        <div class="box-body">
		        <div class="form-group">
		          <label for="name">Image</label>
		          <input type="file" class="form-control" id="image" name="image">
		        </div>
		      </div>
		    <div class="form-group">
                <label>Products</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select Products"
                        style="width: 100%;" name="products[]">
                  <?php foreach($products as $product){ ?>
                  	<option value="<?php echo $product->id;?>" {{ in_array($product->id, old('products',$project_products)) ? "selected":"" }}>
                  		<?php echo $product->name;?>&nbsp;&nbsp;(<?php echo $product->sku;?>)
                 	</option>
                  <?php } ?>
                </select>
              </div>  
	        <div class="form-group">
	          <label>Description</label>
	          <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"><?php echo old('description',$project->description); ?></textarea>
	        </div>
	      </div><!-- /.box-body -->
	      <div class="box-footer">
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	    </form>
	  </div><!-- /.box -->
</section>
@endsection