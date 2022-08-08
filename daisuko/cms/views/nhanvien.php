<script type="text/javascript" src="js/nhanvien.js"></script>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Quản lý nhân viên</strong>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeModal" onclick="add()"><i class="fa fa-plus"></i>&nbsp; Add</button>
                            </div>
                            <div class="card-body">
                              <table id="example" class="table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                            <th>Mã NV</th>
                                            <th>Tên nhân viên</th>
                                            <th>Điện thoại</th>
                                            <th>Email</th>
                                            <th></th>
                                            <th></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $i=0;
                                        foreach($this->data as$row) {
                                            echo '<tr>
                                                <td>'.$row['id'].'</td>
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['dien_thoai'].'</td>
                                                <td>'.$row['email'].'</td>
                                                <td><a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal" onclick="edit('.$i.')"><i class="fa fa-edit"></i></a></td>
                                                <td><a href="nhanvien/del?id='.$row['id'].'"><i class="fa fa-trash-o"></i></a>  </td>
                                            </tr>';
                                            $i++;
                                        }

                                      ?>
                                  </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Thông tin nhân viên</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form-client" method="post" enctype="multipart/form-data" action="nhanvien/save">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <input type="hidden" id="id" name="id">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nhân viên</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name" name="name" placeholder="Tên nhân viên" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="dienthoai" class=" form-control-label">Điện thoại</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="dienthoai" name="dienthoai" placeholder="Số điện thoại" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="email" name="email" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="matkhau" class=" form-control-label">Mật khẩu</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="matkhau" name="matkhau" placeholder="Đặt lại mật khẩu" class="form-control">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i>&nbsp;Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">

            <div class="row form-group">
                <div class="col col-md-3"><label for="dob" class=" form-control-label">DoB</label></div>
                <div class="col-12 col-md-9">
                    <input type="date" id="dob" name="dob" placeholder="Date of Birth" class="form-control">
                    <small class="form-text text-muted">This is a help text</small>
                </div>
            </div>


                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Warning</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Are you sure to delete this data?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="del()">Confirm</button>
                    </div>
                </div>
            </div>
        </div> -->
