<!-- Bootstrap JS -->
<script src="{{ asset('theme') }}/assets/js/bootstrap.bundle.min.js"></script>

<!--plugins-->
<script src="{{ asset('theme') }}/assets/js/jquery.min.js"></script>
<script src="{{ asset('theme') }}/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{ asset('theme') }}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{ asset('theme') }}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!-- App JS -->
<script src="{{ asset('theme') }}/assets/js/app.js"></script>
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
    @else
    @endif
</script>
