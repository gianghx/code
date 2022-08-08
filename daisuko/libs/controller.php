<?php
$thisurl  = isset($_GET['url']) ? $_GET['url'] : null;
$url  = rtrim($thisurl, '/');
$url  = explode('/', $thisurl);
$data = new model();
if ($url[0]!='') {
    if ($url[0]=='blog')
        if (sizeof($url)==1)
            $view = 'blog';
        elseif(sizeof($url)==3)
            $view = 'danhmuc';
        else
            $view= 'baiviet';
    elseif ($url[0]=='product')
        if (sizeof($url)==3)
            $view = 'danhmucsp';
        elseif (sizeof($url)==2)
            $view = 'sanpham';
        else
            $view = 'cateproduct';
    elseif ($url[0] == 'gethuyen')
        $view = 'gethuyen';
    else
         $view = $url[0];
}
else
    $view = 'index';
$page = $data->pageinfo($url);
$data->ketqua();
// $data->guiketqua();
if (isset($_SESSION['en']) && $_SESSION['en']>0) {
    $thongtin = $data->thongtin_en();
}else{
    $thongtin = $data->thongtin();
}
$menu =$data->topmenu();

if (file_exists('views/'.$view.'.php'))
    if ($view=='checkout' || $view=='gethuyen' || $view=='done') {
       require 'views/'.$view.'.php';
    }else{
        require('layout/header.php');
    require 'views/'.$view.'.php';
    require('layout/footer.php');
    }
else{
    require('layout/header.php');
    echo '<div class="container">';
    echo "<center><h1>Nội dung đang được cập nhập</h1></center>";
    echo '<a href="'.HOME.'" class="btn btn-primary btn-lg btn-block">Về trang chủ</a>';
    echo '</div>';
    require('layout/footer.php');
}

?>
