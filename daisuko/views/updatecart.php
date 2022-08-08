<?php 
    if (isset($_POST['id']) && isset($_POST['num'])) {
        $id= $_POST['id'];
        $num=$_POST['num'];
        $cart= $_SESSION['cart'];
        if (array_key_exists($id, $cart)) {
            if ($num>0) {
                $cart[$id]=array(
                'id' => $cart[$id]['id'],
                'phien'=>$cart[$id]['phien'],
                'name'=>$cart[$id]['name'],
                'num'=>(int)$num,
                'gia'=>$cart[$id]['don_gia'],
                'giast'=>$cart[$id]['don_giast'],
                'hinhanh'=>$cart[$id]['hinhanh'],
                'url' =>$cart[$id]['url'],
                'giadat' =>$cart[$id]['giadat']
                );
            }else{
                unset($cart[$id]);
            }
            
            $_SESSION['cart']=$cart;
        }
        
    }
   ?>