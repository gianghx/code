<script type="text/javascript" src="js/banner.js"></script>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Quản lý banner</strong>
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeModal" onclick="add()"><i class="fa fa-plus"></i>&nbsp; Add</button>
                            </div>
                            <div class="card-body">
                              <table id="example" class="table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Hình ảnh</th>
                                            <th style="display: none;"></th>
                                            <th style="display: none;"></th>
                                            <th>Vị trí</th>
                                            <th style="display: none;">Url</th>
                                            <th>Xuất bản</th>
                                            <th></th>
                                            <th></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $i=0;
                                        foreach($this->data as $row) {
                                            echo '';
                                            echo '<tr>
                                                <td>'.$row['id'].'</td>
                                                <td>'.$row['name'].'</td>
                                                <td><img src="'.$row['hinh_anh'].'" height="60"></td>
                                                <td style="display: none;">'.$row['hinh_anh'].'</td>
                                                <td style="display: none;">'.$row['mo_ta'].'</td>
                                                <td>'.$row['com'].'</td>
                                                <td style="display: none;">'.$row['url'].'</td>';
                                                if($row['publish']==1){
                                                    echo '<td style="color: green;">Có</td>';
                                                }else{
                                                    echo '<td style="color: red;">Không</td>';
                                                }
                                                echo '<td><a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal" onclick="edit('.$i.')"><i class="fa fa-edit"></i></a></td>
                                              <td><a href="banner/del?id='.$row['id'].'"><i class="fa fa-trash-o"></i></a>  </td>
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
                        <h5 class="modal-title" id="largeModalLabel">Thông tin banner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form-client" method="post" enctype="multipart/form-data" action="banner/save">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <input type="hidden" id="id" name="id">
                                    <div class="col col-md-3"><label for="thanhpho" class=" form-control-label">Tên banner</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="banner" class=" form-control-label">Hình ảnh</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hinhanh" name="hinhanh" placeholder="Hình ảnh" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="publish" class=" form-control-label">Xuất bản</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="publish" id="publish" class="form-control">
                                            <option value="1">Có</option>
                                            <option value="0">Không</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="quanhuyen" class=" form-control-label">Mô tả</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="mota" name="mota" placeholder="Mô tả" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="vitri" class=" form-control-label">Vị trí</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="vitri" name="vitri" placeholder="Vị trí" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="vitri" class=" form-control-label">Link</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="link" name="link" placeholder="Link" class="form-control">
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
