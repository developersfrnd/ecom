@extends('layouts.admin')
@section('content')
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-10">
		  <!-- general form elements -->
		  <div class="box box-primary">
		    <div class="box-header">
		      <h3 class="box-title">Add Product Images</h3>
		    </div><!-- /.box-header -->
		    <!-- form start -->
		    <form method="post" action="<?php echo url($ADMIN_URL.'/images');?>" enctype="multipart/form-data">
		    {{ csrf_field() }}
		      <div class="box-body">
		        <div class="form-group">
		          <label for="name">Name</label>
		          <input type="file" class="form-control" id="image" name="images[]"  multiple >
		        </div>
		      </div><!-- /.box-body -->
		      <div class="box-footer">
		      	<input type="hidden" name="product_id" value="{{ $product_id }}">
		        <button type="submit" class="btn btn-primary">Submit</button>
		      </div>
		    </form>
		  </div><!-- /.box -->
		</div>  
		@if($images->count()):
		<div class="col-md-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Images</h3>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Images</th>
                  <th>Action</th>
                </tr>
                <?php foreach($images as $image): ?>
                <tr>
                  <td>1.</td>
                  <td>
                  	<img src="{{ asset('/'.$image->image) }}" height="100" width="100">

                  </td>
                  <td>
                  <form action="{{ url($ADMIN_URL.'/images/destroy', ['id' => $image->id]) }}" method="post" onsubmit="return confirm('Are you sure?');">
					    <input type="hidden" name="_method" value="delete" />
					    {!! csrf_field() !!}
					    <input type="image" src="{{ asset('assets/images') }}/delete.png" style="margin:-8px 0px;">
					</form>
                  </td>
                </tr>
                <?php endforeach ?>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
       @endif 
	</div>  
</section>
@endsection