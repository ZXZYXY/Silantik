<!-- jQuery -->
<script src="{{ asset('theme') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('theme') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('theme') }}/dist/js/adminlte.min.js"></script>

<script src="{{ asset('theme/sweetalert/sweetalert.min.js') }}"></script>
<script>
    @if (session()->has('success'))
        swal({
            icon: "success",
            title: "BERHASIL!",
            text: "{{ session('success') }}",
            timer: 1500,
            buttons: false,
        });
    @elseif (session()->has('gagal'))
        swal({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('gagal') }}",
        });
    @endif
</script>
