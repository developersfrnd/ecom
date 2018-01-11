@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-10"><h2>Search Result</h2></div>
      <div class="col-sm-2">
        <select class="form-control">
          <option value="1">Products</option>
          <option value="2">Projects</option>
        </select>
      </div>
    </div>
    <div class="product-detail">
        <div class="row">
          @if($products)
          @foreach($products as $product)

          <div class="col-sm-12 mb-5">
            <h4><a href="{{ url('products',$product->id) }}"> {{ $product->name }} </a></h4>
            <ul>
              <li>
                <span>Model Number:</span>{{ $product->model_no }}
              </li>
              <li>
                <span>SKU:</span>{{ $product->sku }}
              </li>
            </ul>
            <p>{{ $product->short_description }}</p>
          </div>

          @endforeach
          @endif

          @if($projects)
          @foreach($projects as $project)

          <div class="col-sm-12 mb-5">
            <h4><a href="{{ url('products',$product->id) }}"> {{ $project->name }} </a></h4>
            <p>{{ $project->short_description }}</p>
          </div>

          @endforeach
          @endif
        </div>
    </div>
</div>
@endsection