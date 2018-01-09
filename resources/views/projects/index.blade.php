@extends('layouts.default')
@section('content')
<div class="container">
	<div class="row">
	  <div class="col-sm-12">
	    <h2>Projects</h2>
	    <div class="row">
	      <?php foreach($projects as $project){ ?>
		      <div class="col-sm-4">
		        <figure>
		          <span>
		          @if($project->image)
		          	<img src="{{ asset('/'.$project->image) }}" height="100" width="100" alt="{{ $project->name }}">
		          @else
		          	<img src="{{ asset('/uploads/placeholder.png') }}" height="100" width="100" alt="{{ $project->name }}">
		          @endif
		          </span>
		          <figcaption>
		            <h4> {{ $project->name }} </h4>
		            <p>{{ substr($project->description,0,300) }}</p>
		            <a href="{{ url('projects/products',$project->id) }}" class="btn-blue">View Products</a>
		          </figcaption>
		        </figure>
		      </div>
	      <?php } ?>
	    </div>
	  </div>
	</div>
	<!-- <nav aria-label="Page navigation example">
	  <ul class="pagination justify-content-center">
	    <li class="page-item">
	      <a class="page-link" href="#" aria-label="Previous">
	        <span aria-hidden="true">&laquo;</span>
	        <span class="sr-only">Previous</span>
	      </a>
	    </li>
	    <li class="page-item active"><a class="page-link" href="#">1</a></li>
	    <li class="page-item"><a class="page-link" href="#">2</a></li>
	    <li class="page-item"><a class="page-link" href="#">3</a></li>
	    <li class="page-item">
	      <a class="page-link" href="#" aria-label="Next">
	        <span aria-hidden="true">&raquo;</span>
	        <span class="sr-only">Next</span>
	      </a>
	    </li>
	  </ul>
	</nav> -->
	</div>
@endsection