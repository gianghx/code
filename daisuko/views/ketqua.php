<?php
$danhmuc=$data->getdanhmuc();
$baivietmoi = $data->get_baivietmoi();
$tamdiem = $data->tamdiem(3);
$chuyengia = $data->chuyengia();
$tiphomnay = $data->tiphomnay();
$date = date('m/Y');
if(isset ($_REQUEST['thang']))
    $date = date('m/Y',strtotime($_REQUEST['thang']));
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<div class="site-blocks-vs site-section bg-light">
    <div class="container">
        <div class="col-md-12">
            <h2 class="text-uppercase text-black font-weight-bold mb-3">Lịch sử Tips</h2>
            <div class="site-block-tab">
                <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show" id="pills-0" role="tabpanel"
                             aria-labelledby="pills-home-tab">
                            <?php $lichsu = $data->lichsutip(); ?>
                            <div class="row align-items-center">
                                <div class="col-md-12">

                                    <div class="table-responsive">
                                        <table class="table table-dark table table-striped table-bordered" id="ketquatip" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th scope="col" style="color: yellow;font-weight: unset;">Ngày</th>
                                                <th scope="col" style="color: yellow;font-weight: unset;">Trận đấu</th>
                                                <th scope="col" style="color: yellow;font-weight: unset;">Tỉ lệ chấp</th>
                                                <th scope="col" style="color: yellow;font-weight: unset;">Tip</th>
                                                <th scope="col" style="color: yellow;font-weight: unset;">Kết quả</th>
                                                <th scope="col" style="color: yellow;font-weight: unset;">Win/Lose</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i=0; foreach ($lichsu as $ls) { ?>
                                                <tr>
                                                    <th scope="row"><?php echo date("d/m/Y", strtotime($ls['ngay_gio'])); ?></th>
                                                    <td><?php echo $ls['tran_dau']; ?></td>
                                                    <td><?php echo $ls['odd']; ?></td>
                                                    <td><?php echo $ls['tip']; ?></td>
                                                    <td><?php echo $ls['ket_qua']; ?></td>
                                                    <td style="text-align: center;"><?php echo $ls['verdict']; ?></td>
                                                </tr>
                                            <?php
                                                if($ls['tinh_trang']==1 || $ls['tinh_trang']==3)
                                                    $i++;
                                                }
                                            ?>

                                            </tbody>
<!--                                            <tfoot>-->
<!--                                            <tr>-->
<!--                                                <th scope="col" colspan="4"></th>-->
<!--                                                <th scope="col" style="color: yellow;font-weight: unset;">Tỉ lệ thắng:</th>-->
<!--                                                <th scope="col" style="color: yellow;font-weight: unset;">--><?php //echo ceil($i/sizeof($lichsu)*100); ?><!--%</th>-->
<!--                                            </tr>-->
<!--                                            </tfoot>-->
                                        </table>
                                    </div>

                                </div>

                            </div>
                            <script type="text/javascript">
                                document.getElementById("pills-0").classList.add("active");
                            </script>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#ketquatip').DataTable( {
            fixedHeader: true,
            "language": {
                "sProcessing":   "Đang xử lý...",
                "sLengthMenu":   "<spain style='color: red;font-weight: bold;'>Số lượng: </spain> _MENU_",
                "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
                "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix":  "",
                "sSearch":       "<spain style='color: red;font-weight: bold;'>Tháng:<spain>",

                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Đầu",
                    "sPrevious": "Trước",
                    "sNext":     "Tiếp",
                    "sLast":     "Cuối"
                }
            },
            "search": {
                "search": "<?php echo $date; ?>"
            },
            "processing": true, // tiền xử lý trước
            "aLengthMenu": [[10, 20, 50, 100], [10, 20, 50, 100]], // danh sách số trang trên 1 lần hiển thị bảng
            //"order": [[ 0, 'desc' ]] //sắp xếp giảm dần theo cột thứ 1
        } );
    } );
</script>
