<script type="text/javascript" src="js/ketqua.js"></script>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Danh sách đấu giá thất bại phiên <?=$this->data[0]['phien']?></strong>
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
                                    <th>Số lượng đấu</th>
                                    <th>Giá đấu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($this->data as $row) {
                                    echo '<tr>
                                                <td>' . $i . '</td>
                                                <td>' . $row['name'] . '</td>
                                                <td>' . $row['dien_thoai'] . '</td>
                                                <td>' . $row['email'] . '</td>
                                                <td>' . $row['dia_chi'] . '</td>
                                                <td>' . number_format($row['so_luong']) . '</td>
                                                <td>' . number_format($row['gia_dat']) . '</td>';
                                    echo '</tr> ';
                                    $i++;
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