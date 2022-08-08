<?php
    $totalviews = $data->totalviews();
    $online=$data->online();
?>
<!--::footer_part start::-->
    <footer class="footer_part" style="background-color: #212121;">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <h4 style="color: #fff;">GIỚI THIỆU</h4>
                        <!-- <p class="message" style="color: #7f7f7f;">Nhập khẩu và phân phối Hàng Nhật Thứ Thiệt [sản xuất tại Nhật, theo tiêu chuẩn Nhật, cho người Nhật dùng] * Đối tác cung cấp uy tín cho chương trình chăm sóc khách hàng của các tập đoàn lớn * Đồng bảo trợ iGREEN [cộng đồng phân loại rác thải tại nhà và chia sẻ miễn phí đồ cũ trên nền tảng di động]</p> -->
                        <ul class="list-unstyled">
                            <li><a href="javascript:void(0)"><?=$thongtin[0]['value']?></a></li>
                            <li><a href="javascript:void(0)">Địa chỉ 1: <?=$thongtin[1]['value']?></a></li>
                            <li><a href="javascript:void(0)">Địa chỉ 2: <?=$thongtin[11]['value']?></a></li>
                            <li><a href="javascript:void(0)">Điện thoại: <?=$thongtin[2]['value']?></a></li>
                            <li><a href="javascript:void(0)">Email: <?=$thongtin[3]['value']?></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4 style="color: #fff;">LIÊN KẾT</h4>
                        <ul class="list-unstyled">
                            <li><a href="<?=HOME?>">Trang chủ</a></li>
                            <li><a href="about">Giới thiệu</a></li>
                            <li><a href="blog">Bài viết</a></li>
                            <li><a href="lienhe">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <h4 style="color: #fff;">ĐĂNG KÍ NHẬN TIN</h4>
                        <p style="color: #7f7f7f;">Hãy nhập email của bạn vào đây để nhận tin!
                        </p>
                        <div>
                            <form action="dangky"
                                method="post" class="subscribe_form relative mail_part">
                                <input type="email" name="email"  placeholder="Email của bạn"
                                    class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = ' Email của bạn '" required>
                                <button type="submit" name="submit1" 
                                    class="email_icon newsletter-submit button-contactForm">đăng ký</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_footer_part">
                        <h4 style="color: #fff;">KẾT NỐI VỚI CHÚNG TÔI</h4>
                        <div id="mc_embed_signup">
                           <div class="fb-page" data-href="https://www.facebook.com/hangnhatnoidia.daisuko" data-tabs="timeline" data-width="" data-height="230" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/hangnhatnoidia.daisuko" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/hangnhatnoidia.daisuko">Gems Tech</a></blockquote></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright_text text-center">
                            <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Powered by <a href="http://gemstech.com.vn/" target="_blank">Gemstech</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->


    <!-- jquery plugins here-->
  <script src="template/js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="template/js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="template/js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="template/js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="template/js/lightslider.min.js"></script>
  <!-- swiper js -->
  <script src="template/js/masonry.pkgd.js"></script>
  <!-- particles js -->
  <script src="template/js/owl.carousel.min.js"></script>
  <script src="template/js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="template/js/slick.min.js"></script>
  <script src="template/js/swiper.jquery.js"></script>
  <script src="template/js/jquery.counterup.min.js"></script>
  <script src="template/js/waypoints.min.js"></script>
  <script src="template/js/contact.js"></script>
  <script src="template/js/jquery.ajaxchimp.min.js"></script>
  <script src="template/js/jquery.form.js"></script>
  <script src="template/js/jquery.validate.min.js"></script>
  <script src="template/js/mail-script.js"></script>
  <script src="template/js/stellar.js"></script>
  <!-- custom js -->
  <script src="template/js/theme.js"></script>
  <script src="template/js/custom.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
     function addphieu(id,idsp){
            var giadat= $("#giadat").val();
            var giasan= $("#giasan").val();
            var num= $("#soluong").val();
            giadat = giadat.replaceAll(',', '');
            giasan = giasan.replaceAll(',', '');
            if (giadat!='') {
                if (parseInt(giadat)>=parseInt(giasan)) {
                    $.post("cart",{'id':idsp,'phien':id,'num':num,'giadat':giadat}, function(data){
                       window.location.href="cart";
                    });
                }else{
                     alert("Giá bạn đặt phải lớn hơn giá sàn!");
                }
                
            }else{
                alert("Vui lòng nhập giá đặt!");
            }
        }

    function suasl(id){
                num= $("#soluong_"+id).val();
                $.post("updatecart",{'id':id,'num':num}, function(data){
                   //load lại sau khi update
                    $("#abc").load("<?=HOME?>/layout/header #abc");
                   $("#cartxx").load("<?=HOME?>/cart #cartxx");
                });
              }
  </script>
</body>

</html>