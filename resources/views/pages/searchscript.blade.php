<script src="{{ elixir('js/app.js') }}"></script>
{{--<!-- jQuery -->
<script src="/vendor/iron-summit-media/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/vendor/iron-summit-media/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>--}}

<!-- DataTables JavaScript -->
<script src="/vendor/iron-summit-media/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/vendor/iron-summit-media/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="/vendor/iron-summit-media/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>


<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>