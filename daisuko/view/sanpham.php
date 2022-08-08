<script type="text/javascript" src="js/sanpham.js"></script>
<script type="text/javascript" src="libs/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
<style type="text/css">
    li>ul {
        list-style-type: none;
        margin-left: 20px;
    }

    .LID {
        display: flex;
        width: 350px;
        flex-direction: row;
        position: relative;
        height: auto;
        line-height: 30px;
        flex-wrap: wrap;
        /* align-items: center; */
    }

    .x {
        cursor: pointer;
        font-weight: bold;
        user-select: none;
        padding: 0 5px;
        transition: 0.3s;
        margin-left: -17px;
        height: 14px;
        margin-top: 8px;
    }

    .LC {
        width: 80%;
    }

    .LCA {
        background-color: rgba(6, 24, 179, 0.322);
    }

    .LC:hover {
        background-color: rgba(216, 209, 209, 0.568);
    }


    .caret-down {
        transform: rotate(90deg);
    }

    .nested {
        display: none;
    }

    .active {
        display: block;
    }
</style>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Quản lý sản phẩm</strong>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeModal" onclick="add()"><i class="fa fa-plus"></i>&nbsp; Add</button>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã SP</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Giá niêm yết</th>
                                    <th>Giá bán</th>
                                    <th>Người nhập</th>
                                    <th></th>
                                </tr>
                            </thead>

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
                <h5 class="modal-title" id="largeModalLabel">Thông tin sản phẩm</h5>
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
                                <div class="col col-md-3"><label for="name" class=" form-control-label">Tên SP</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" placeholder="Tên sản phẩm" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="gianiemyet" class=" form-control-label">Giá $</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="gianiemyet" name="gianiemyet" placeholder="Giá niêm yết" class="form-control" onkeyup="javascript:this.value=Comma(this.value);">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="vitri" class=" form-control-label">Vị trí home</label></div>
                                <div class="col col-md-3">
                                    <input type="text" id="vitri" name="vitri" placeholder="Vị trí xuất hiện trên trang chủ" class="form-control">
                                </div>
                                <div class="col col-md-3"><label for="url" class=" form-control-label">Nổi bật</label></div>
                                <div class="col col-md-3">
                                    <input type="checkbox" id="banchay" name="banchay"  value="1">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="danhmuc" class=" form-control-label">Danh mục</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="danhmuc" id="danhmuc" class="form-control" required>
                                        <option value="">Chọn danh mục</option>
                                        <?php
                                        foreach ($this->danhmuc as $row) {
                                            echo '<option id="otp' . $row['id'] . '" value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><img id="image0" height="60"/></div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="img0" name="img0" onchange="uploadFile(0)" >
                                    <input type="hidden" id="hinhanh0" name="hinhanh0">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><img id="image2" height="60" /></div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="img2" name="img2" onchange="uploadFile(2)">
                                    <input type="hidden" id="hinhanh2" name="hinhanh2">
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="row form-group" style="display: none;">
                                <div class="col col-md-3"><label for="name" class=" form-control-label">Tên SP EN</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name_en" name="name_en" placeholder="Tên sản phẩm EN" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="masp" class=" form-control-label">Mã SP</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="masp" name="masp" placeholder="Mã sản phẩm" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="giaban" class=" form-control-label">Giá bán</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="giaban" name="giaban" placeholder="Giá bán" class="form-control" onkeyup="javascript:this.value=Comma(this.value);">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="url" class=" form-control-label">URL</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="url" name="url" placeholder="Để trống sẽ cập nhật url theo tên SP" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="nhasx" class=" form-control-label">Nhà sản xuất</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="nhasx" id="nhasx" class="form-control" >
                                        <option value="">Chọn nhà sản xuất</option>
                                        <?php
                                        foreach ($this->nhasx as $row) {
                                            echo '<option id="otp' . $row['id'] . '" value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><img id="image1" height="60"/></div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="img1" name="img1" onchange="uploadFile(1)">
                                    <input type="hidden" id="hinhanh1" name="hinhanh1">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><img id="image3" height="60"/></div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="img3" name="img3" onchange="uploadFile(3)" >
                                    <input type="hidden" id="hinhanh3" name="hinhanh3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-12 col-md-12">
                        <h5>Mô tả</h5>
                        <textarea name="mota" id="mota"></textarea>
                    </div>
                </div>
                <div class="modal-footer" style="display: none;">
                    <div class="col-12 col-md-12">
                        <h5>Mô tả EN</h5>
                        <textarea name="motaen" id="motaen"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-12 col-md-12">
                        <h5>Nội dung</h5>
                        <textarea name="thanhphan" id="thanhphan"></textarea>
                    </div>
                </div>
                <div class="modal-footer" style="display: none;">
                    <div class="col-12 col-md-12">
                        <h5>Nội dung EN</h5>
                        <textarea name="noidungen" id="noidungen"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i>&nbsp;Cancel</button>
                    <button type="submit" class="btn btn-primary" onclick="saveadd()"><i class="fa fa-save"></i>&nbsp; Update</button>
                </div>
            </form>
        </div>
    </div>
</div>







<script>
    tinymce.init({
        mode: "textareas",
        entity_encoding: "raw",
        plugins: ["advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen textcolor", "media",
            "insertdatetime media table contextmenu paste jbimages", "fullscreen", "moxiemanager"
        ],
        image_advtab: true,
        paste_data_images: true,
        browser_spellcheck: true,
        relative_urls: false,
        remove_script_host: false,
        //convert_urls : true,
        image_dimensions: false,
        forced_root_block: false,
        force_br_newlines: true,
        force_p_newlines: false,
        toolbar: " undo redo | styleselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media insertfile |  fontsizeselect | forecolor backcolor | fullscreen"
    });

    // Prevent bootstrap dialog from blocking focusin
    $(document).on('focusin', function(e) {
        if ($(e.target).closest(".mce-window").length) {
            e.stopImmediatePropagation();
        }
    });

    //    $(document).ready(function(){
    //   var multipleCancelButton = new Choices('#danhmuc', {
    //   removeItemButton: true,
    //   maxItemCount:1,
    //   searchResultLimit:100,
    //   renderChoiceLimit:500,
    //   placeholder: true,
    //    placeholderValue: 'Chọn danh mục',
    //   noChoicesText: 'Không có danh mục nào'
    //   });
    // });

    //    $(document).ready(function(){
    //   var multipleCancelButton = new Choices('#nsx', {
    //   removeItemButton: true,
    //   maxItemCount:1,
    //   searchResultLimit:100,
    //   renderChoiceLimit:500,
    //   placeholder: true,
    //    placeholderValue: 'Chọn nhà sản xuất',
    //   noChoicesText: 'Không có nhà sản xuất nào'
    //   });
    // });

    function them() {
        var id = document.getElementById("danhmuc").value;
        var row = document.getElementById("danhmuc");
        var text = row.options[row.selectedIndex].text;
        var danhsach = document.getElementById('danhsach');
        var inner = danhsach.innerHTML + '<input type="checkbox" name="danhsach[]" value="' + id + '" checked=""> ' + text + ' ';
        danhsach.innerHTML = inner;
    }

    function saveadd() {
        $('#form-client').validate({
            submitHandler: function(form) {
                var formData = new FormData(form);
                $.ajax({
                    url: BASE_URL + '/sanpham/save',
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
                            alert("Cập nhật thành công !");
                            window.location.reload();
                            // window.location.href = BASE_URL + "/khachhang";
                        } else {
                            alert("Cập nhật không thành công !");
                        }
                    }
                });
                return false;
            }
        });
        $('#fm').submit();
    }
</script>
