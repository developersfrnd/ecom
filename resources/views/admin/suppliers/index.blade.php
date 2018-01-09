@extends('layouts.admin')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
			<div class="box">
				<div class="box-header">
				  <h3 class="box-title">Manage Suppliers</h3>
          <span style="float:right;"><a href="{{ url($ADMIN_URL.'/suppliers/create') }}">Add Suppliers</a></span>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($suppliers as $supplier)
              <tr>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->status == 1 ? 'Active' : 'Inactive' }}</td>
                <td>
                  <a href="{{ route('suppliers.edit', $supplier->id) }}">
                    <img src="{{ asset('assets/images') }}/edit.png" alt="Edit">
                  </a>  &nbsp;&nbsp;&nbsp; 
                  <form id="delform" action="{{ route('suppliers.destroy', $supplier->id) }}" method="post" onsubmit="return confirm('Are you sure to delete?')" style="display:inline;">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="image" src="{{ asset('assets/images') }}/delete.png" style="margin:-8px 0px;">
                  </form>
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

