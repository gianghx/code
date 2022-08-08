<?php
  if (isset($_POST['btnsendmail'])) {
     $name= $_POST['name'];
     $email= $_POST['email'];
     $url= $_POST['url'];
     $subject='Website '.HOME;
     $noidung = '<div class=""><div class="aHl"></div><div id=":le" tabindex="-1"></div><div id=":iz" class="ii gt"><div id=":j0" class="a3s aiL "><table cellpadding="0" cellspacing="0" style="min-width:600px;width:100%">
        <tbody>
          <tr>
            <td align="center" style="background-color:#fff">
              <table border="0" cellpadding="0" cellspacing="0" style="width:600px;border-collapse:collapse;background-color:#ffffff">
                <tbody>
                  
                  <tr>
                    <td colspan="2" style="padding:0px 10px">
                      <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse">
                        <tbody>
                          <tr>
                            <td style="padding:0px 25px;color:#333333;font-family:Arial;border-top:1px solid #cbcbcb">
                              <p style="font-size:14px;line-height:180%;margin:10px 0px;color:#333333;font-family:Arial">
                                Xin chào '.$email.',</p>
                              <p style="font-size:14px;line-height:180%;margin:10px 0px;color:#333333;font-family:Arial">
                                Bạn '.$name.' vừa gửi cho bạn một sản phẩm từ website '.HOME.'.<br><br>
                                Link: <a href="'.$url.'">'.$url.'</a><br>

                              </p>
                              <p style="font-size:14px;line-height:180%;margin:10px 0px;color:#333333;font-family:Arial">
                                Nếu bạn cần hỗ trợ, vui lòng liên hệ hotline <a href="tel:'.$thongtin[2]['value'].'" style="font-size:14px;color:#333333;font-family:Arial;text-decoration:none" target="_blank">'.$thongtin[2]['value'].'</a>.</p>
                              <p style="font-size:14px;line-height:180%;margin:10px 0px;color:#333333;font-family:Arial">
                                Trân trọng cảm ơn
                                </p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" style="border-top:2px solid #055699">
                      <p style="font-size:16px;color:#333333;font-family:Arial;text-align:center;font-weight:bold">
                        <a href="http://thuonghieuweb.com" style="text-decoration:none;color:#fff" target="_blank"> <img alt="'.$thongtin[0]['value'].'" src="'.HOME.'/template/banner-top-vi.png" style="width:115px" class="CToWUd"> </a></p>
                      <p style="font-size:12px;color:#333333;font-family:Arial;text-align:center">
                        '.$thongtin[1]['value'].'<br>
                        hotline <a href="tel:'.$thongtin[2]['value'].'" style="font-size:12px;color:#333333;font-family:Arial;text-decoration:none" target="_blank">'.$thongtin[2]['value'].'</a>.<br>
                        <a href="mailto:'.$thongtin[3]['value'].'" style="font-size:12px;color:#333333;font-family:Arial;text-decoration:none" target="_blank">'.$thongtin[3]['value'].'</a></p>
                      <p style="font-size:12px;color:#333333;font-family:Arial;text-align:center">Nội dung email này là riêng tư và không được phép tiết lộ. Nếu bạn nhận được email này do nhầm lẫn, vui lòng xóa bỏ hoặc thông báo lại cho chúng tôi qua địa chỉ email  <a href="mailto:info@vdata.com.vn" target="_blank">info@vdata.com.vn</a><br> Chân thành cảm ơn!</p>
                      
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table></div><div class="yj6qo"></div><div class="yj6qo"></div><div class="yj6qo"></div></div><div id=":li" class="ii gt" style="display:none"><div id=":lj" class="a3s aiL undefined"></div></div><div class="hi"></div></div>';
     $ok= $data->sendmail($email,$subject,$noidung);
     if ($ok) {
             echo "<script>alert('Email của bạn đã được gửi thành công!'); window.history.back();</script>";
         }else{
             echo "<script>alert('Đã có lỗi xảy ra, vui lòng thực hiện lại'); window.history.back();</script>";
         }
  }
?>