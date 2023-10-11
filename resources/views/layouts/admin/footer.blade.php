<!-- Main Footer -->
  <footer class="main-footer">
    <strong>Coreproc Inc. Project - Ordering System - 2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('adminlte/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('adminlte/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>

<!-- bs-custom-file-input -->
<script src="{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
$(function () {

  bsCustomFileInput.init();
});
</script>

</body>
</html>