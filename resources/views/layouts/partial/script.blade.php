<!-- jQuery -->
<script src="{{ asset('AdminLTE-3.2.0') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('AdminLTE-3.2.0') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE-3.2.0') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('AdminLTE-3.2.0') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('AdminLTE-3.2.0') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('AdminLTE-3.2.0') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('AdminLTE-3.2.0') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('AdminLTE-3.2.0') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('AdminLTE-3.2.0') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('AdminLTE-3.2.0') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('AdminLTE-3.2.0') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Summernote -->
<script src="{{ asset('AdminLTE-3.2.0') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('AdminLTE-3.2.0') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE-3.2.0') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('AdminLTE-3.2.0') }}/dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('AdminLTE-3.2.0') }}/dist/js/pages/dashboard.js"></script>
<!-- Data tables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)

    new DataTable('#table-nasi', {
        responsive: true
    });
    new DataTable('#table-kue-loyang', {
        responsive: true
    });
    new DataTable('#table-kue-kering', {
        responsive: true
    });
</script>
</body>

</html>
