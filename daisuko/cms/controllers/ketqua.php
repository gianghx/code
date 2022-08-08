<?php

class ketqua extends controller

{

    function __construct()

    {

        parent::__construct();

    }



    function index()

    {

        require('layouts/header.php');

        $this->model->ketqua();

        $this->view->data = $this->model->getdata();

        $this->view->render('ketqua/index');

        require('layouts/footer.php');

    }



    function edit()

    {

        $id = $_REQUEST['id'];

        $data = $this->model->getchitiet($id);

        $data1 = $this->model->getchitieterr($id);

        if (count($data) == 0) {

            echo('

            <div class="modal-header">

            <h5 class="modal-title" id="largeModal">Kết quả trúng thầu phiên ' . $id . '</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>

        </div>

        <div class="modal-body">

            <h4 style="min-height: 30vh;

            display: flex;

            justify-content: center;

            align-items: center;">Kết quả đấu giá trống! </h4>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i>&nbsp;Cancel</button>

            </div>');

        } else {



        echo

            '<div class="modal-header">

            <h5 class="modal-title" id="largeModal">Kết quả trúng thầu phiên ' . $data[0]['phien'] . '</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>

        </div>

        <div class="modal-body">

            <div class="row">

                <div class="col-md-12">

                        <table id="example" class="table table-striped table-bordered" style="width:100%">

                            <thead>

                                <tr>

                                    <th>STT</th>

                                    <th>Tên</th>

                                    <th>Điện thoại</th>

                                    <th>Email</th>

                                    <th>Địa chỉ</th>

                                    <th>Dịch vụ VC</th>

                                    <th>PT thanh toán</th>

                                    <th>Sản phẩm</th>

                                    <th>Nhà sx</th>

                                    <th>Số lượng đặt</th>

                                    <th>Giá đặt</th>

                                    <th>Tổng</th>

                                </tr>

                            </thead>

                            <tbody>';

            $i = 1;

            foreach ($data as $row) {
                $tinh = $this->model->gettinh($row['tinh']);
                $huyen = $this->model->gethuyen($row['huyen']);
                echo '<tr>';

                echo '<td>' . $i . '</td>

                        <td>' . $row['name'] . '</td>

                        <td>' . $row['sdt'] . '</td>

                        <td>' . $row['email'] . '</td>

                        <td>' . $row['diachi'] .', '.$huyen.', '.$tinh. '</td>

                        <td>' . $row['vanchuyen'] . '</td>

                        <td>' . $row['thanhtoan'] . '</td>

                        <td>' . $row['san_pham'] . '</td>

                        <td>' . $row['nha_sx'] . '</td>

                        <td>' . $row['sldat'] . '</td>

                        <td>' . number_format($row['giadat']) . '</td>

                        <td>' . number_format($row['sldat'] * $row['giadat']) . '</td>';

                echo '</tr> ';

                $i++;

            }

            // <th>Số lượng trúng</th>

            // <th>Giá trúng</th>

            // <td>' . number_format($row['so_luong']) . '</td>

            // <td>' . number_format($row['gia']) . '</td>

            // $j = $i;

            // foreach ($data1 as $row) {

            //     echo '<tr>

            //     <td>' . $j . '</td>

            //     <td>' . $row['name'] . '</td>

            //     <td>' . $row['dien_thoai'] . '</td>

            //     <td>' . $row['email'] . '</td>

            //     <td>' . $row['dia_chi'] . '</td>

            //     <td>' . $row['van_chuyen'] . '</td>

            //     <td>' . $row['thanh_toan'] . '</td>

            //     <td>' . number_format($row['so_luong']) . '</td>

            //     <td>' . number_format($row['gia_dat']) . '</td>

            //     <td>0</td>

            //     <td>0</td>

            //     <td>0</td>';

            //     echo '</tr> ';

            //     $j++;

            // }

            echo '</tbody>

                        </table>



            </div>

            </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i>&nbsp;Cancel</button>

            </div>

        ';

        }

    }



    function err()

    {

        require('layouts/header.php');

        $id = $_REQUEST['id'];

        $data = $this->model->getchitieterr($id);

        if (count($data) > 0) {

            $this->view->data = $data;

            $this->view->render('ketqua/err');

        } else {

            $this->view->thongbao = 'Kết quả không trúng thuầu trống! <a href="ketqua">Nhấn vào đây để quay lại</a>';

            $this->view->render('thongbao');

        }



        require('layouts/footer.php');

    }



    function save()

    {

        $id = $_REQUEST['id'];

        $name = $_REQUEST['name'];

        $mota = $_REQUEST['mota'];

        $vitri = $_REQUEST['vitri'];

        $hinhanh = $_REQUEST['hinhanh'];

        $data = ['name' => $name, 'mo_ta' => $mota, 'hinh_anh' => $hinhanh, 'com' => $vitri];

        require 'layouts/header.php';

        if ($this->model->save($id, $data)) {

            $this->view->thongbao = 'Cập nhật thành công! <a href="ketqua">Nhấn vào đây để quay lại</a>';

            $this->view->render('thongbao');

        } else {

            $this->view->thongbao = 'Cập nhật không thành công! <a href="ketqua">Nhấn vào đây để quay lại</a>';

            $this->view->render('canhbao');

        }

        require 'layouts/footer.php';

    }





    function del()

    {

        $id = $_REQUEST['id'];

        if ($this->model->del($id)) {

            $jsonObj['msg'] = "Đã xóa bản ghi!";

            $jsonObj['success'] = 1;

        } else {

            $jsonObj['msg'] = "Có lỗi khi xóa bản ghi này!";

            $jsonObj['success'] = 0;

        }

        echo json_encode($jsonObj);

    }



    function renew()

    {

        $gt = $_GET['giatri'];

        $data1 = explode(",", $gt);

        foreach ($data1 as $id) {

            if ($id != '') {

                $dhnew = $this->model->duplicaterow($id);

                //lấy ngày dtb cũ

                $date1 = date_create($dhnew['date']);

                $date2 = date_create($dhnew['date_end']);

                // tính số dư ngày

                $diff = date_diff($date1, $date2);

                // tính ngày bắt đầu đơn

                $date = date('Y-m-d', strtotime(date('Y-m-d')));

                // tính ngày kết thúc đơn

                $date_end = date('Y-m-d', strtotime(date("Y-m-d") . ' + 1 days'));

                // thời gian

                $timeDate = date('H:i:s', strtotime(date($dhnew['date'])));

                $timeDateEnd = date('H:i:s', strtotime(date($dhnew['date_end'])));

                $data = ['date' => $date . " " . $timeDate, 'date_end' => $date_end . " " . $timeDateEnd, 'tinh_trang' => 1];

                $ok = $this->model->saverow($dhnew['id'], $data);

            }

        }

        if ($ok) {

            $jsonObj['msg'] = "Cập nhật thành công";

            $jsonObj['success'] = 1;

        } else {

            $jsonObj['msg'] = "Cập nhật không thành công";

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

                $ok = $this->model->del($id);

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

