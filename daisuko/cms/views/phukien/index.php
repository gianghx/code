<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1>Phụ kiện dịch vụ</h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li><a href="<?php echo CMS; ?>">Trang chủ</a></li>
               <li class="active">Phụ kiện dịch vụ</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
<div class="content mt-3">
   <div class="animated fadeIn">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus-circle"></i>&nbsp;Thêm mới</button>
               </div>
               <div class="card-body">
                  <table id="example" class="table table-striped table-bordered">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Mã</th>
                           <th>Tên</th>
                           <th>Sản phẩm</th>
                           <th style="display: none;"></th>
                           <th width="200">Chức năng</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $phukien=$this->data;
                           if (sizeof($phukien)>0) {
                               $i=1;
                               foreach ($phukien as $item) {
                                   echo '<tr>
                                       <td>'.$item['id'].'</td>
                                       <td>'.$item['ma'].'</td>
                                        <td>'.$item['name'].'</td>
                                       <td style="color:#28a745;">'.$item['sanpham'].'</td>';
                                   echo '<td align="center">';
                                   echo ' <button type="button" data-toggle="modal" data-target=".bd-example-modal-lg1" onclick="sua('.$item['id'].')" ><i class="fa fa-edit"></i></button> ';
                                   echo ' <button onclick="xoa('.$item['id'].')"><i class="fa fa-trash-o"></i></button></td></tr>';
                                   $i++;
                               }
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

<!-- .content -->
</div><!-- /#right-panel -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <form method="POST" action="phukien/addsave">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Thêm mới</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                         <div class="col-6">
                            <label for="exampleInputEmail1">Tên Phụ kiện <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Tên Phụ kiện" name="name" class="form-control" required>
                        </div>
                       <div class="col-6">
                              <label for="sotien">Đơn giá <span style="color: red;">*</span> </label>
                              <input type="text" placeholder="Đơn giá" name="dongia" class="form-control"
                               onkeyup="this.value=comma(this.value)" required>
                        </div>
                    </div>
                 <div class="form-group">
                         <div class="col-6">
                            <label for="exampleInputEmail1">Tên Phụ kiện EN <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Tên Phụ kiện EN" name="name_en" class="form-control" required>
                        </div>
                       <div class="col-6">
                              <label for="sotien">Đơn giá EN<span style="color: red;">*</span> </label>
                              <input type="text" placeholder="Đơn giá EN" name="dongia_en" class="form-control"
                               onkeyup="this.value=comma(this.value)" required>
                        </div>
                    </div>
                  <div class="form-group">
                         <div class="col-12">
                            <label for="exampleInputEmail1">Mã phụ kiện <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Mã Phụ kiện" name="ma" class="form-control" required>
                        </div>
                    </div>
                 <div class="form-group">
                        <div class="col-12">
                            <label for="exampleInputEmail1">Chọn sản phẩm <span style="color: red;">*</span></label>
                            <select class="form-control" id="choices-multiple-remove-button" name="sanpham"  multiple="multiple"  required >
                               <?php
                                    foreach ($this->sanpham as $value)
                                        echo '<option value="'.$value['id'].'" >'.$value['name'].'</option>';
                               ?>
                            </select>
                        </div>
                        <input type="hidden" name="iddv" id="iddv">
                    </div>
            </div>
            <div class="modal-footer" style="border-top: 0px;">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
               <button type="submit" class="btn btn-primary" onclick="ok()"><i class="fa fa-file-text-o"></i> Lưu</button>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
$(document).ready(function(){
   var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
   removeItemButton: true,
   maxItemCount:100,
   searchResultLimit:100,
   renderChoiceLimit:100,
   placeholder: true,
    placeholderValue: 'Chọn dịch vụ',
   noChoicesText: 'Không có dịch vụ nào'
   });
 });

function ok(){
  var values = $('#choices-multiple-remove-button').val();
  $("#iddv").val(values);
}

   function xoa(id) {
     if (confirm("Bạn có chắc chắn muốn xóa?"))
         window.location.href = 'phukien/xoa?id='+id;
   }
   function sua(id){
     window.location.href = 'phukien/edit?id='+id;
   }
 
</script>
<script type="text/javascript">
   $(document).ready(function() {
      var table = $('#example').DataTable( {
          fixedHeader: true,
          "language": {
      "sProcessing":   "Đang xử lý...",
      "sLengthMenu":   "Xem _MENU_ mục",
      "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
      "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
      "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
      "sInfoFiltered": "(được lọc từ _MAX_ mục)",
      "sInfoPostFix":  "",
      "sSearch":       "Tìm:",
      "sUrl":          "",
      "oPaginate": {
          "sFirst":    "Đầu",
          "sPrevious": "Trước",
          "sNext":     "Tiếp",
          "sLast":     "Cuối"
          }
      },
      "processing": true, // tiền xử lý trước
      "aLengthMenu": [[10, 20, 50, 100], [10, 20, 50, 100]], 
  } );
   } );
</script>
