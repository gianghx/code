<?php
class bootstrap
{
    function __construct()
    {
        if (isset($_SESSION[SID])) {
            $this->view = new view();
            $url    = isset($_GET['url']) ? $_GET['url'] : null;
            $url    = rtrim($url, '/');
            $url    = explode('/', $url);
            $module = (empty($url[0])) ? 'index' : $url[0];
            if (file_exists('controllers/' . $module . '.php')) {
                require 'controllers/' . $module . '.php';
                $controller = new $module;
                $controller->loadModel($module); // load model tương ứng
                $method = (isset($url[1])) ? $url[1] : 'index';
                if (method_exists($controller, $method)) {
                    if (isset($url[2]))
                        $controller->{$method}($url[2]);
                    else
                        $controller->{$method}();
                } else {
                    require('layouts/header.php');
                    $this->view->thongbao = 'Không tìm thấy method!';
                    $this->view->render('common/thongbao');
                    require('layouts/header.php');
                }
            } else {
                require('layouts/header.php');
                $this->view->thongbao = 'Không tìm thấy controller!';
                $this->view->render('thongbao');
                require('layouts/footer.php');
            }
        } else {
            $this->view = new view();
            if (isset($_REQUEST['username'])) {
                $username    = md5($_REQUEST['username']);
                $password    = md5(md5($_REQUEST['password']));
                $this->db    = new database();
                $this->model = new model();
                $query       = $this->db->query("SELECT id,name
                    FROM admin WHERE tinh_trang=1 AND username = '$username' AND password = '$password'");
                if ($query)
                    $userdata = $query->fetchAll(PDO::FETCH_ASSOC);
                else
                    $userdata = array();
                if (empty($userdata)) {
                    $this->view->msg = 'Sai tên đăng nhập hoặc mật khẩu!';
                    $this->view->render('login');
                } else {
                    $_SESSION[SID]    = true;
                    $_SESSION['user'] = $userdata[0];
                    header('Location: ' . URL);
                }
            } else {
                $this->view->msg = 'Bạn đang đăng nhập trang quản trị website';
                $this->view->render('login');
            }
        }
    }
}
?>
