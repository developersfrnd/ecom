<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
                <label style="display:block;">Products</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select Products"
                        style="width: 35%;display:inline;" name="allproducts[]" id="sbOne">
                  <?php foreach($products as $product){ 
                  			if($product->supplier()->count()){
                  				if(!in_array($product->id, old('products',$project_products))){ ?>
                  	?>
                  	<option value="<?php echo $product->id;?>">
                  		<?php echo $product->name;?>&nbsp;&nbsp;(<?php echo $product->sku;?>)
                 	</option>
                 	<?php } ?>
                  <?php } } ?>
                </select>
                <input type="button" id="left" value="<" />
			    <input type="button" id="right" value=">" />
				<select class="form-control select2" multiple="multiple" data-placeholder="Select Products"
                        style="width: 35%;;display:inline;" name="products[]" id="sbTwo">
                    <?php foreach($products as $product){ 
                    	if(in_array($product->id, old('products',$project_products))){ ?>
	                  	<option value="<?php echo $product->id;?>">
	                  		<?php echo $product->name;?>&nbsp;&nbsp;(<?php echo $product->sku;?>)
	                	</option>
	                	<?php } ?>
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
<script>
$(document).ready(function () { 

	function moveItems(origin, dest) {
		$(origin).find(':selected').appendTo(dest);
	}
 
	function moveAllItems(origin, dest) {
	    $(origin).children().appendTo(dest);
	}
	$('#left').click(function () {
	    moveItems('#sbTwo', '#sbOne');
	});
	 
	$('#right').on('click', function () {
	    moveItems('#sbOne', '#sbTwo');
	});
	 
	$('#leftall').on('click', function () {
	    moveAllItems('#sbTwo', '#sbOne');
	});
	 
	$('#rightall').on('click', function () {
	    moveAllItems('#sbOne', '#sbTwo');
	});
});
</script>