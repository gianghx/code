<script type="text/javascript" src="js/ketqua.js"></script>

<div class="content mt-3">

    <div class="animated fadeIn">

        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">

                        <strong class="card-title">Kết quả trúng thầu phiên <?=$this->data[0]['phien']?></strong>

                    </div>

                    <div class="card-body">

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

                                    <th>Số lượng đặt</th>

                                    <th>Giá đặt</th>

                                    <th>Số lượng trúng</th>

                                    <th>Giá trúng</th>

                                    <th>Tổng</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                $i = 1;

                                    foreach ($this->data as $row) {

                                    echo '<tr>';

                                                echo'<td>' . $i . '</td>

                                                <td>' . $row['name'] . '</td>

                                                <td>' . $row['sdt'] . '</td>

                                                <td>' . $row['email'] . '</td>

                                                <td>' . $row['diachi'] . '</td>

                                                <td>' . $row['vanchuyen'] . '</td>

                                                <td>' . $row['thanhtoan'] . '</td>

                                                <td>' . $row['sldat'] . '</td>

                                                <td>' . number_format($row['giadat']) . '</td>

                                                <td>' . number_format($row['so_luong']) . '</td>

                                                <td>' . number_format($row['gia']) . '</td>

                                                <td>' . number_format($row['so_luong']*$row['gia']) . '</td>';

                                                

                                                

                                    echo '</tr> ';

                                    $i++;

                                }

                                $j=$i;

                                                foreach ($this->data1 as $row) {

                                                    echo '<tr>

                                                                <td>' . $j . '</td>

                                                                <td>' . $row['name'] . '</td>

                                                                <td>' . $row['dien_thoai'] . '</td>

                                                                <td>' . $row['email'] . '</td>

                                                                <td>' . $row['dia_chi'] .'</td>

                                                                <td>' . $row['van_chuyen'] . '</td>

                                                                <td>' . $row['thanh_toan'] . '</td>

                                                                <td>' . number_format($row['so_luong']) . '</td>

                                                                <td>' . number_format($row['gia_dat']) . '</td>

                                                                <td>0</td>

                                                                <td>0</td>

                                                                <td>0</td>';

                                                    echo '</tr> ';

                                                    $j++;

                                                }



                                ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div><!-- .animated -->

</div><!-- .content -->