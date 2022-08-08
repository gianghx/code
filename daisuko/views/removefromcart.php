<?php
    session_start();
    $soluong=0;
    if (isset($_REQUEST['sp']) && ($_REQUEST['sp']>0)) {
        $sp1 = ','.$_REQUEST['sp'];
        $sp2 = $_REQUEST['sp'].',';
        if(isset($_SESSION['giohang']) && ($_SESSION['giohang']!='')) {
            $_SESSION['giohang'] = str_replace($sp1,"",$_SESSION['giohang']);
            $_SESSION['giohang'] = str_replace($sp2,"",$_SESSION['giohang']);
            $giohang = explode(',',$_SESSION['giohang']);
            $soluong = count($giohang);
        }
    }
    echo $soluong;
?>
