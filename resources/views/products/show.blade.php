@extends('layouts.default')
@section('content')
<div class="container">
	<div class="row">
	  <div class="col-sm-12">
	    <h2>Product</h2>
	    <div class="product-detail">
	      <div class="row">
	        <div class="col-sm-3">
	        <?php 
	          foreach($product->images as $image){
	          	$images[] = $image->image;
	          }
	        ?>
	        <img src="{{ asset('storage/'.$images[0]) }}" alt="{{ $product->name }}">
	        </div>
	        <div class="col-sm-9">
	          <h4>{{ $product->name }}</h4>
	          <ul>
	            <li>
	              <span>Model Number:</span>{{ $product->model_no }}
	            </li>
	            <li>
	              <span>SKU:</span>{{ $product->sku }}
	            </li>
	          </ul>
	          <p>{{ $product->description }}</p>
	        </div>
	      </div>
	    </div>
	    <h4>Suppliers</h4>
	    <table class="table">
	      <thead>
	        <tr>
	          <th scope="col">Supplier</th>
	          <th scope="col">Price</th>
	          <th scope="col">&nbsp;</th>
	        </tr>
	      </thead>
	      <tbody>
	        <tr>
	          <td>{{ $default_supplier->name }}</td>
	          <td>${{ $default_supplier->pivot->price }}</td>
	          <td class="text-right">
	          	<form id="enquiryform" action="{{ url('orders') }}" method="post" style="display:inline;">
	                {{csrf_field()}}
	                <input name="_method" type="hidden" value="POST">
	                <input name="product_id" type="hidden" value="{{ $product->id }}">
	                <button type="submit" class="btn-blue">Send Enquiry</button>
	            </form>
	          </td>
	        </tr>
	      </tbody>
	    </table>
	  </div>
	</div>
</div>
@endsection