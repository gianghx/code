<script type="text/javascript" src="js/phiship.js"></script>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Quản lý phí ship</strong>
                            </div>
                            <div class="card-body">
                              <table id="example" class="table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                            <th>ID</th>
                                            <th>Thành phố</th>
                                            <th>Quận huyện</th>
                                            <th>Phí ship</th>
                                            <th></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $i=0;
                                        foreach($this->data as$row) {
                                            echo '';
                                            echo '<tr>
                                                <td>'.$row['id'].'</td>
                                                <td>'.$row['thanhpho'].'</td>
                                                <td>'.$row['name'].'</td>
                                                <td align="right">'.number_format($row['phi_ship']).'</td>
                                                <td><a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal" onclick="edit('.$i.')"><i class="fa fa-edit"></i></a></td>
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
                        <h5 class="modal-title" id="largeModalLabel">Thông tin quận huyện</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form-client" method="post" enctype="multipart/form-data" action="phiship/save">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <input type="hidden" id="id" name="id">
                                    <div class="col col-md-3"><label for="thanhpho" class=" form-control-label">Thành phố</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="thanhpho" name="thanhpho" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="phiship" class=" form-control-label">Phí ship</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="phiship" name="phiship" placeholder="Phí ship hàng" class="form-control" onkeyup="this.value=Comma(this.value)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="quanhuyen" class=" form-control-label">Quận huyện</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="quanhuyen" name="quanhuyen" placeholder="Quận huyện" class="form-control" readonly>
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
