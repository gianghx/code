<?php
class donhang extends controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        require('layouts/header.php');
        $this->view->data = $this->model->getdata();
        $this->view->render('donhang/index');
        unset($_SESSION['cartedit']);
        require('layouts/footer.php');
    }

    function add()
    {
        require('layouts/header.php');
        $this->view->sanpham = $this->model->sanpham();
        $this->view->khachhang = $this->model->khachhang1();
        $this->view->render('donhang/add');
        require('layouts/footer.php');
    }

    function edit()
    {
        require('layouts/header.php');
        $id = $_REQUEST['id'];
        $this->view->cartdetail = $this->model->cartdetail($id);
        $this->view->data = $this->model->cartinfo($id);
        $this->view->sanpham = $this->model->sanpham();
        $this->view->khachhang = $this->model->khachhang1();
        $this->view->render('donhang/edit');

        require('layouts/footer.php');
    }

    function getrow()
    {
        $id = $_REQUEST['id'];
        $data = $this->model->getrow($id);
        if (count($data) > 0) {
            echo json_encode($data);
        } else {
            echo 0;
        }
    }

    function getkhachhang()
    {
        $id = $_REQUEST['id'];
        $data = $this->model->getkhachhang($id);
        if (count($data) > 0) {
            echo json_encode($data);
        } else {
            echo 0;
        }
    }

    function addphieu()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $sanpham = $this->model->getsanpham($id);
            if (!isset($_SESSION['cart'])) {
                $cart = array();
                $cart[$id] = array(
                    'id' => $sanpham['id'],
                    'name' => $sanpham['name'],
                    'num' => 1,
                    'price' => $sanpham['gia_ban'],
                    'pricest' => $sanpham['gia_niem_yet'],
                    'hinhanh' => $sanpham['hinh_anh']
                );
            } else {
                $cart = $_SESSION['cart'];
                if (array_key_exists($id, $cart)) {
                    $cart[$id] = array(
                        'id' => $sanpham['id'],
                        'name' => $sanpham['name'],
                        'num' => (int)$cart[$id]['num'] + 1,
                        'price' => $cart[$id]['price'],
                        'pricest' => $cart[$id]['pricest'],
                        'hinhanh' => $sanpham['hinh_anh']
                    );
                } else {
                    $cart[$id] = array(
                        'id' => $sanpham['id'],
                        'name' => $sanpham['name'],
                        'num' => 1,
                        'price' => $sanpham['gia_ban'],
                        'pricest' => $sanpham['gia_niem_yet'],
                        'hinhanh' => $sanpham['hinh_anh']
                    );
                }
            }
            $_SESSION['cart'] = $cart;
        }
    }
    function addphieuedit()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $sanpham = $this->model->getsanpham($id);
            if (!isset($_SESSION['cartedit'])) {
                $cart = array();
                $cart[$id] = array(
                    'id' => $sanpham['id'],
                    'name' => $sanpham['name'],
                    'num' => 1,
                    'price' => $sanpham['gia_ban'],
                    'pricest' => 0,
                    'hinhanh' => $sanpham['hinh_anh']
                );
            } else {
                $cart = $_SESSION['cartedit'];
                if (array_key_exists($id, $cart)) {
                    $cart[$id] = array(
                        'id' => $sanpham['id'],
                        'name' => $sanpham['name'],
                        'num' => (int)$cart[$id]['num'] + 1,
                        'price' => $cart[$id]['price'],
                        'pricest' => $cart[$id]['pricest'],
                        'hinhanh' => $sanpham['hinh_anh']
                    );
                } else {
                    $cart[$id] = array(
                        'id' => $sanpham['id'],
                        'name' => $sanpham['name'],
                        'num' => 1,
                        'price' => $sanpham['gia_ban'],
                        'pricest' => 0,
                        'hinhanh' => $sanpham['hinh_anh']
                    );
                }
            }
            $_SESSION['cartedit'] = $cart;
        }
    }


    function deletephieu()
    {
        if (isset($_POST['id']) && isset($_POST['num'])) {
            $id = $_POST['id'];
            $num = $_POST['num'];
            $cart = $_SESSION['cart'];
            if (array_key_exists($id, $cart)) {
                if ($num > 0) {
                    $cart[$id] = array(
                        'id' => $cart[$id]['id'],
                        'name' => $cart[$id]['name'],
                        'num' => $num,
                        'price' => $cart[$id]['price'],
                        'pricest' => $cart[$id]['pricest'],
                        'hinhanh' => $cart[$id]['hinhanh']
                    );
                } else {
                    unset($cart[$id]);
                }

                $_SESSION['cart'] = $cart;
            }
        }
    }

    function deletephieuedit()
    {
        if (isset($_POST['id']) && isset($_POST['num'])) {
            $id = $_POST['id'];
            $num = $_POST['num'];
            $cart = $_SESSION['cartedit'];
            if (array_key_exists($id, $cart)) {
                if ($num > 0) {
                    $cart[$id] = array(
                        'id' => $cart[$id]['id'],
                        'name' => $cart[$id]['name'],
                        'num' => $num,
                        'price' => $cart[$id]['price'],
                        'hinhanh' => $cart[$id]['hinhanh']
                    );
                } else {
                    unset($cart[$id]);
                }
                $_SESSION['cartedit'] = $cart;
            }
        }
    }

    function updategia()
    {
        if (isset($_POST['id']) && isset($_POST['price']) && isset($_POST['pricest'])) {
            $id = $_POST['id'];
            $price = $_POST['price'];
            $pricest = $_POST['pricest'];
            $cart = $_SESSION['cart'];
            if (array_key_exists($id, $cart)) {
                $cart[$id] = array(
                    'id' => $cart[$id]['id'],
                    'name' => $cart[$id]['name'],
                    'num' => $cart[$id]['num'],
                    'price' => $price,
                    'pricest' => $pricest,
                    'hinhanh' => $cart[$id]['hinhanh']
                );
                $_SESSION['cart'] = $cart;
            }
        }
    }
    function updategiaedit()
    {
        if (isset($_POST['id']) && isset($_POST['price']) && isset($_POST['pricest'])) {
            $id = $_POST['id'];
            $price = $_POST['price'];
            $pricest = $_POST['pricest'];
            $cart = $_SESSION['cartedit'];
            if (array_key_exists($id, $cart)) {
                $cart[$id] = array(
                    'id' => $cart[$id]['id'],
                    'name' => $cart[$id]['name'],
                    'num' => $cart[$id]['num'],
                    'price' => $price,
                    'pricest' => $pricest,
                    'hinhanh' => $cart[$id]['hinhanh']
                );
                $_SESSION['cartedit'] = $cart;
            }
        }
    }

    function getchitietdon()
    {
        $id = $_REQUEST['id'];
        $keyword = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';
        $offset = $_REQUEST['start'];
        $rows = $_REQUEST['length'];
        $result = $this->model->getchitietdon($keyword, $offset, $rows, $id);
        $totalData = $result['total'];
        $totalFilter = $totalData;
        $data = array();
        $i = 0;
        $tong = 0;
        foreach ($result['rows'] as $key => $item) {
            $subdata = array();
            $tt = $item['so_luong'] * $item['don_gia'];
            $subdata[] = $item['sanpham'];
            $subdata[] = $item['so_luong'];
            $subdata[] = number_format($item['don_gia']);
            $subdata[] =  number_format($tt);
            $data[] = $subdata;
            $tong += $tt;
            $i++;
        }
        $json_data = array(
            "draw" => intval($_REQUEST['draw']),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFilter),
            "data" => $data
        );
        echo json_encode($json_data);
    }

    function indon()
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $this->view->data = $this->model->indon($id);
        $this->view->render('donhang/indon');
    }

    function save()
    {
        if (isset($_POST['btntt'])) {
            $ghichu = $_POST['ghichu'];
            $batdau = $_POST['batdau'];
            $ketthuc = $_POST['ketthuc'];
            $noibat = $_POST['noibat'];
            $batdau=date('Y-m-d H:i:s', strtotime($batdau));
            $ketthuc=date('Y-m-d H:i:s', strtotime($ketthuc));
            foreach ($_SESSION['cart'] as  $value) {
                $data = array(
                'date' => $batdau,
                'date_end'=>$ketthuc,
                'ghi_chu' => $ghichu,
                'noi_bat' => $noibat,
                'hang_hoa'=>$value['id'],
                'gia_san'=>$value['price'],
                'gia_st'=>$value['pricest'],
                'so_luong'=>$value['num'],
                'tinh_trang' => 1
                );
                $ok = $this->model->savedonhang($data);
            }

            require 'layouts/header.php';
            if ($ok) {
                unset($_SESSION['cart']);
                $this->view->thongbao = 'Cập nhật thành công! <a href="donhang">Nhấn vào đây để quay lại</a>';
                $this->view->render('thongbao');
            } else {
                $this->view->thongbao = 'Cập nhật không thành công! <a href="donhang">Nhấn vào đây để quay lại</a>';
                $this->view->render('canhbao');
            }
            require 'layouts/footer.php';
        } else {
            echo "<script>window.location.assign('" . CMS . "/donhang');</script>";
        }
    }

    function editsave()
    {
        $madon = $_REQUEST['madon'];
        $ghichu = $_POST['ghichu'];
            $batdau = $_POST['batdau'];
            $ketthuc = $_POST['ketthuc'];
            $batdau=date('Y-m-d H:i:s', strtotime($batdau));
            $ketthuc=date('Y-m-d H:i:s', strtotime($ketthuc));
            $loai = $_POST['loai'];
            foreach ($_SESSION['cartedit'] as  $value) {
                $data = array(
                'date' => $batdau,
                'date_end'=>$ketthuc,
                'ghi_chu' => $ghichu,
                'noi_bat' => $loai,
                'hang_hoa'=>$value['id'],
                'gia_san'=>$value['price'],
                'gia_st'=>$value['pricest'],
                'so_luong'=>$value['num'],
                'tinh_trang' => 1
                );
                $ok = $this->model->saverow($madon,$data);
            }
        require 'layouts/header.php';
        if ($ok) {
            $this->view->thongbao = '<script>setTimeout(function(){ window.location.href = BASE_URL + "/donhang"; }, 1000);</script>Cập nhật thành công! <a href="donhang">Nhấn vào đây để quay lại</a>';
            $this->view->render('thongbao');
        } else {
            $this->view->thongbao = 'Cập nhật không thành công! <a href="donhang">Nhấn vào đây để quay lại</a>';
            $this->view->render('canhbao');
        }
        require 'layouts/footer.php';
    }

    function updatedon()
    {

        $sdt = isset($_REQUEST['sdt']) ? $_REQUEST['sdt'] : 0;
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : 0;
        $tt = isset($_REQUEST['tt']) ? $_REQUEST['tt'] : 0;
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $sdt = $_REQUEST['sdt'];
        $diachi = $_REQUEST['dia_chi'];
        $ghichu = $_REQUEST['ghi_chu'];
        $data = ['name' => $name, 'email' => $email, 'sdt' => $sdt, 'dia_chi' => $diachi, 'ghi_chu' => $ghichu];
        $this->model->updatedon($sdt, $date, $tt, $data);
        echo "<script>window.location.assign('" . CMS . "/donhang');</script>";
    }

    function chitiet()
    {
        $sdt = isset($_REQUEST['sdt']) ? $_REQUEST['sdt'] : 0;
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : 0;
        $this->view->data = $this->model->sanpham($sdt, $date);
        $this->view->render('donhang/chitiet');
    }

    function xoa()
    {
        $id = $_REQUEST['id'];
        if ($this->model->delObj($id)) {
            $jsonObj['msg'] = "Xóa bản ghi thành công";
            $jsonObj['success'] = 1;
        } else {
            $jsonObj['msg'] = "Có lỗi khi xóa bản ghi";
            $jsonObj['success'] = 0;
        }
        echo json_encode($jsonObj);
    }

    function delmulti()
    {
        $gt = $_GET['giatri'];
        $data1 = explode(",", $gt);
        foreach ($data1 as $id) {
            if ($id != '') {
                $ok = $this->model->delObj($id);
            }
        }
        if ($ok) {
            $jsonObj['msg'] = "Xóa bản ghi thành công";
            $jsonObj['success'] = 1;
        } else {
            $jsonObj['msg'] = "Có lỗi khi xóa bản ghi";
            $jsonObj['success'] = 0;
        }
        echo json_encode($jsonObj);
    }
}
