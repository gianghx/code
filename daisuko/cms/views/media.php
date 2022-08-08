<script type="text/javascript" src="js/media.js"></script>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Quản lý media</strong>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeModal" onclick="add()"><i class="fa fa-plus"></i>&nbsp; Add</button>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Loại</th>
                                    <th>URL</th>
                                    <th>Hình ảnh</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($this->data as $row) {
                                    if ($row['phan_loai'] == 1)
                                        $loai = 'Hình ảnh';
                                    elseif ($row['phan_loai'] == 2)
                                        $loai = 'Video';
                                    elseif ($row['phan_loai'] == 3)
                                        $loai = 'Audio';
                                    else
                                        $loai = 'Khác';
                                    echo '<tr>
                                                <td>' . $i . '</td>
                                                <td>' . $row['name'] . '</td>
                                                <td>' . $loai . '</td>
                                                <td>' . $row['hinh_anh'] . '</td>
                                                <td><img src="' . $row['hinh_anh'] . '" height="60px" /></td>
                                                <td><a onclick="xoa(' . $row['id'] . ')"><i class="fa fa-trash-o"></i></a>  </td>
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
                <h5 class="modal-title" id="largeModalLabel">Thêm mới media</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-client" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row form-group">
                                <input type="hidden" id="id" name="id">
                                <div class="col col-md-3"><label for="name" class=" form-control-label">Tên</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" placeholder="Tên" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="dienthoai" class=" form-control-label">Phân loại</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="loai" id="loai" class="form-control">
                                        <option value="1">Hình ảnh</option>
                                        <option value="2">Video</option>
                                        <option value="3">Audio</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="diachi" class=" form-control-label">URL</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" id="url" name="url" placeholder="Link nhúng video/audio">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="nhanvien" class=" form-control-label">Folder</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="folder" id="folder" class="form-control">
                                        <?php
                                        $folders = glob(ROOT_DIR . '/uploads/*', GLOB_ONLYDIR);
                                        foreach ($folders as $folder) {
                                            $folder = substr($folder, strrpos($folder, '/') + 1);
                                            echo '<option value="' . $folder . '">' . $folder . '</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="row form-group">
                                <input type="hidden" id="id" name="id">
                                <div class="col col-md-3"><label for="name" class=" form-control-label">Chọn tệp</label></div>
                                <div class="col-12 col-md-9">
                                    <i class="fa fa-paperclip"></i> Tải ảnh (max:2M)
                                    <input type="file" name="file" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i>&nbsp;Cancel</button>
                    <button type="submit" onclick="saveadd()" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function saveadd() {
        $('#form-client').validate({
            rules: {
                name: {
                required: true
            }
            },

            messages: {
                name: {
                    required: "Bạn chưa nhập tên hình ảnh"
                }

            },
            submitHandler: function(form) {
                var formData = new FormData(form);
                $.ajax({
                    url: BASE_URL + '/media/save',
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    success: function(result) {
                        var result = eval("(" + result + ")");
                        if (result.success == '1') {
                            alert("Thêm mới thành công !");
                            window.location.reload();
                            // window.location.href = BASE_URL + "/khachhang";
                        } else {
                            alert("Thêm mới không thành công !");
                            // Swal.fire({
                            //     position: "bottom-center",
                            //     type: "error",
                            //     title: result.msg,
                            //     showConfirmButton: false,
                            //     height: 50,
                            //     timer: 3000
                            // });
                        }
                    }
                });
                return false;
            }
        });
        $('#fm').submit();
    }
</script>