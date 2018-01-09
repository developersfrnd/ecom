<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.partials.admin.head')
  </head>
  <body class="hold-transition login-page">
	 <div class="login-box">
      <div class="login-logo">
        <a href="javascript:;"><b>{{ $SITE_TITLE }}</b> admin</a>
      </div>
  <!-- /.login-logo -->
      <div class="login-box-body">
        @yield('content')  
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    </div>
    <!-- jQuery 3 -->
    <script src="{{ asset('assets/admin') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('assets/admin') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/admin') }}/dist/js/adminlte.min.js"></script>

    <script src="{{ asset('assets/admin') }}/plugins/iCheck/icheck.min.js"></script>
  <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

  </body>
</html>
