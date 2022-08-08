<?php

   if (isset($_POST['btngui'])) {

       $name = $_REQUEST['name'];

       $email = $_REQUEST['email'];

       $subject = '';

       $message = $_REQUEST['message'];

       $lienhe= array('name'=>$name,'email'=>$email,'noi_dung'=>$message,'ngay_gio'=>date("Y-m-d H:i:s"),'tinh_trang'=>1);

       $send= $data->themlienhe($lienhe);

       if ($send) {

      echo "<script>alert('Cảm ơn bạn đã gửi thông tin. Nhân viên tư vấn của chúng tôi sẽ liên hệ lại với quý khách qua Email hoặc Điện Thoại trong vòng 24 giờ tới.');</script>";

       }else{

          echo "<script>alert('Thất bại! vui lòng liên hệ với bộ phận HỖ TRỢ KHÁCH HÀNG theo số điện thoại ".$thongtin[2]['value']." để được hỗ trợ trực tiếp!');</script>";

       }

   }

   ?>













  <!-- top link -->

            <div class="wrap-breadcrumb">

                <div class="clearfix container">

                    <div class="row main-header">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">

                            <ol class="breadcrumb breadcrumb-arrows">

                                <li><a href="<?=HOME?>" target="_self">Trang chủ</a></li>



                                <li class="active"><span>Liên hệ</span></li>



                            </ol>

                        </div>

                    </div>

                </div>

            </div>

            <!-- end top link -->

            <!-- start content page - liên hệ -->

            <section id="content" class="clearfix container">

                <div class="row">

                    <div id="page">

                        <div class="col-md-12 col-xs-12" id="layout-page">

                            <span class="header-contact header-page clearfix">

                           <h1>Liên hệ</h1>

                        </span>

                            <div class="content-contact content-page">

                                <p class="text-center">

                                    <?=$thongtin[10]['value']?> 

                                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7449.05806101821!2d105.724715!3d21.011508!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134536692775d09%3A0x4be491b65a1d435!2sVINATENDER!5e0!3m2!1svi!2sus!4v1657854250682!5m2!1svi!2sus" width="1140" height="480" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->

                                </p>

                                <div class="col-md-7 col-sm-12 col-xs-12 contactFormWrapper" id="col-left ">

                                    <h3>Gửi yêu cầu</h3>

                                    <hr class="line-left">

                                    <p>

                                        Vui lòng điền thông tin và gửi tới chúng tôi.

                                    </p>

                                    <form accept-charset="UTF-8" action="" class="contact-form" method="post">

                                        <input name="utf8" type="hidden" value="✓">



                                        <div class="form-group">

                                            <label for="contactFormName" class="sr-only">Tên</label>

                                            <input required="" type="text" id="contactFormName" class="form-control input-lg" name="name" placeholder="Tên của bạn" autocapitalize="words" value="">

                                        </div>

                                        <div class="form-group">

                                            <label for="contactFormEmail" class="sr-only">Email</label>

                                            <input required="" type="email" name="email" placeholder="Email của bạn" id="contactFormEmail" class="form-control input-lg" autocorrect="off" autocapitalize="off" value="">

                                        </div>

                                        <div class="form-group">

                                            <label for="contactFormMessage" class="sr-only">Nội dung</label>

                                            <textarea required="" rows="6" name="message" class="form-control" placeholder="Viết bình luận" id="contactFormMessage"></textarea>

                                        </div>



                                        <input type="submit" name="btngui" class="btn btn-primary btn-lg btn-rb" value="Gửi liên hệ">



                                    </form>

                                </div>

                                <div class="col-md-5 sm-12 col-xs-12 " id="col-right">

                                    <h3>Chúng tôi ở đây</h3>

                                    <hr class="line-right">

                                    <h3 class="name-company">DAISUKO</h3>

                                    <!-- <p> Giải pháp bán hàng toàn diện từ website đến cửa hàng </p> -->

                                    <ul class="info-address">

                                        <li>

                                            <i class="glyphicon glyphicon-map-marker"></i>

                                            <span><?=$thongtin[1]['value']?></span>

                                        </li>

                                        <li>

                                            <i class="glyphicon glyphicon-envelope"></i>

                                            <span><?=$thongtin[3]['value']?></span>

                                        </li>



                                        <li>

                                            <i class="glyphicon glyphicon-phone-alt"></i>

                                            <span><?=$thongtin[2]['value']?></span>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </div>



                    </div>

                </div>

            </section>

