<script type="text/javascript" src="js/donhangadd.js"></script>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
                <div class="col-lg-4">
                    <!-- <div class="card" style="max-height:200px; overflow:auto;"> -->
                    <div class="card">
                        <div class="card-header">
                            <strong>Sản phẩm</strong>
                        </div>
                        <div class="card-body" style="max-height:450px;overflow:auto;padding:0px">
                          <table class="table table-striped table-bordered">
                              <tbody>
                                  <?php
                                    $i=0;
                                    foreach($this->data as$row) {
                                        echo '
                                        <tr>
                                            <td><img src="'.$row['hinh_anh'].'" height="50"><br>'.$row['name'].'</td>
                                            <td><a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal"
                                            onclick="add('.$row['id'].','.$row['gia_ban'].',\''.$row['name'].'\')"><i class="fa fa-arrow-circle-o-right"></i></a></td>
                                        </tr>
                                        ';
                                        $i++;
                                    }
                                  ?>
                              </tbody>
                          </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <strong>Đơn hàng</strong>
                        </div>
                        <div class="row" style="padding:10px">
                          <div class="col-sm-4">
                              <select name="khachhang" id="khachhang" class="form-control" onchange="diachi(this.value)">
                                  <option value="0">Chọn khách hàng</option>
                                  <?php
                                      foreach($this->khachhang as $row)
                                          echo '<option id="opt'.$row['id'].'" value="'.$row['id'].'">'.$row['name'].'</option>';
                                  ?>
                              </select>
                          </div>
                          <div class="col-sm-4">
                              <select name="nhanvien" id="nhanvien" class="form-control">
                                  <option value="0">Người phụ trách</option>
                                  <?php
                                      foreach($this->nhanvien as $row)
                                          echo '<option id="opt'.$row['id'].'" value="'.$row['id'].'">'.$row['name'].'</option>';
                                  ?>
                              </select>
                          </div>
                          <div class="col-sm-4">
                                <select name="nhanvien" id="nhanvien" class="form-control" onchange="quanhuyen(this.value)">
                                    <option value="0">Tỉnh/thành phố</option>
                                    <?php
                                        foreach($this->thanhpho as $row)
                                            echo '<option id="opt'.$row['id'].'" value="'.$row['id'].'">'.$row['name'].'</option>';
                                    ?>
                                </select>
                          </div>
                        </div>
                        <div class="row" style="padding:10px">
                          <div class="col-sm-8">
                                <input type="text" id="diachi" name="diachi" placeholder="Địa chỉ nhận hàng" class="form-control">
                          </div>
                          <div class="col-sm-4" id="qh">
                              <select name="quanhuyen" id="quanhuyen" class="form-control">
                                  <option value="0">Quận/huyện</option>
                              </select>
                          </div>
                        </div>
                        <div class="card-body">
                          <table id="detail" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                  <tr>
                                        <th>ID</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Chiết khấu TM</th>
                                        <th>Chiết khấu %</th>
                                        <th>Thành tiền</th>
                                  </tr>
                              </thead>
                          </table>
                          <b>Tổng tiền hàng: <span id="tong">0</span>, Phí ship: <span id="ship">0</span></b><br><br>
                          <button type="button" class="btn btn-primary" onclick="save()">Cập nhật</button>
                        </div>
                    </div>
                </div>
        </div><!-- .row -->
    </div><!-- .animated -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Chọn sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-client">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="id" class=" form-control-label">Mã hàng</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="id" name="id" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="soluong" class=" form-control-label">Số lượng</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="soluong" name="soluong" placeholder="Số lượng" class="form-control" value="1" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="chietkhau" class=" form-control-label">Chiết khấu</label></div>
                                <div class="col-12 col-md-9">
                                      <input type="text" id="chietkhau" name="chietkhau" placeholder="Chiết khấu tiền mặt" class="form-control"
                                        onkeyup="this.value=Comma(this.value)">
                                </div>
                            </div>
                        </div><div class="col-sm-6">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="tenhang" class=" form-control-label">Tên hàng</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="tenhang" name="tenhang" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="dongia" class=" form-control-label">Đơn giá</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="dongia" name="dongia" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="chietkhaupt" class=" form-control-label">Chiết khấu %</label></div>
                                <div class="col-12 col-md-9">
                                      <input type="text" id="chietkhaupt" name="chietkhaupt" placeholder="Chiết khấu %" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i>&nbsp;Hủy</button>
                    <button type="button" class="btn btn-primary" onclick="addrow()"
                    data-dismiss="modal"><i class="fa fa-save"></i>&nbsp; Thêm vào đơn</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- .content -->
