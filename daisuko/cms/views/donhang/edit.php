<?php
// unset($_SESSION['cartedit']);
$donhang = $this->data;
$cart = array();
foreach ($this->cartdetail as $value) {
    $cart[$value['id']] = array(
        'id' => $value['id'],
        'name' => $value['name'],
        'num' => $value['num'],
        'price' => $value['price'],
        'pricest' => $value['pricest'],
        'hinhanh' => $value['hinhanh']
    );
}
// $_SESSION['cartold'] = $cart;
if (isset($_SESSION['cartedit']) && (count($_SESSION['cartedit']) > 0)) {
    $_SESSION['cartedit'] = $_SESSION['cartedit'];
} else {
    $_SESSION['cartedit'] = $cart;
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
            <div class="col-lg-5">
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
                                    <th width="40"></th>
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
                                        echo ' <button class="btn btn-warning btn-sm" type="button" title="thêm vào phiếu" data-toggle="modal" data-target=".bd-example-modal-lg1" onclick="addphieu(' . $item['id'] . ')" ><i class="fa fa-plus"></i></button> ';
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

            <div class="col-lg-7">
                <div class="card" id="listphieu">
                    <div class="card-header"><strong>Phiên đấu giá</strong></div>
                    <label class="w-100 text-center text-warning" id="thongbao"></label>
                    <div class="card-body card-block">
                        <table class="table table-striped">
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
                                foreach ($_SESSION['cartedit'] as  $value) {
                                    if(count($_SESSION['cartedit'])==1)
                                       $xoa= "disabled";
                                    else
                                        $xoa="";
                                ?>
                                    <tr>
                                        <th><?= $value['name'] ?></th>
                                        <td><img src="<?= $value['hinhanh'] ?>" alt="" height="60"></td>
                                        <td><input class="form-control" type="number" style="width: 70px;" id="soluong_<?= $value['id'] ?>" min="0" onchange="suasl(<?= $value['id'] ?>)" value="<?= $value['num'] ?>"></td>
                                        <td><input class="form-control" type="text" id="gia_<?= $value['id'] ?>" min="0" onchange="suagia(<?= $value['id'] ?>)" value="<?= number_format($value['price']) ?>" onkeyup="javascript:this.value=Comma(this.value);"></td>
                                        <td><input class="form-control" type="text" id="giast_<?= $value['id'] ?>" min="0" onchange="suagia(<?= $value['id'] ?>)" value="<?= number_format($value['pricest']) ?>" onkeyup="javascript:this.value=Comma(this.value);"></td>
                                        <td><button class="btn btn-danger btn-sm" <?=$xoa?> onclick="xoaphieu(<?= $value['id'] ?>)"><i class="fa fa-trash-o"></i></button></td>
                                    </tr>
                                <?php
                                } ?>


                            </tbody>
                        </table>
                        
                        <form method="post" action="donhang/editsave">
                            <div class="form-group">
                                <div class="col col-md-6">
                                    <label for="exampleInputEmail1">Thời gian bắt đầu</label>
                                    <input class="form-control" type="datetime-local" name="batdau" id="batdau" value="<?=date('Y-m-d\TH:i:s', strtotime($donhang[0]['date']))?>" required>
                                </div>
                                <div class="col col-md-6">
                                    <label for="exampleInputEmail1">Thời gian kết thúc</label>
                                    <input class="form-control" type="datetime-local" name="ketthuc" id="ketthuc" value="<?=date('Y-m-d\TH:i:s', strtotime($donhang[0]['date_end']))?>" required>
                                </div>
                                <div class="col col-md-6">
                                    <label for="exampleInputEmail1">Ghi chú</label>
                                    <input class="form-control" type="text" name="ghichu" id="ghichu" value="<?php if (count($donhang) > 0) {
                                                                                                                    echo $donhang[0]['ghi_chu'];
                                                                                                                } ?>">
                                </div>
                                <div class="col col-md-6">
                                    <label for="exampleInputEmail1">Phân loại</label>
                                    <select class="form-control" name="loai">
                                        <option value="4" <?php if( $donhang[0]['noi_bat']==4) echo 'selected' ?>>Hàng tốt thanh lý</option>
                                        <option value="2" <?php if( $donhang[0]['noi_bat']==2) echo 'selected' ?>>Hàng nhập khẩu</option>
                                        <option value="5" <?php if( $donhang[0]['noi_bat']==5) echo 'selected' ?>>Thực phẩm sạch</option>
                                        <option value="1" <?php if( $donhang[0]['noi_bat']==1) echo 'selected' ?>>Hàng Việt Nam</option>
                                        <option value="3" <?php if( $donhang[0]['noi_bat']==3) echo 'selected' ?>>Dịch vụ - Du lịch - Nghỉ dưỡng</option>
                                    </select>
                                </div>

                            </div>
                            
                            <input type="hidden" id="countcart" value="<?= count($_SESSION['cartedit'])?>">
                            <input type="hidden" name="madon" id="madon" value="<?=$donhang[0]['id']?>">
                            <button type="submit" name="btntt" onclick="return checkSubmit()" class="btn btn-outline-success btn-lg btn-block" style="margin-top: 20px;">Lưu lại</button>
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
        $.post("donhang/addphieuedit", {
            'id': id
        }, function(data) {
            $("#listphieu").load("<?= CMS ?>/donhang/edit?id=<?= $this->cartdetail[0]['don_hang'] ?> #listphieu");
        });
    }

    function xoaphieu(id) {
        $.post("donhang/deletephieuedit", {
            'id': id,
            'num': 0
        }, function(data) {
            $("#listphieu").load("<?= CMS ?>/donhang/edit?id=<?= $this->cartdetail[0]['don_hang'] ?> #listphieu");
        });
    }

    function suasl(id) {
        num = $("#soluong_" + id).val();
        $.post("donhang/deletephieuedit", {
            'id': id,
            'num': num
        }, function(data) {
            $("#listphieu").load("<?= CMS ?>/donhang/edit?id=<?= $this->cartdetail[0]['don_hang'] ?> #listphieu");
        });
    }

    function suagia(id) {
        price = $("#gia_" + id).val();
        pricest = $("#giast_" + id).val();
        price = price.replaceAll(',', '');
        pricest = pricest.replaceAll(',', '');
        $.post("donhang/updategiaedit", {
            'id': id,
            'price': price,
            'pricest': pricest
        }, function(data) {
            $("#listphieu").load("<?= CMS ?>/donhang/edit?id=<?= $this->cartdetail[0]['don_hang'] ?> #listphieu");
        });
    }

    function checkSubmit() {
        let countcart = $("#countcart").val();
        if (countcart > 0) {
            if (countcart==1)
                return true;
            else{
                document.getElementById("thongbao").innerHTML="Bạn chỉ được chọn một sản phẩm";
                return false;
            }
            
        }else{
            document.getElementById("thongbao").innerHTML="Ban can phai chon mat hang";
            return false;
            
        }
    }

    
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