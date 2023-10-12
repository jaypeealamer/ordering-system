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
// Get Total New Ordered Status
 $.ajax({
    type: "GET",
    url: "{{route('get.count.new_order.api')}}",
    success: function(result) {
      $("#total_new_order").html(result + " new");
    }
});
</script>

<script>
    function logoutFunc(){

        Swal.fire({
        title: 'Are you sure you want to Sign-out?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Sign-out!'
        }).then((result) => {
            if (result.isConfirmed) {
              var csrfToken = $('meta[name="csrf-token"]').attr('content'); 

              $.ajax({
                  url: "{{ url('logout') }}",
                  type: "POST",
                  dataType: "json", 
                  headers: {
                      'X-CSRF-TOKEN': csrfToken 
                  },
                  contentType: false,
                  processData: false,
                  success: function(response) {
                    alert("Hell ")


                  },
              });
              window.location.href = "{{ url('login') }}";


            }
        })
    }
</script>

</body>
</html>