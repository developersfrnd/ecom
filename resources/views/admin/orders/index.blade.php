@extends('layouts.admin')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
			<div class="box">
				<div class="box-header">
				  <h3 class="box-title">Manage Orders</h3>
        </div><!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>User</th>
                <th>Product</th>
                <th>Order Date</th>
              </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
              <tr>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->created_at }}</td>
              </tr>
            @endforeach  
            </tbody>
          </table>	  
				</div><!-- /.box-body -->
			</div>
		</div>
	</div>
</section>
@endsection

