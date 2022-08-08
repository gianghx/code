<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1>Chỉnh sửa Phụ kiện</h1>
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
               
               <div class="card-body">
                  <form method="POST" action="phukien/editsave?id=<?=$this->data['id']?>">
                    <div class="modal-body">
               <div class="form-group">
                         <div class="col-6">
                            <label for="exampleInputEmail1">Tên Phụ kiện <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Tên Phụ kiện" name="name" value="<?=$this->data['name']?>" class="form-control" required>
                        </div>
                       <div class="col-6">
                              <label for="sotien">Đơn giá <span style="color: red;">*</span> </label>
                              <input type="text" placeholder="Đơn giá" name="dongia" value="<?=number_format($this->data['gia'])?>" class="form-control"
                               onkeyup="this.value=comma(this.value)" required>
                        </div>
                    </div>
                 <div class="form-group">
                         <div class="col-6">
                            <label for="exampleInputEmail1">Tên Phụ kiện EN <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Tên Phụ kiện EN" name="name_en" value="<?=$this->data['name_en']?>" class="form-control" required>
                        </div>
                       <div class="col-6">
                              <label for="sotien">Đơn giá EN<span style="color: red;">*</span> </label>
                              <input type="text" placeholder="Đơn giá EN" name="dongia_en" value="<?=number_format($this->data['gia_en'])?>" class="form-control"
                               onkeyup="this.value=comma(this.value)" required>
                        </div>
                    </div>
                  <div class="form-group">
                         <div class="col-12">
                            <label for="exampleInputEmail1">Mã phụ kiện <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Mã Phụ kiện" name="ma" value="<?=$this->data['ma']?>" class="form-control" required>
                        </div>
                    </div>
                 <div class="form-group">
                        <div class="col-12">
                            <label for="exampleInputEmail1">Chọn sản phẩm <span style="color: red;">*</span></label>
                            <select class="form-control" id="choices-multiple-remove-button" name="sanpham"  multiple="multiple"  required >
                               <?php
                                    $sanpham=explode(",",$this->data['san_pham']);
                                    foreach ($this->sanpham as $value){
                                        if (in_array($value['id'], $sanpham)) {
                                          echo '<option value="'.$value['id'].'" selected>'.$value['name'].'</option>';
                                        }else{
                                          echo '<option value="'.$value['id'].'" >'.$value['name'].'</option>';
                                        }
                                    }
                               ?>
                            </select>
                        </div>
                        <input type="hidden" name="iddv" id="iddv">
                    </div>
            </div>
            <div class="modal-footer" style="border-top: 0px;">
               <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.history.back();">Trở về</button>
               <button type="submit" class="btn btn-primary" onclick="ok()"><i class="fa fa-file-text-o"></i> Lưu</button>
            </div>
         </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- .animated -->

<!-- .content -->
</div>
<script>
$(document).ready(function(){
   var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
   removeItemButton: true,
   maxItemCount:10,
   searchResultLimit:10,
   renderChoiceLimit:10,
    placeholderValue: 'Chọn dịch vụ',
   noChoicesText: 'Không có dịch vụ nào'
   });
 });
function ok(){
  var values = $('#choices-multiple-remove-button').val();
  $("#iddv").val(values);
}
</script>