@extends('layouts.admin')
@section('content')
<section class="content">
	<div class="row">
		<div class="col-md-10">
		  <!-- general form elements -->
		  <div class="box box-primary">
		    <div class="box-header">
		      <h3 class="box-title">Associate User</h3>
		    </div><!-- /.box-header -->
		    <!-- form start -->
		    @if (session('status'))
			    <div class="alert alert-success">
			        {{ session('status') }}
			    </div>
			@endif
		    <form method="post" action="<?php echo url($ADMIN_URL.'/projects/users',$project->id);?>">
		    {{ csrf_field() }}
		    	<div class="box-body">
			    	<?php $i=0;
			    	foreach($users as $user){ ?>
			    		<div class="col-lg-3" style="margin-bottom:2px;">
					    	<div class="input-group">
								<span class="">
								  <input type="checkbox" name="user_id[]" value="<?php echo $user->id; ?>" <?php echo (in_array($user->id,$project_user)) ? 'checked' : ''  ?>>
								  <label><?php echo $user->name; ?></label>
								</span>
							</div><!-- /input-group -->
				        </div>
			        <?php $i++; } ?>
			    </div>    
	          <div class="box-footer">
		        <button type="submit" class="btn btn-primary">Submit</button>
		      </div>
		    </form>
		  </div><!-- /.box -->
		</div>
	</div>	  
</section>
@endsection