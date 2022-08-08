<?php
    session_start();
    $soluong=0;
    if (isset($_REQUEST['sp']) && ($_REQUEST['sp']>0)) {
        $sp = $_REQUEST['sp'];
        if(isset($_SESSION['giohang']) && ($_SESSION['giohang']!=''))
            $_SESSION['giohang'].=','.$sp;
        else
            $_SESSION['giohang']=$sp;
        $giohang = explode(',',$_SESSION['giohang']);
        // $temp = array_count_values($giohang);
        $soluong = count($giohang);
    }
    echo $soluong;
?>
