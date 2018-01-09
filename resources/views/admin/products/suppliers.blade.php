@extends('layouts.admin')
@section('content')
<section class="content">
	<div class="row">
		<div class="col-md-10">
		  <!-- general form elements -->
		  <div class="box box-primary">
		    <div class="box-header">
		      <h3 class="box-title">Add Supplier</h3>
		    </div><!-- /.box-header -->
		    <!-- form start -->
		    @if (session('status'))
			    <div class="alert alert-success">
			        {{ session('status') }}
			    </div>
			@endif
		    <form method="post" action="<?php echo url($ADMIN_URL.'/products/product-suppliers',$product->id);?>">
		    {{ csrf_field() }}
		    	<div class="box-body">
			    	<?php $i=0;
			    	foreach($suppliers as $supplier){ ?>
			    		<div class="col-lg-3" style="margin-bottom:2px;">
					    	<label><?php echo $supplier->name; ?></label>
							<div class="input-group">
								<span class="input-group-addon">
								  <input type="checkbox" name="supplier_id[]" value="<?php echo $supplier->id; ?>" <?php echo (in_array($supplier->id,$product_supplier)) ? 'checked' : ''  ?>>
								</span>

								<span class="input-group-addon">
								  <input type="radio" name="is_default" title="Default Supplier" value="<?php echo $supplier->id; ?>" <?php echo (($supplier->id == $default_supplier)) ? 'checked' : ''  ?>>
								</span>
								
								<?php $supplier_price = (in_array($supplier->id,$product_supplier)) ? $product_supplier_price[$supplier->id] : ''; ?>

								<input type="text" class="form-control" name="price[<?php echo $supplier->id; ?>][]" placeholder="Price" value="<?php echo old('price',$supplier_price); ?>">
							</div><!-- /input-group -->
				        </div>
			        <?php $i++; } ?>
			    </div>    
	          <div class="box-footer">
		        <button type="submit" class="btn btn-primary">Submit</button>
		      </div>
		    </form>
		  </div><!-- /.box -->
		</div>
	</div>	  
</section>
@endsection