<script type="text/javascript" src="js/danhmucsp.js"></script>
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
                                <strong class="card-title">Phân loại sản phẩm</strong>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeModal" onclick="add()"><i class="fa fa-plus"></i>&nbsp; Add</button>
                            </div>
                            <div class="card-body">
                              <table id="example" class="table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                            <th>ID</th>
                                            <th>Tên danh mục</th>
                                            <th>Tên EN</th>
                                            <th>Hình ảnh</th>
                                            <th>Mô tả</th>
                                            <th>Mô tả EN</th>
                                            <th>cha</th>
                                            <th style="display: none;"></th>
                                            <th style="display: none;"></th>
                                            <th style="display: none;"></th>
                                            <th style="display: none;"></th>
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
                                                <td>'.$row['name_en'].'</td>
                                                <td>'.$row['hinhanh'].'</td>
                                                <td>'.$row['mo_ta'].'</td>
                                                <td>'.$row['mo_ta_en'].'</td>
                                                <td>'.$row['cha1'].'</td>
                                                <td style="display: none;">'.$row['url'].'</td>
                                                <td style="display: none;">'.$row['hinh_anh'].'</td>
                                                <td style="display: none;">'.$row['cha'].'</td>
                                                <td style="display: none;">'.$row['thu_tu'].'</td>
                                                <td><a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal" onclick="edit('.$i.')"><i class="fa fa-edit"></i></a></td>
                                                <td><a href="danhmucsp/del?id='.$row['id'].'"><i class="fa fa-trash-o"></i></a>  </td>
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
                        <h5 class="modal-title" id="largeModalLabel">Thông tin danh mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form-client" method="post" enctype="multipart/form-data" action="danhmucsp/save">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <input type="hidden" id="id" name="id">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Danh mục</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name" name="name" placeholder="Tên danh mục" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Danh mục EN</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name_en" name="name_en" placeholder="Tên danh mục EN" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="hinhanh" class=" form-control-label">Hình ảnh</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hinhanh" name="hinhanh" placeholder="Link ảnh" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="email" class=" form-control-label">Danh mục cha</label></div>
                                    <div class="col-12 col-md-9">
                                        <select class="form-control" id="danhmuccha" name="danhmuccha">
                                            <option value="0">ROOT</option>
                                            <?php foreach ($this->data as $value) {
                                                echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="mota" class=" form-control-label">Mô tả</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="mota" name="mota" placeholder="Mô tả" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="mota" class=" form-control-label">Mô tả EN</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="mota_en" name="mota_en" placeholder="Mô tả EN" class="form-control">
                                    </div>
                                </div>
                                <!-- <div class="row form-group">
                                    <div class="col col-md-3"><label for="sex" class=" form-control-label">Sex</label></div>
                                    <div class="col-12 col-md-9">
                                          <select name="sex" id="sex" class="form-control">
                                              <option value="0">Female</option>
                                              <option value="1">Male</option>
                                          </select>
                                    </div>
                                </div> -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="url" class=" form-control-label">URL</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="url" name="url" placeholder="Để trống sẽ cập nhật theo tên danh mục" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="url" class=" form-control-label">Thứ tự</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="thutu" name="thutu" placeholder="Thứ tự" class="form-control">
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


        <script type="text/javascript">
            let data2 = <?=$this->danhmuc?>;

                    let data3 = data2.sort((a, b) => {
          return Number(a.cha) - Number(b.cha);
        });

        let data4 = { id: "0", child: [] };

        let xx = (parent) => {
          for (let i of data3) {
            let newi = { ...i, child: [] };
            if (i.id == "1") {
            }
            if (newi.cha == parent.id) {
              parent.child.push(newi);

              data3.splice(data3.indexOf(i), 0);
              if (data3.length > 0) {
                xx(newi);
              }
            }
          }
        };

        xx(data4);
        console.log(data4);

        let treeview = document.getElementById("treeview");
        let myUL = document.getElementById("myUL");

        let ff = (root, data1) => {
          // let newarr = [...data1];
          // for (let x of newarr) {
          //   let newelement = document.createElement("li");
          //   newelement.innerHTML = x.name;
          //   if (x.child !== []) {
          //     newelement.setAttribute("data-expanded", "false");
          //     let newul = document.createElement("ul");
          //     ff(newul, x.child);
          //     newelement.appendChild(newul);
          //   }
          //   root.appendChild(newelement);
          // }

          for (let x of data1) {
            let newelement = document.createElement("li");
            newelement.classList="LID";
            newelement.setAttribute("level",x.level);
            newelement.innerHTML = `<div class="LC" id="${x.id}">${x.name}</div>`;
            if (x.child.length > 0) {
              newelement.innerHTML = `<i class="fa fa-toggle-right (alias) x"></i>
              <div class="LC" id="${x.id}">${x.name}</div>`;

              let newul = document.createElement("ul");
              newul.classList = "nested";
              ff(newul, x.child);
              newelement.appendChild(newul);
            } else {
              console.log(x);
            }
            root.appendChild(newelement);
          }
        };

        ff(myUL, data4.child);

        document.querySelectorAll(".x").forEach((item) => {
          item.onclick = () => {
            if (item.parentNode.querySelector("ul").classList == "nested") {
              item.parentNode.querySelector("ul").classList = "active";
              item.parentNode.querySelector(".x").style.transform = "rotate(90deg)";
            } else {
              item.parentNode.querySelector("ul").classList = "nested";
              item.parentNode.querySelector(".x").style.transform = "rotate(0deg)";
            }
          };
        });

        document.querySelectorAll(".LC").forEach((item) => {
          item.onclick = () => {
            document.querySelector("#myUL").setAttribute("selected", item.id);
            document.getElementById("danhmuc").value = item.id;
            if (document.querySelector(".LCA")) {
              document.querySelector(".LCA").classList = "LC";
            }
            item.classList = "LC LCA";
          };
        });



        // let level=document.getElementById("207").parentNode.level;
        function note(val){
            val.parentNode.parentNode.classList="active";
            // val.classList="LC LCA";
            if (val.parentNode.parentNode.parentNode.classList=='LID') {
                note(val.parentNode.parentNode);
            }
        }
           
        
        

        </script>

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
