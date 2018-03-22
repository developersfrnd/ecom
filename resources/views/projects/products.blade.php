@extends('layouts.default')
@section('content')
<div class="container">
	<div class="row d-none">
	  <div class="col-sm-12">
	    <h2>Products For {{ $project->name }}</h2>
	    <div class="row">
	      <?php foreach($categories as $category){ ?>
	        <h4>{{ $category->title }}</h4>
	      		<?php 
	      		foreach($categories_products_arr[$category->id][0] as $cat_product){ 
	      			//print_r($product); die;
	      			$product = $cat_product;
	      			?>
	      			<div class="col-sm-4">
				    <figure>
				      <span>
					      <?php 
					      	if($product->images->count()){
					          foreach($product->images as $image){
					          	$images[] = $image->image;
					          }
					          ?>
					          <img src="{{ asset('/'.$images[0]) }}" height="100" width="100" alt="{{ $product->name }}">
					        <?php  
					        }else{
					        	?>
					        	<img src="{{ asset('assets/images/no-image.png') }}" height="100" width="100" alt="{{ $product->name }}">	
					        <?php }  ?> 
					      </span>
				      <figcaption>
				        <h4> {{ $product->name }} </h4>
				        <p>{{ substr($product->description,0,300) }}</p>
				        <a href="{{ url('products',$product->id) }}?project_id={{ $project->id }}" class="btn-blue">View Detail</a>
				      </figcaption>
				    </figure>
				    </div>
				<?php } ?>
			</div>

	      <?php } ?>
	    </div>
	  </div>
	</div>

	<div class="product-detail-page container">
		<div class="row">
			<div class="col-sm-4 col-12">
				<h2>Categories</h2>
				<div class="category-list">
					<ul>
					<?php foreach($nav_categories as $category){ ?>
						<li>
							<a href="{{ url('projects/products',[$project->id,$category->id]) }}">{{ $category->title }}</a>
						</li>
					<?php } ?>	
					</ul>
				</div><!-- category-list -->
			</div>

			<div class="col-sm-8 col-12">
				<h2>Products For {{ $project->name }}</h2>
				<?php foreach($categories as $category){ ?>
				<div class="category-box">
					<h3>{{ $category->title }}</h3>

					<div class="row">
						<?php 
			            foreach($categories_products_arr[$category->id][0] as $cat_product){ 
			              //print_r($product); die;
			              $product = $cat_product;
			            ?>
						<div class="col-sm-4 col-6">
							<figure>
					      <span>
					      <?php 
		                  if($product->images->count()){
		                    foreach($product->images as $image){
		                      $images[] = $image->image;
		                    }
		                    ?>
						      <img src="{{ asset('/'.$images[0]) }}" height="100" width="100" alt="{{ $product->name }}">
						    <?php  
			                }else{
			                    ?>
			                  <img src="{{ asset('assets/images/no-image.png') }}" height="100" width="100" alt="{{ $product->name }}"> 
			                  <?php }  ?>   	
						    </span>
					      <figcaption>
					        <h4>{{ $product->name }}</h4>
					        <p>{{ substr($product->description,0,300) }}</p>
					        <a href="{{ url('products',$product->id) }}?project_id={{ $project->id }}" class="btn-blue">View Detail</a>
					      </figcaption>
					    </figure>
						</div>
						<?php } ?>
					</div>
				</div><!-- category-box -->
				<?php } ?>
			</div>	
		</div>
	</div><!-- product-detail -->
@endsection