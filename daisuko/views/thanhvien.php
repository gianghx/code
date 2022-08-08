<?php

$thanhvien = $data->thanhvien($_SESSION['id']);
$thisurl = isset($_GET['url']) ? $_GET['url'] : null;
$url = rtrim($thisurl, '/');
$url = explode('/', $thisurl);
$tip = '';
if (isset($_POST['tip']))
    $tip = $_POST['tip'];
$idtv = $_SESSION['id'];
$sodu = $data->getSodu($idtv);
$sodu = $sodu[0]['so_du'];
$sodumoi = $sodu;
$thongtintk = $data->thongtin_tk($_SESSION['id']);
?>
<script>
    function submitTip(tip) {
        document.getElementById('muatip').action = 'thanhvien';
        document.getElementById('tip').value = tip;
        document.getElementById('muatip').submit();
    }
</script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<div class="site-blocks-vs site-section bg-light">
    <div class="container">

        <div class="overlay-success rounded mb-5" data-stellar-background-ratio="0.5">
            <h1>Lịch sử giao dịch</h1>
            <!-- style="background-image: url('images/hero_bg_1.jpg');" -->
            <div class="row align-items-center">
                <div class="table table-striped">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Ngày giờ</th>
                            <th>Nội dung</th>
                            <th>Số tiền</th>
                            <th>Số dư</th>
                            <th style="display: none;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($thanhvien as $item) { ?>
                            <tr>
                                <td><?php echo date("d/m/Y H:i", strtotime($item['ngay'])); ?></td>
                                <td><?php echo $item['noi_dung']; ?></td>
                                <td><?php echo number_format($item['so_tien']); ?> VND</td>
                                <td><?php echo number_format($item['so_du']); ?> VND</td>
                                <td style="display: none;"><?php echo $item['id']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <!-- <button type="button" class="btn btn-primary">Mua ngay</button> -->
                    <!-- <div class="col-md-12 col-lg-4 mb-4 mb-lg-0"><div class="text-center text-lg-left"><div class="d-block d-lg-flex align-items-center"><div class="image mx-auto mb-3 mb-lg-0 mr-lg-3"><img src="images/img_1_sq.jpg" alt="Image" class="img-fluid"></div><div class="text"><h3 class="h5 mb-0 text-black">Sea Hawks</h3><span class="text-uppercase small country text-black">Brazil</span></div></div></div></div><div class="col-md-12 col-lg-4 text-center mb-4 mb-lg-0"><div class="d-inline-block"><p class="mb-2"><small class="text-uppercase text-black font-weight-bold">Premier League &mdash; Round 10</small></p><div class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded"><span class="h3">3:2</span></div><p class="mb-0"><small class="text-uppercase text-black font-weight-bold">10 September / 7:30 AM</small></p></div></div><div class="col-md-12 col-lg-4 text-center text-lg-right"><div class=""><div class="d-block d-lg-flex align-items-center"><div class="image mx-auto ml-lg-3 mb-3 mb-lg-0 order-2"><img src="images/img_4_sq.jpg" alt="Image" class="img-fluid"></div><div class="text order-1"><h3 class="h5 mb-0 text-black">Steelers</h3><span class="text-uppercase small country text-black">London</span></div></div></div></div> -->
                </div>
            </div>
            <thead>
            <tr>
                <th colspan="4">
                    <form id="muatip" name="muatip" method="post">
                                    <span class="text-uppercase date d-block mb-3"
                                          style="padding-top: 20px;text-align: center;">
                                        <input type="hidden" id="tip" name="tip"/>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target=".bd-example-modal-sm"
                                                onclick="submitTip(1)">Mua tip ngày</button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target=".bd-example-modal-sm"
                                                onclick="submitTip(2)">Mua tip thành viên</button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target=".bd-example-modal-sm"
                                                onclick="submitTip(3)">Mua tip vip</button>
                                    </span>
                    </form>
                </th>
            </tr>
            </thead>
        </div>
    </div>
</div>

<!----------------------------------------------------Model bootstrap----------------------------------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<div class="modal fade" id="myModal" style="z-index: 2000;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    <?php
                    if ($tip == 1 && $sodu > 3000000) {
                        $sodumoi = $sodu - 3000000;
                        $noidung = 'Mua tip ngày';
                        $data->addGiaodich($idtv, $noidung, '-3000000', $sodumoi);
                        $data->updateTaikhoan($idtv, $sodumoi, 1);
                        $check = $data->MuaTip($thongtintk[0]['sdt'],0);
                        if ($check) {
                            echo 'Quý khách đã mua tip thành công, vui lòng chờ nhận kết quả qua tin nhắn';
                        } else
                            echo 'Quý khách đã mua tip, vui lòng chờ nhận kết quả qua tin nhắn';

                    }
                    elseif ($tip == 2 && $sodu > 30000000) {
                        $sodumoi = $sodu - 30000000;
                        $noidung = 'Mua tip thành viên';
                        $data->addGiaodich($idtv, $noidung, '-30000000', $sodumoi);
                        $data->updateTaikhoan($idtv, $sodumoi, 2);
                        $check = $data->MuaTip($thongtintk[0]['sdt'],0);
                        if ($check) {
                            echo 'Quý khách đã mua tip thành công, vui lòng chờ nhận kết quả qua tin nhắn';
                        } else
                            echo 'Quý khách đã mua tip, vui lòng chờ nhận kết quả qua tin nhắn';

                    }  elseif ($tip == 3 && $sodu > 20000000) {
                        $sodumoi = $sodu - 20000000;
                        $noidung = 'Mua tip vip';
                        $data->addGiaodich($idtv, $noidung, '-20000000', $sodumoi);
                        $data->updateTaikhoan($idtv, $sodumoi, 3);
                        $check = $data->MuaTip($thongtintk[0]['sdt'],1);
                        if ($check) {
                            echo 'Quý khách đã mua tip thành công, vui lòng chờ nhận kết quả qua tin nhắn';
                        } else
                            echo 'Quý khách đã mua tip, vui lòng chờ nhận kết quả qua tin nhắn';

                    } else
                        echo 'Số dư của bạn không đủ, vui lòng nạp thêm';
                    ?>
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <?php if ($check) { ?>
                <div class="modal-body">
                    Số dư hiện tại của bạn là: <?php echo number_format($sodumoi); ?> VND
                </div>
            <?php } ?>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="window.location.href='thanhvien'">Close
                </button>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    <?php
    if ($tip != '')
        echo "$('#myModal').modal('show'); setTimeout(function(){ window.location.href='thanhvien' }, 10000);";
    ?>

</script>
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#example').DataTable({
            fixedHeader: true,
            "language": {
                "sProcessing": "Đang xử lý...",
                "sLengthMenu": "Xem _MENU_ mục",
                "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sSearch": "Tìm:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Đầu",
                    "sPrevious": "Trước",
                    "sNext": "Tiếp",
                    "sLast": "Cuối"
                }
            },
            "processing": true, // tiền xử lý trước
            "aLengthMenu": [[10, 20, 50, 100], [10, 20, 50, 100]], // danh sách số trang trên 1 lần hiển thị bảng
            "order": [[4, 'desc']] //sắp xếp giảm dần theo cột thứ 0
        });
    });
</script>