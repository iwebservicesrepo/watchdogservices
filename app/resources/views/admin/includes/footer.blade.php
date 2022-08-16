<footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} <a class="text-warning" href="{{ URL('admin/dashboard')}}">{{ env('APP_NAME') }}</a>.</strong>
    All rights reserved.
</footer>

<script src="{{ asset('admin/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/js/moment.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/js/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('admin/js/daterangepicker.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/js/jszip.min.js') }}"></script>
<script src="{{ asset('admin/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/js/buttons.colVis.min.js') }}"></script> 
<script src="{{ asset('admin/js/custom.js?v=1') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/sweetalert2.all.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/js/sweetalert2.min.js')}}"></script>


<!-- AdminLTE App -->
<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>

<script>
$.widget.bridge('uibutton', $.ui.button);
</script>