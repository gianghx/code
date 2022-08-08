<script type="text/javascript" src="js/menu.js"></script>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Quản lý top menu</strong>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeModal" onclick="add()"><i class="fa fa-plus"></i>&nbsp; Add</button>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Kiểu link</th>
                                    <th>Link</th>
                                    <th>Thứ tự</th>
                                    <th>Cha</th>
                                    <th>Sub</th>
                                    <th>oname</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=0;
                                    foreach($this->data as $row) {
                                      $prefix='';
                                      for ($j=0;$j<$row['level'];$j++)
                                        $prefix.='--';
                                      echo '
                                      <tr>
                                          <td>'.$row['id'].'</td>
                                          <td>'.$prefix.$row['name'].'</td>
                                          <td>'.$row['phan_loai'].'</td>
                                          <td>'.$row['url'].'</td>
                                          <td>'.$row['thu_tu'].'</td>
                                          <td>'.$row['cha'].'</td>
                                          <td>'.$row['sub_menu'].'</td>
                                          <td>'.$row['name'].'</td>
                                          <td>'.$row['name_en'].'</td>
                                          <td>
                                              <a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal" onclick="edit('.$i.')"><i class="fa fa-edit"></i></a>
                                          </td>
                                          <td>
                                              <a href="menu/del?id='.$row['id'].'"><i class="fa fa-trash-o"></i></a>
                                          </td>
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
        </div>
    </div>
    <!-- .animated -->
</div>
<!-- .content -->

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Thông tin menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-client" method="post" enctype="multipart/form-data" action="menu/save">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row form-group">
                                <input type="hidden" id="id" name="id" />
                                <div class="col col-md-3"><label for="name" class="form-control-label">Tên menu</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" placeholder="Tên menu" class="form-control" required />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="url" class="form-control-label">Link</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="url" name="url" placeholder="Liên kết url" class="form-control" />
                                    <select name="baiviet" id="baiviet" class="form-control">
                                        <option value="0">Chọn bài viết</option>
                                    <?php
                                          foreach($this->baiviet AS $item)
                                              echo '<option id="bv-'.$item['url'].'" value="'.$item['url'].'">'.$item['name'].'</option>'
                                    ?>
                                    </select>
                                    <select name="danhmuc" id="danhmuc" class="form-control">
                                        <option value="0">Chọn danh mục bài viết</option>
                                    <?php
                                          foreach($this->danhmuc AS $item)
                                              echo '<option id="dm-'.$item['url'].'" value="'.$item['url'].'">'.$item['name'].'</option>'
                                    ?>
                                    </select>
                                    <select name="sanpham" id="sanpham" class="form-control">
                                        <option value="0">Chọn sản phẩm</option>
                                    <?php
                                          foreach($this->sanpham AS $item)
                                              echo '<option id="sp-'.$item['url'].'" value="'.$item['url'].'">'.$item['name'].'</option>'
                                    ?>
                                    </select>
                                    <select name="loaisanpham" id="loaisanpham" class="form-control">
                                        <option value="0">Chọn danh mục sản phẩm</option>
                                    <?php
                                          foreach($this->loaisanpham AS $item)
                                              echo '<option id="lsp-'.$item['url'].'" value="'.$item['url'].'">'.$item['name'].'</option>'
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="thutu" class="form-control-label">Thứ tự</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="thutu" name="thutu" placeholder="Thứ tự sắp xếp" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="name" class="form-control-label">Tên menu EN</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name_en" name="name_en" placeholder="Tên menu EN" class="form-control" required />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="phanloai" class="form-control-label">Kiểu liên kết</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="phanloai" id="phanloai" class="form-control" onchange="move()">
                                        <option id="opt1" value="1">Bài viết</option>
                                        <!-- <option id="opt2" value="2">Danh mục</option> -->
                                        <option id="opt3" value="3">Sản phẩm</option>
                                        <option id="opt4" value="4">Danh mục sản phẩm</option>
                                        <option id="opt5" value="5" selected>URL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="cha" class="form-control-label">Menu cha</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="cha" id="cha" class="form-control">
                                        <option id="cha0"value="0">Root</option>
                                        <?php
                                            foreach($this->data as $row) {
                                              $prefix='';
                                              for ($j=0;$j<$row['level'];$j++)
                                                  $prefix.='--';
                                              echo '<option id="cha'.$row['id'].'" value="'.$row['id'].'">'.$prefix.$row['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="sub" class="form-control-label">Có submenu</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="sub" id="sub" class="form-control">
                                        <option value="0">Không</option>
                                        <option value="1">Có</option>
                                    </select>
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
