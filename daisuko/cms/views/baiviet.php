<script type="text/javascript" src="js/baiviet.js"></script>
<script type="text/javascript" src="libs/tinymce/tinymce.min.js"></script>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Quản lý bài viết</strong>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeModal" onclick="add()"><i class="fa fa-plus"></i>&nbsp; Add</button>
                            </div>
                            <div class="card-body">
                              <table id="example" class="table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                            <th>ID</th>
                                            <th>Ngày đăng</th>
                                            <th>Tên bài viết</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Mô tả</th>
                                            <th>Nội dung</th>
                                            <th>Link ảnh</th>
                                            <th>Danh mục id</th>
                                            <th>Vị trí</th>
                                            <th>URL</th>
                                            <th>Danh mục</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
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
                                              <td>'.$row['ngay_dang'].'</td>
                                              <td>'.$row['name'].'</td>
                                              <td>'.$row['hinhanh'].'</td>
                                              <td>'.$row['mo_ta'].'</td>
                                              <td>'.$row['noi_dung'].'</td>
                                              <td>'.$row['hinh_anh'].'</td>
                                              <td>'.$row['danh_muc'].'</td>
                                              <td>'.$row['com'].'</td>
                                              <td>'.$row['url'].'</td>
                                              <td>'.$row['danhmuc'].'</td>
                                              <td>'.$row['name_en'].'</td>
                                              <td>'.$row['mo_ta_en'].'</td>
                                              <td>'.$row['noi_dung_en'].'</td>
                                              <td><a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal" onclick="edit('.$i.')"><i class="fa fa-edit"></i></a></td>';
                                              if ($row['id']!=30 && $row['id']!=31) {
                                                 echo '<td><a href="baiviet/del?id='.$row['id'].'"><i class="fa fa-trash-o"></i></a>  </td>';
                                              }else{
                                                echo '<td><a><i class="fa fa-trash-o"></i></a>  </td>';
                                              }
                                              
                                          echo '</tr>';
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

        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Thông tin bài viết</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form-client" method="post" enctype="multipart/form-data" action="baiviet/save">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <input type="hidden" id="id" name="id">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên bài viết</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name" name="name" placeholder="Tên bài viết" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="hinhanh" class=" form-control-label">Link ảnh</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hinhanh" name="hinhanh" placeholder="Link ảnh" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="url" class=" form-control-label">URL</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="url" name="url" placeholder="Để trống sẽ cập nhật theo tên bài viết" class="form-control">
                                    </div>
                                </div>
                            </div><div class="col-sm-6">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên bài viết EN</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name_en" name="name_en" placeholder="Tên bài viết EN" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="vitri" class=" form-control-label">Vị trí home</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="vitri" name="vitri" placeholder="Vị trí xuất hiện trên trang chủ" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="danhmuc" class=" form-control-label">Danh mục</label></div>
                                    <div class="col-12 col-md-9">
                                          <select name="danhmuc" id="danhmuc" class="form-control">
                                              <option value="0">Chọn danh mục bài viết</option>
                                              <?php
                                                  foreach($this->danhmuc as $row)
                                                      echo '<option id="opt'.$row['id'].'" value="'.$row['id'].'">'.$row['name'].'</option>';
                                              ?>
                                          </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-12 col-md-12">
                            <h5>Mô tả</h5>
                            <textarea rows="3" class="form-control1 control2" name="mota" id="mota"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-12 col-md-12">
                            <h5>Mô tả EN</h5>
                            <textarea rows="3" class="form-control1 control2" name="motaen" id="motaen"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-12 col-md-12">
                            <h5>Nội dung</h5>
                            <textarea rows="3" class="form-control1 control2" name="noidung" id="noidung"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-12 col-md-12">
                            <h5>Nội dung EN</h5>
                            <textarea rows="3" class="form-control1 control2" name="noidungen" id="noidungen"></textarea>
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


        <script>
        	tinymce.init({
                        mode: "textareas",
        								entity_encoding : "raw",
                        plugins: ["advlist autolink lists link image charmap print preview anchor",
                                    "searchreplace visualblocks code fullscreen textcolor", "media",
                                    "insertdatetime media table contextmenu paste jbimages","fullscreen","moxiemanager"],
                        image_advtab: true,
                        paste_data_images: true,
                        browser_spellcheck : true,
                        relative_urls:false,
                        remove_script_host : false,
                        //convert_urls : true,
                        image_dimensions: false,
                        forced_root_block : false,
                        force_br_newlines : true,
                        force_p_newlines : false,
                        toolbar: " undo redo | styleselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media insertfile |  fontsizeselect | forecolor backcolor | fullscreen"
        		});

            function them() {
          		var id=document.getElementById("danhmuc").value;
          		var row=document.getElementById("danhmuc");
          		var text=row.options[row.selectedIndex].text;
          		var danhsach=document.getElementById('danhsach');
          		var inner=danhsach.innerHTML+'<input type="checkbox" name="danhsach[]" value="'+id+'" checked=""> '+text+' ';
          		danhsach.innerHTML=inner;
          	}

        </script>
