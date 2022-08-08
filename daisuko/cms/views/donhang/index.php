<script type="text/javascript" src="js/donhang.js"></script>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Quản lý đấu giá</strong>
                        <a href="donhang/add" class="btn btn-primary ml-4"><i class="fa fa-plus"></i>&nbsp; Tạo phiên mới</a>
                        <button type="button" class="btn btn-outline-danger ml-2" onclick="delmulti()" id="btndelmulti" name="btndelmulti"><i class="fa fa-address-book"></i>&nbsp; Xóa phiên đã chọn</button>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll" /></th>
                                    <th>STT</th>
                                    <th>Bắt đầu</th>
                                    <th>Kết thúc</th>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá sàn</th>
                                    <th>Giá ST</th>
                                    <th>Loại</th>
                                    <th>Tình trạng</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $date= date("Y-m-d H:i:s");
                                foreach ($this->data as $row) {
                                    echo '<tr>
                                                <td><input type="checkbox" name="all" value="' . $row['id'] . '" /></td>
                                                <td>' . $i . '</td>
                                                <td>' . date("d/m/Y H:i:s", strtotime($row['date'])) . '</td>
                                                <td>' . date("d/m/Y H:i:s", strtotime($row['date_end'])) . '</td>
                                                <td>' . $row['sanpham'] . '</td>
                                                <td>' . $row['so_luong'] . '</td>
                                                <td>' . number_format($row['gia_san']) . '</td>
                                                <td>' . number_format($row['gia_st']) . '</td>';
                                    if ($row['noi_bat']==1)
                                        echo '<td>HÀNG VIỆT NAM</td>';
                                    elseif($row['noi_bat']==2)
                                        echo '<td>HÀNG NHẬP KHẨU</td>';
                                    else
                                        echo '<td>HÀNG VIỆT NAM CHẤT LƯỢNG CAO</td>';
                                    
                                    echo '<td align="center"><span ';
                                    if ($row['date']> $date)
                                        echo 'class="badge badge-pill badge-primary">Chưa đến giờ</span>';
                                    elseif ($row['date']<= $date && $row['date_end']>= $date)
                                        echo 'class="badge badge-pill badge-warning">Đang trong phiên</span>';
                                    elseif ($row['date_end']< $date)
                                        echo 'class="badge badge-pill badge-danger">Đã hết phiên</span></td>';
                                    else
                                        echo 'class="badge badge-pill badge-secondary" disabled>Đã hủy</span></td>';


                                    echo '<td><a href="donhang/edit?id='.$row['id'].'" class="text-primary"><i class="fa fa-eye"></i></a></td>';
                                    echo '<td>  <a onclick="xoadon(' . $row['id'] . ');" class="text-danger"><i class="fa fa-trash-o"></i></a></td>';
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
