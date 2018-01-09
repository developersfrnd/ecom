<!-- Sidebar user panel (optional) -->
<div class="user-panel">
	<div class="pull-left image">
	  <img src="{{ asset('assets/images') }}/logo.jpg" class="img-circle" alt="Admin Image">
	</div>
	<div class="pull-left info">
	  <p>Admin</p>
	  <!-- Status -->
	  <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
	  <a href="{{ url($ADMIN_URL.'/lang/en') }}" <?php echo  (app()->getLocale()=='en') ? 'style="color:blue;"' : '' ?>>EN</a>

	  &nbsp;&nbsp;

	  <a href="{{ url($ADMIN_URL.'/lang/he') }}" <?php echo  (app()->getLocale()=='he') ? 'style="color:blue;"' : '' ?>>HE</a>

	</div>
	</div>

	<!-- Sidebar Menu -->
	<ul class="sidebar-menu" data-widget="tree">
	<!-- Optionally, you can add icons to the links -->
	<!-- <li class="treeview">
	  <a href="#"><i class="fa fa-link"></i> <span>Add Product</span>
	    <span class="pull-right-container">
	        <i class="fa fa-angle-left pull-right"></i>
	      </span>
	  </a>
	  <ul class="treeview-menu">
	    <li><a href="{{ url($ADMIN_URL.'/products/create') }}">General</a></li>
	    <li><a href="{{ url($ADMIN_URL.'/images/create') }}">Images</a></li>
	  </ul>
	</li> -->

	<li><a href="{{ url($ADMIN_URL.'/products') }}"><i class="fa fa-link"></i> <span>Manage Products</span></a></li>
	<li><a href="{{ url($ADMIN_URL.'/users') }}"><i class="fa fa-link"></i> <span>Manage Users</span></a></li>
	<li><a href="{{ url($ADMIN_URL.'/suppliers') }}"><i class="fa fa-link"></i> <span>Manage Suppliers</span></a></li>
	<li><a href="{{ url($ADMIN_URL.'/projects') }}"><i class="fa fa-link"></i> <span>Manage Projects</span></a></li>
	<li><a href="{{ url($ADMIN_URL.'/orders') }}"><i class="fa fa-link"></i> <span>Manage Orders</span></a></li>
</ul>
   