<div class="breadcrumbs">
    <div class="col-sm-8">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>CMS 4.0 - Bản quyền thuộc về Thương Hiệu Web</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">A product of VELO Software</li>
                </ol>
            </div>
        </div>
    </div>
</div>
</div><!-- /#right-panel -->
<!-- Script -->
    <script src="template/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="template/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="template/assets/js/main.js"></script>
    <script src="template/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="template/assets/js/dashboard.js"></script>
    <script src="template/assets/js/widgets.js"></script>
    <script src="template/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="template/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="template/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="template/vendors/jszip/dist/jszip.min.js"></script>
    <script src="template/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="template/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="template/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="template/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="template/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="template/assets/js/init-scripts/data-table/datatables-init.js"></script>
    <script src="template/assets/vendors/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="template/assets/vendors/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script>
(function($) {
    "use strict";
    jQuery('#vmap').vectorMap({
        map: 'world_en',
        backgroundColor: null,
        color: '#ffffff',
        hoverOpacity: 0.7,
        selectedColor: '#1de9b6',
        enableZoom: true,
        showTooltip: true,
        values: sample_data,
        scaleColors: ['#1de9b6', '#03a9f5'],
        normalizeFunction: 'polynomial'
    });
})(jQuery);
</script>
</body>
</html>
