<?php
if (isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
    $_SESSION['cart'] = $_SESSION['cart'];
} else {
    $_SESSION['cart'] = array();
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Đấu giá</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="donhang">Đấu giá</a></li>
                    <li class="active">Tạo phiên</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-12 col-md-5">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Danh sách sản phẩm</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Hình ảnh</th>
                                    <th>Giá bán</th>
                                    <th width="30"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sanpham = $this->sanpham;
                                if (sizeof($sanpham) > 0) {
                                    $i = 1;
                                    foreach ($sanpham as $item) {
                                        echo '<tr>
                                                       <td>' . $item['name'] . '</td>
                                                       <td><img src="' . $item['hinh_anh'] . '" alt="" height="60"></td>
                                                       <td>' . number_format($item['gia_ban']) . '</td>';
                                        echo '<td align="center">';
                                        echo ' <button class="btn btn-warning btn-sm" type="button" title="Thêm vào phiếu" data-toggle="modal" data-target=".bd-example-modal-lg1" onclick="addphieu(' . $item['id'] . ')" ><i class="fa fa-plus"></i></button> ';
                                        echo '</td></tr>';
                                        $i++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- .card -->

            </div>
            <!--/.col-->

            <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-header"><strong>Phiên đấu giá</strong></div>
                    <label class="w-100 text-center text-warning" id="thongbao"></label>
                    <div class="card-body card-block">
                        <table class="table table-striped" id="listphieu">
                            <thead>
                                <tr>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá sàn</th>
                                    <th scope="col">Giá ST</th>
                                    <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $tong = 0;
                                foreach ($_SESSION['cart'] as  $value) {
                                ?>
                                    <tr>
                                        <th><?= $value['name'] ?></th>
                                        <td><img src="<?= $value['hinhanh'] ?>" alt="" height="60"></td>
                                        <td><input class="form-control" type="number" style="width: 70px;" id="soluong_<?= $value['id'] ?>" min="0" onchange="suasl(<?= $value['id'] ?>)" value="<?= $value['num'] ?>"></td>
                                        <td><input class="form-control" type="text" maxlength="15" id="gia_<?= $value['id'] ?>" onchange="suagia(<?= $value['id'] ?>)" value="<?= number_format($value['price']) ?>" onkeyup="javascript:this.value=Comma(this.value);"></td>
                                        <td><input class="form-control" type="text" maxlength="15" id="giast_<?= $value['id'] ?>" onchange="suagia(<?= $value['id'] ?>)" value="<?= number_format($value['pricest']) ?>" onkeyup="javascript:this.value=Comma(this.value);"></td>
                                        <td><button class="btn btn-danger btn-sm" onclick="xoaphieu(<?= $value['id'] ?>)"><i class="fa fa-trash-o"></i></button></td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>

                        </table>
                        <form method="post" action="donhang/save">
                            <div class="form-group">

                                <div class="col col-md-6">
                                    <label for="exampleInputEmail1">Thời gian bắt đầu</label>
                                    <input class="form-control" type="datetime-local" name="batdau" id="batdau" value="" required>
                                </div>
                                <div class="col col-md-6">
                                    <label for="exampleInputEmail1">Thời gian kết thúc</label>
                                    <input class="form-control" type="datetime-local" name="ketthuc" id="ketthuc" value="" required>
                                </div>

                                <div class="col col-md-6">
                                    <label for="exampleInputEmail1">Ghi chú</label>
                                    <input class="form-control" type="text" name="ghichu" id="ghichu" value="">
                                </div>
                                <div class="col col-md-6">
                                    <label for="exampleInputEmail1">Phân loại</label>
                                    <select class="form-control" name="noibat">
                                        <option value="4">Hàng tốt thanh lý</option>
                                        <option value="2">Hàng nhập khẩu</option>
                                        <option value="5">Thực phẩm sạch</option>
                                        <option value="1">Hàng Việt Nam chất lượng</option>
                                        <option value="3">Dịch vụ - Du lịch - Nghỉ dưỡng</option>
                                    </select>
                                    <!-- <input class="form-control" type="radio" name="noibat" id="noibat" value="2" checked> -->
                                </div>
                                <!--  <div class="col col-md-3">
                                    <label for="exampleInputEmail1">Mới</label>
                                    <input class="form-control" type="radio" name="noibat" id="noibat1" value="1" >
                                </div> -->
                            </div>

                            <div id="countcart1">
                                <input type="hidden" id="countcart" value="<?= count($_SESSION['cart']) ?>">
                            </div>
                            <button type="submit" name="btntt" onclick="return checkSubmit()" class="btn btn-outline-success btn-lg btn-block" style="margin-top: 20px;">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>


        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->
<script>
    function addphieu(id) {
        $.post("donhang/addphieu", {
            'id': id
        }, function(data) {
            $("#listphieu").load("<?= CMS ?>/donhang/add #listphieu");
            $("#countcart1").load("<?= CMS ?>/donhang/add #countcart1");
        });
    }

    function xoaphieu(id) {
        $.post("donhang/deletephieu", {
            'id': id,
            'num': 0
        }, function(data) {
            $("#listphieu").load("<?= CMS ?>/donhang/add #listphieu");
            $("#countcart1").load("<?= CMS ?>/donhang/add #countcart1");
        });
    }

    function suasl(id) {
        num = $("#soluong_" + id).val();
        $.post("donhang/deletephieu", {
            'id': id,
            'num': num
        }, function(data) {
            $("#listphieu").load("<?= CMS ?>/donhang/add #listphieu");
            $("#countcart1").load("<?= CMS ?>/donhang/add #countcart1");
        });
    }

    function suagia(id) {
        price = $("#gia_" + id).val();
        pricest = $("#giast_" + id).val();
        price = price.replaceAll(',', '');
        pricest = pricest.replaceAll(',', '');
        $.post("donhang/updategia", {
            'id': id,
            'price': price,
            'pricest': pricest
        }, function(data) {
            $("#listphieu").load("<?= CMS ?>/donhang/add #listphieu");
        });
    }


    function loadkhachhang() {
        var kh = $("#khachhang").val();
        $.get("donhang/getkhachhang?id=" + kh, function(data, status) {
            let kh = JSON.parse(data);
            document.getElementById("sdt").value = kh.dien_thoai;
            document.getElementById("diachi").value = kh.dia_chi;
        });
    }

    function checkSubmit() {
        let countcart = $("#countcart").val();
        if (countcart > 0) {
            if (countcart == 1)
                return true;
            else
                document.getElementById("thongbao").innerHTML = "Bạn chỉ được chọn một sản phẩm";
            return false;
        } else {
            document.getElementById("thongbao").innerHTML = "Bạn cần phải chọn mặt hàng";
            return false;

        }
    }

    //   function chetkhau(){
    //       var ck= $("#chietkhau").val();
    //       var tong=$("#tong").val();
    //       var tt= tong-(tong*ck/100);
    //       $("#thanhtien").text(comma(tt));
    //       $("#thanhtien1").val(tt);
    //   }
</script>

<script type="text/javascript">
    $(document).ready(function() {
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
            "aLengthMenu": [
                [10, 20, 50, 100],
                [10, 20, 50, 100]
            ], // danh sách số trang trên 1 lần hiển thị bảng
        });
    });
</script>