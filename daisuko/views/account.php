<?php
  $thongtin_tk= $data->thongtin_tk($_SESSION['id']); 
?>
<div class="site-section bg-light" data-aos="fade-up">
      <div class="container">
        <center><h1 style="margin-bottom: 20px;">Thông tin tài khoản: <?php echo $thongtin_tk[0]['name'];?></h1></center>
        <div class="row align-items-first">
          <div class="col-md-7">
             <?php
              if (isset($_POST['capnhap'])) {
                  echo '<div class="p-3 p-lg-5 border bg-white">';
                  $sdt= $_POST['sdt'];
                  if ($data->checkdienthoai1($_SESSION['id'],$sdt)==0) {
                        $name= (isset($_POST['name']) && ($_POST['name']!=''))?$_POST['name']:$sdt;
                        $email= $_POST['email'];
                        if($data->re_taikhoan($_SESSION['id'],$name,$sdt,$email)) {
                            $_SESSION['name']=$name;
                            echo "Cập nhập tài khoản thành công!<br><br>";
                            echo '<a href="'.HOME.'" class="btn btn-primary btn-lg btn-block">Về trang chủ</a>';
                        }
                        else
                            echo 'Rất tiếc đã có lỗi khi cập nhập tài khoản, vui lòng liên hệ với bộ phận hỗ trợ!';
                  } else {
                        echo "Số điện thoại này đã đăng ký trong hệ thống!<br><br>";
                        echo "Nếu bạn thực sự là chủ nhân của số điện thoại này, bạn có thể <a href='reset'>nhấn vào đây</a> để xin cấp lại mật khẩu.<br><br>";
                        echo '<a href="account" class="btn btn-primary btn-lg btn-block">Quay lại</a>';
                  }
                  echo '</div>';
              } else {
            ?>
            <form method="post" class="bg-white">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Tên </label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Không bắt buộc" value="<?php echo $thongtin_tk[0]['name'];?>">
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Số điện thoại <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="sdt" name="sdt" value="<?php echo $thongtin_tk[0]['sdt'];?>" required="">
                  </div>
                </div>
                  <div class="form-group row">
                      <div class="col-md-6">
                          <label for="c_email" class="text-black">Email </label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Không bắt buộc" value="<?php echo $thongtin_tk[0]['email'];?>">
                      </div>
                      <div class="col-md-6">
                          <label for="c_fname" class="text-black">Số dư </label>
                          <input type="text" class="form-control" id="so_du" name="so_du" disabled   value="<?php echo number_format($thongtin_tk[0]['so_du']); ?> VND">
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-md-6">
                          <label for="c_fname" class="text-black">Tip ngày </label>
                          <input type="text" class="form-control" id="tip_ngay" name="tip_ngay" disabled  value="<?php echo $thongtin_tk[0]['tip_ngay'];?>">
                      </div>
                      <div class="col-md-6">
                          <label for="c_lname" class="text-black">Tip vip </label>
                          <input type="text" class="form-control" id="tip_vip" name="tip_vip" disabled value="<?php echo $thongtin_tk[0]['tip_vip'];?>" >
                      </div>
                  </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" name="capnhap" class="btn btn-primary btn-lg btn-block" value="Cập nhập">
                  </div>
                </div>
                <center><span>Đổi <a href="<?php echo HOME; ?>/changepass">Mật khẩu</a></span></center>
              </div>
            </form>
             <?php } ?>
          </div>

          <div class="col-md-5">
            <div class="p-4 border mb-3 bg-white">
              <p class="mb-0">Trung tâm hỗ trợ khách hàng</p>
              <p class="mb-4" style="color: red;"><?php echo $thongtin['dia_chi']; ?></p>
              <p class="mb-0">Số điện thoại</p>
              <p class="mb-4"><a href="tel:<?php echo $thongtin['dien_thoai']; ?>"><?php echo $thongtin['dien_thoai']; ?></a></p>
              <p class="mb-0">Email</p>
              <p class="mb-4"><a href="mailto:<?php echo $thongtin['email']; ?>"><?php echo $thongtin['email']; ?></a></p>
            </div>
          </div>
        </div>
      </div>
</div>
