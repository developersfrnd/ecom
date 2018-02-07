@extends('layouts.default')
@section('content')
<div class="container">
    <div class="col-sm-4 offset-sm-4">
      <div class="catalog">
        <h3><span>My Orders</span></h3>
        <div class="tools-body">
          <table width="500px;" border="1px;">
				@if($orders)
				 <tr>
				  <th>Date</th>
				  <th>Project</th>
				  <th>Product</th>
				</tr>
				 @foreach($orders as $order)
				 <tr>
				  <td>{{ substr($order->created_at,0,10) }}</td>
				  <td>
				  @if($order->project_id)
				  	{{ $order->project->name }}
				  @else
				  	
				  @endif		
				  </td>
				  <td>{{ $order->product->name }}</td>
				 </tr>
				 @endforeach
				 @else
				 <tr>
				  <td colspan="4">No Record Found.</td>
				 </tr>
				@endif 
			</table>
        </div>
      </div>
    </div>
</div>
@endsection
