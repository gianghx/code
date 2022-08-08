<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <!-- <div class="page-title">
            <h1>Đổi mật khẩu <?=$_SESSION['user']['nhanvien']?></h1>
         </div> -->
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li><a href="<?php echo CMS; ?>">Trang chủ</a></li>
               <li class="active">Đổi mật khẩu</li>
            </ol>
         </div>
      </div>
   </div>
</div>

<div class="content mt-3">
   <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-3">
        </div>
         <div class="col-md-6">
            <form action="index/changepass" method="post" class="">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Mật khẩu cũ</div>
                                                                        <input type="password" id="pass" name="oldpass" class="form-control" required>
                                                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Mật khẩu mới</div>
                                                                        <input type="password" id="newpass" name="newpass" class="form-control" required>
                                                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Nhập lại mật khẩu</div>
                                                                        <input type="password" id="repass" name="repass" class="form-control" required>
                                                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-actions form-group">
                                                                    <button type="submit" name="btnluu" class="btn btn-primary btn-sm" onclick="return submitform();">Lưu lại</button>
                                                                    <a href="<?php echo CMS; ?>" type="button" class="btn btn-danger btn-sm">Bỏ qua</a>
                                                                </div>
                                                            </form>
           
         </div>
          <div class="col-md-3">
        </div>
      </div>
   </div>
<script type="text/javascript">
    function submitform(){
        var newpass= document.getElementById('newpass').value;
        var repass= document.getElementById('repass').value;
        if (newpass==repass) {
                return true;
        }else{
            alert('Mật khẩu nhập lại không chính xác!');
            $("#repass").focus();
               return false;
        }
    }
</script>
