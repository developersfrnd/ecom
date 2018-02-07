@extends('layouts.default')
@section('content')
<div class="container">
	<div class="row">
	  <div class="col-sm-12">
	    <h2>Products For {{ $project->name }}</h2>
	    <div class="row">
	      <?php foreach($products as $product){ ?>
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
	  </div>
	</div>
@endsection