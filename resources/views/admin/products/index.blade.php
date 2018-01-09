@extends('layouts.admin')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
			<div class="box">
				<div class="box-header">
				  <h3 class="box-title">Manage Products</h3>
          <span style="float:right;"><a href="{{ url($ADMIN_URL.'/products/create') }}">Add Product</a></span>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>SKU</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
              <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>
                <td>
                  <a href="{{ route('products.edit', $product->id) }}">
                        <img src="{{ asset('assets/images') }}/edit.png" alt="Edit">
                    </a>  &nbsp;&nbsp;&nbsp; 
                  <form id="delform" action="{{ route('products.destroy', $product->id) }}" method="post" onsubmit="return confirm('Are you sure to delete?')" style="display:inline;">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="image" src="{{ asset('assets/images') }}/delete.png" style="margin:-8px 0px;">
                  </form>
                  &nbsp;|&nbsp;
                  <a href="{{ url($ADMIN_URL.'/images/create', $product->id) }}">Manage Image</a>
                  &nbsp;|&nbsp;
                  <a href="{{ url($ADMIN_URL.'/products/product-suppliers', $product->id) }}">Manage Suppliers</a>
                </td>
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

