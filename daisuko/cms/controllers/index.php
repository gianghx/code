<?php
class index extends controller
{
   function __construct()
   {
       parent::__construct();
   }

   function index()
   {
       require('layouts/header.php');
       $this->view->render('index');
       require('layouts/footer.php');
   }

   function doimatkhau()
    {
        require 'layouts/header.php';
        $this->view->render('doimatkhau');
        require 'layouts/footer.php';
    }

    function changepass()
    {
        if (isset($_POST['btnluu'])) {
            $oldpass = md5(md5($_REQUEST['oldpass']));
            $newpass = md5(md5($_REQUEST['newpass']));
            $userid  = $_SESSION['user']['id'];
            require 'layouts/header.php';
            if ($this->model->checkold($userid, $oldpass))
                if ($this->model->changepass($userid, $newpass)){
                    $this->view->thongbao = 'Đổi mật khẩu thành công, ghi nhớ mật khẩu mới cho lần đăng nhập sau!<a href="index">Nhấn vào đây để quay lại</a>';
                    $this->view->render('thongbao');
                }
                else{
                    $this->view->thongbao = 'Đổi mật khẩu không thành công, vui lòng thử lại!<a href="index/doimatkhau">Nhấn vào đây để quay lại</a>';
                    $this->view->render('thongbao');
                }
            else{
                $this->view->thongbao = 'Mật khẩu cũ không đúng, vui lòng thử lại!<a href="index/doimatkhau">Nhấn vào đây để quay lại</a>';
                    $this->view->render('thongbao');
            }
            require 'layouts/footer.php';
        }else{
            require 'layouts/header.php';
            $this->view->render('index/doimatkhau');
            require 'layouts/footer.php';
        }
    }

   function logout()
   {
       $this->model->logout();
       session_destroy();
       header('Location: ' . URL);
   }

// DASHBOARD
   function congviec(){
        $jsonObj = $this->model->congviec();
     		$this->view->jsonObj = json_encode($jsonObj);
        $this->view->render('common/json');
 	 }

   function dichvu(){
        $jsonObj = $this->model->dichvu();
     		$this->view->jsonObj = json_encode($jsonObj);
        $this->view->render('common/json');
 	 }


// Notification
  function events(){
       $jsonObj = $this->model->events();
    	 $this->view->jsonObj = json_encode($jsonObj);
       $this->view->render('common/json');
	 }

   function eventstop(){
        $id = $_REQUEST['id'];
        $this->model->eventstop($id);
 	 }


}
?>
