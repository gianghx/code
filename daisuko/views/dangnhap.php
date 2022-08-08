<div class="site-section bg-light" data-aos="fade-up">
    <div class="container">
        <center><h1 style="margin-bottom: 20px;">Đăng nhập</h1></center>
        <div class="row align-items-first" >
            <div class="col-md-7" style="margin-bottom:20px">
                <?php
                if (isset($_POST['btndangnhap'])) {
                    $sdt = str_replace("'","",$_POST['sdt']);
                    $pass = md5(md5($_POST['pass']));
                    $user = $data->checklogin($sdt, $pass);
                    if (count($user) == 0) {
                            echo '<div class="p-3 p-lg-5 border bg-white">';
                            echo "Sai số điện thoại đăng nhập hoặc mật khẩu, vui lòng đăng nhập lại!<br><br>";
                            echo "Nếu bạn quên mật khẩu hãy liên hệ với số điện thoại bên cạnh để được hỗ trợ.<br><br>";
                            echo '<a href="dangnhap" class="btn btn-primary btn-lg btn-block">Quay lại đăng nhập</a>';
                            echo '</div>';
                    } else {
                        $_SESSION['enduser'] = $user[0];
                        echo '<div class="p-3 p-lg-5 border bg-white">';
                        echo "Xin chào ".$user[0]['name']." Chúc bạn ngày mới an lành kinh doanh thuận lợi!<br><br>";
                        echo '<a href="donhang" class="btn btn-primary btn-lg btn-block">Kiểm tra đơn hàng</a>';
                        echo '</div>';
                    }
                    // } else {
                    //     echo '<div class="p-3 p-lg-5 border bg-white">';
                    //     echo "Bạn chưa có tài khoản!<br><br>";
                    //     echo "Vui lòng <a href='dangki'>nhấn vào đây</a> để đăng ký tài khoản mới.<br><br>";
                    //     echo '<a href="dangnhap" class="btn btn-primary btn-lg btn-block">Quay lại đăng nhập</a>';
                    //     echo '</div>';
                    // }
                } else {
                    ?>
                    <form method="post" class="bg-white" action="">

                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_email" class="text-black">Số điện thoại <span
                                                class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="sdt" name="sdt"
                                           placeholder="Số điện thoại của bạn" required pattern="[0-9]{10,12}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_subject" class="text-black">Mật khẩu <span
                                                class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="pass" name="pass"
                                           placeholder="Mật khẩu của bạn" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="btndangnhap"
                                           value="Đăng nhập">
                                </div>
                            </div>
                            <!-- <center><span>Bạn chưa có tài khoản? <a href="dangki">Đăng ký</a></span>
                            </center> -->
                        </div>
                    </form>
                <?php } ?>
            </div>

            <div class="col-md-5">
                <div class="p-4 border mb-3 bg-white">
                    <h4><?php echo $thongtin[0]['value']; ?></h4>
                    <p class="mb-0">Địa chỉ</p>
                    <p class="mb-4"><?php echo $thongtin[1]['value']; ?></p>
                    <p class="mb-0">Số điện thoại</p>
                    <p class="mb-4"><a
                                href="tel:<?php echo $thongtin[2]['value']; ?>"><?php echo $thongtin[2]['value']; ?></a>
                    </p>
                    <p class="mb-0">Email</p>
                    <p class="mb-4"><a
                                href="mailto:<?php echo $thongtin[3]['value'] ?>"><?php echo $thongtin[3]['value'] ?></a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
