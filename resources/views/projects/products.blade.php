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
				<h2>Category Heading</h2>
				<div class="category-list">
					<ul>
						<li>
							<a href="#">Category 1</a>
						</li>
						<li>
							<a href="#">Category 2</a>
						</li>
						<li>
							<a href="#">Category 3</a>
						</li>
						<li>
							<a href="#">Category 1</a>
						</li>
						<li>
							<a href="#">Category 2</a>
						</li>
						<li>
							<a href="#">Category 3</a>
						</li>
					</ul>
				</div><!-- category-list -->
			</div>

			<div class="col-sm-8 col-12">
				<h2>Main Heading</h2>
				<div class="category-box">
					<h3>Category Heading</h3>

					<div class="row">
						<div class="col-sm-4 col-6">
							<figure>
					      <span>
						      <img src="{{ asset('assets/images/no-image.png') }}" height="100" width="100" alt="{{ $product->name }}">	
						     </span>
					      <figcaption>
					        <h4>Product Name</h4>
					        <p>Product Description</p>
					        <a href="#" class="btn-blue">View Detail</a>
					      </figcaption>
					    </figure>
						</div>
						<div class="col-sm-4 col-6">
							<figure>
					      <span>
						      <img src="{{ asset('assets/images/no-image.png') }}" height="100" width="100" alt="{{ $product->name }}">	
						     </span>
					      <figcaption>
					        <h4>Product Name</h4>
					        <p>Product Description</p>
					        <a href="#" class="btn-blue">View Detail</a>
					      </figcaption>
					    </figure>
						</div>
						<div class="col-sm-4 col-6">
							<figure>
					      <span>
						      <img src="{{ asset('assets/images/no-image.png') }}" height="100" width="100" alt="{{ $product->name }}">	
						     </span>
					      <figcaption>
					        <h4>Product Name</h4>
					        <p>Product Description</p>
					        <a href="#" class="btn-blue">View Detail</a>
					      </figcaption>
					    </figure>
						</div>
					</div>
				</div><!-- category-box -->

				<div class="category-box">
					<h3>Category Heading</h3>

					<div class="row">
						<div class="col-sm-4 col-6">
							<figure>
					      <span>
						      <img src="{{ asset('assets/images/no-image.png') }}" height="100" width="100" alt="{{ $product->name }}">	
						     </span>
					      <figcaption>
					        <h4>Product Name</h4>
					        <p>Product Description</p>
					        <a href="#" class="btn-blue">View Detail</a>
					      </figcaption>
					    </figure>
						</div>
						<div class="col-sm-4 col-6">
							<figure>
					      <span>
						      <img src="{{ asset('assets/images/no-image.png') }}" height="100" width="100" alt="{{ $product->name }}">	
						     </span>
					      <figcaption>
					        <h4>Product Name</h4>
					        <p>Product Description</p>
					        <a href="#" class="btn-blue">View Detail</a>
					      </figcaption>
					    </figure>
						</div>
						<div class="col-sm-4 col-6">
							<figure>
					      <span>
						      <img src="{{ asset('assets/images/no-image.png') }}" height="100" width="100" alt="{{ $product->name }}">	
						     </span>
					      <figcaption>
					        <h4>Product Name</h4>
					        <p>Product Description</p>
					        <a href="#" class="btn-blue">View Detail</a>
					      </figcaption>
					    </figure>
						</div>
					</div>
				</div><!-- category-box -->
			</div>


		</div>
	</div><!-- product-detail -->
@endsection