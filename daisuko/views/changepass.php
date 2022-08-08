
<div class="site-section bg-light" data-aos="fade-up">
      <div class="container">
        <center><h1 style="margin-bottom: 20px;">Đổi mật khẩu: <?php echo $_SESSION['name'];?></h1></center>
        <div class="row align-items-first">
          <div class="col-md-7">
             <?php
              if (isset($_POST['capnhap'])) {
                  echo '<div class="p-3 p-lg-5 border bg-white">';
                  $pass= $_POST['pass'];
                  $new_pass= $_POST['new_pass'];
                  $re_pass=$_POST['re_pass'];
                  if ($new_pass==$re_pass) {
                      $check=$data->checkpass($_SESSION['id'],$pass);
                      if (count($check)!=0) {
                        if($data->re_pass($_SESSION['id'],$new_pass)) {
                            echo "<script>alert('Cập nhập mật khẩu thành công');</script>";
                            session_unset();
                            session_destroy();
                            echo "<script>window.location.assign('".HOME."/dangnhap');</script>";
                        }
                        else
                            echo 'Rất tiếc đã có lỗi khi cập nhập tài khoản, vui lòng liên hệ với bộ phận hỗ trợ!';
                    }else{
                          echo 'Mật khẩu cũ không chính xác, vui lòng kiểm tra lại!<br><br>';
                          echo '<a href="changepass" class="btn btn-primary btn-lg btn-block">Quay lại</a>';
                    }
                  } else {
                        echo "Mật khẩu nhập lại không chính xác<br><br>";
                        echo '<a href="changepass" class="btn btn-primary btn-lg btn-block">Quay lại</a>';
                  }
                  echo '</div>';
              } else {
            ?>
            <form method="post" class="bg-white">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Nhập mật khẩu cũ <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Mật khẩu cũ" required="">
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Nhập mật khẩu mới <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="Mật khẩu mới" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Nhập lại mật khẩu <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="re_pass" name="re_pass" placeholder="Nhập lại mật khẩu" required=""> 
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" name="capnhap" class="btn btn-primary btn-lg btn-block" value="Cập nhập">
                  </div>
                </div>
                <center><span>Về <a href="<?php echo HOME; ?>">Trang chủ</a></span></center>
              </div>
            </form>
             <?php } ?>
          </div>

          <div class="col-md-5">
            <div class="p-4 border mb-3 bg-white">
              <p class="mb-0">Hỗ trợ</p>
              <p class="mb-4"><?php echo $thongtin['dia_chi']; ?></p>
              <p class="mb-0">Số điện thoại</p>
              <p class="mb-4"><a href="tel:<?php echo $thongtin['dien_thoai']; ?>"><?php echo $thongtin['dien_thoai']; ?></a></p>
              <p class="mb-0">Email</p>
              <p class="mb-4"><a href="mailto:<?php echo $thongtin['email']; ?>"><?php echo $thongtin['email']; ?></a></p>
            </div>
          </div>
        </div>
      </div>
</div>
