<?php
class media extends controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        require 'layouts/header.php';
        $this->view->data    = $this->model->getFetObj();
        $this->view->render('media');
        require 'layouts/footer.php';
    }


    function xoa()
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $this->model->delObj($id);
        echo "<script> window.history.back();</script>";
    }

    function save()
    {
      $name    = $_REQUEST['name'];
      $loai    = $_REQUEST['loai'];
      $url    = $_REQUEST['url'];
      $folder    = $_REQUEST['folder'];
      if (isset($_FILES['file']['name']) && ($_FILES['file']['name'] != '')) {
           $dir   = ROOT_DIR . '/uploads/'.$folder.'/';
           $fname = functions::convertname($name);
           $file  = functions::uploadfile('file', $dir, $fname);
           $hinhanh  = HOME . '/uploads/'.$folder.'/' . $file;
      } else
           $hinhanh  = '';
      $data = array(
        'name' => $name,
        'phan_loai' => $loai,
        'nguoi_nhap' =>$_SESSION['user']['id'],
        'ngay_dang' => date("Y-m-d"),
        'hinh_anh' => $hinhanh,
        'folder' => $folder,
        'url' => $url,
        'tinh_trang' => 1
      );
      if ($this->model->save($data)){
           $jsonObj['msg'] = "Cập nhật thành công";
           $jsonObj['success'] = 1;
      }
      else{
        $jsonObj['msg'] = "Cập nhật không thành công";
        $jsonObj['success'] = 0;
      }
      echo json_encode($jsonObj);
    }
}
