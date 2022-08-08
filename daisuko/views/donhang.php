<?php
    if (isset($_SESSION['enduser'])) {
?>
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h1 style="font-family: 'Roboto', sans-serif;">Danh sách đơn hàng của bạn</h1>
                    <p>Cảm ơn bạn đã hợp tác với ybc.vn</p>
                </div>
                <div class="page_link">
                    <!-- <a href="">Tiếp tục mua hàng</a> -->
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ngày đặt</th>
                            <th>Mã đơn</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th>Số tiền</th>
                            <th>Phụ trách</th>
                            <th>Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                          $donhang = $data->getdonhang($_SESSION['enduser']['id'], $_SESSION['enduser']['id']);
                          $total = 0;
                          foreach ($donhang AS $item) {
                              echo '
                              <tr>
                                  <td>'.date("d/m/Y", strtotime($item['ngay_gio'])).'</td>
                                  <td id="madon'.$item['id'].'">'.$item['ma_don'].'</td>
                                  <td id="name'.$item['id'].'">'.$item['name'].'</td>
                                  <td>'.$item['dia_chi'].'</td>
                                  <td>'.$item['dien_thoai'].'</td>
                                  <td>'.number_format($item['tien_hang']).'</td>
                                  <td>'.$item['nhanvien'].'</td>
                                  <td>'.$item['tinhtrang'].'</td>
                                  <td><a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal" onclick="edit('.$item['id'].')"><i class="fa fa-edit"></i></a></td>
                              </tr>
                              ';
                              $total = $total+$item['tien_hang'];
                          }
                      ?>
                      <tr>
                          <td></td>
                          <td></td>
                          <td><h5>Tổng cộng thành tiền:</h5></td>
                          <td></td>
                          <td></td>
                          <td><h5 id="tongcong"><?php echo number_format($total) ?></h5></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                      <tr class="out_button_area">
                          <td colspan="9"><a class="main_btn" href="">Thêm đơn hàng mới</a></td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Thông tin đơn hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-client" method="post" enctype="multipart/form-data" action="donhang/save">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row form-group">
                                <input type="hidden" id="id" name="id">
                                <div class="col col-md-4"><label for="madon" class=" form-control-label">Đơn hàng</label></div>
                                <div class="col-12 col-md-8">
                                    <input type="text" id="madon" name="madon" placeholder="Mã đơn hàng" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row form-group">
                                <div class="col col-md-4"><label for="khachhang" class=" form-control-label">Khách hàng</label></div>
                                <div class="col-12 col-md-8">
                                    <input type="text" id="khachhang" name="khachhang" placeholder="Tên khách hàng" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <table id="detail" class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Chiết khấu TM</th>
                                    <th>Chiết khấu %</th>
                                    <th>Thành tiền</th>
                              </tr>
                          </thead>
                          <tbody id="tbody">
                          </tbody>
                      </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i>&nbsp;Đóng</button>
                    <!-- <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Update</button> -->
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function edit(id) {
        var madon = document.getElementById("madon"+id).innerHTML;
        var khachhang = document.getElementById("name"+id).innerHTML;
        document.getElementById("madon").value=madon;
        document.getElementById("khachhang").value=khachhang;
        $.get("views/donhangdetail.php?id="+id, function(data, status){
            document.getElementById("tbody").innerHTML=data;
            // alert(data);
        });
    }
</script>
<?php
} else
    echo "<script>window.location.assign('dangnhap');</script>";
?>
