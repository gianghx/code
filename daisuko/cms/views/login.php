<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRM 4.0 - Thương Hiệu Web</title>
    <meta name="description" content="Phần mềm chăm sóc khách hàng - L'Hôpital Francais de Hanoi, cung cấp bởi VELO Software">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo URL; ?>/">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="template/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="template/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="template/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="template/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="template/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="bg-dark" >
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">

                <div class="login-form">
                    <div class="login-logo">
                        <a href="">
                            <img class="align-content" src="https://thuonghieuweb.com/oldversion/img/homepage/logo-thuonghieu.png" alt="">
                        </a>
                    </div>
                    <form method="post" action="">
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox"> Remember Me
                            </label>
                                    <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đăng nhập</button>
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                        <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                                    </div>
                                </div> -->
                                <div class="register-link m-t-15 text-center">
                                    <br><h5><?php echo $this->msg ?></h5>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="template/vendors/jquery/dist/jquery.min.js"></script>
    <script src="template/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="template/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="template/assets/js/main.js"></script>
</body>
</html>
