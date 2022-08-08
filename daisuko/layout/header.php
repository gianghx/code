<?php

	$thisurl  = isset($_GET['url']) ? $_GET['url'] : null;

?>

<html lang="en" class=" js no-touch cssanimations cssgradients csstransforms csstransforms3d csstransitions video svg pointerevents placeholder">



<head>

    <link rel="shortcut icon" href="https://hstatic.net/336/1000150336/1000203404/favicon.png?v=24" type="image/png">

    <meta charset="utf-8">

    <base href="<?=HOME?>/">



    <title>

        <?php echo $page['title'] ?>

    </title>





    <meta name="robots" content="index,follow">



    <meta name="revisit-after" content="1 day">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="HandheldFriendly" content="true">

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=0" name="viewport">

    <link rel="dns-prefetch" href="https://default-furniture.myharavan.com">

    <link rel="dns-prefetch" href="https://hstatic.net">

    

    



    <script src="https://hstatic.net/0/0/global/design/js/jquery.min.1.11.0.js"></script>

    <script src="https://hstatic.net/0/0/global/design/js/bootstrap.min.js"></script>

    <script src="https://hstatic.net/0/0/global/option_selection.js" type="text/javascript"></script>

    <script src="https://hstatic.net/0/0/global/api.jquery.js" type="text/javascript"></script>



    <script>

        var formatMoney = '{{amount}}₫';

    </script>

    <script src="https://hstatic.net/336/1000150336/1000203404/default_script.min.js?v=24" type="text/javascript"></script>

    <link href="https://hstatic.net/336/1000150336/1000203404/default_style.min.css?v=24" rel="stylesheet" type="text/css" media="all">



    <!--[if lt IE 9]>

    <script src="https://hstatic.net/0/0/global/design/theme-default/html5shiv.js"></script>

    <![endif]-->

    <script src="https://hstatic.net/0/0/global/design/theme-default/jquery-migrate-1.2.0.min.js"></script>

    <script src="https://hstatic.net/0/0/global/design/theme-default/jquery.touchSwipe.min.js" type="text/javascript"></script>



    <script data-target=".product-resize" data-parent=".products-resize" data-img-box=".image-resize" src="https://hstatic.net/0/0/global/design/js/fixheightproductv2.js"></script>



    <script src="template/js/haravan.plugin.1.0.js"></script>

    <link rel="stylesheet" type="text/css" href="https://hstatic.net/0/0/global/design/member/fonts-master/roboto.css">

    <meta name="description" content="<?php echo strip_tags($page['description'])?>" />

      <meta name="keywords" content="<?php echo $page['keywords']?>">

      <meta property="og:url"                content="<?php echo HOME.'/'.$thisurl ?>" />



      <meta property="og:type"               content="article" />



      <meta property="og:title"              content="<?php echo $page['title'] ?>" />



      <meta property="og:description"        content="<?php echo strip_tags($page['description'])?>" />



      <?php if ($page['image']!='') {



            echo '<meta property="og:image"    content="'.$page['image'].'" />';



      }else{



            echo '<meta property="og:image"      content="'.$thongtin[7]['value'].'" />';



      } ?>





    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://hstatic.net/0/0/global/design/css/bootstrap.3.3.1.css">

    <!-- Latest compiled and minified JavaScript -->

    <link href="https://hstatic.net/0/0/global/design/plugins/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">



    <link href="template/styles.css" rel="stylesheet" type="text/css" media="all">





    



    <!-- style home-page -->

    <style>

        .info-product-home {

            padding-top: 30px;

        }

        

        .info-product-home td {

            border: none;

            padding: 5px 0 5px 40px;

        }

        

        .info-product-home td:first-child {

            border: none;

            padding: 5px 0 5px 0px;

        }

        

        @media (max-width: 768px) {

            .info-product-home td:first-child {

                border: none;

                padding: 5px 0 5px 10px;

            }

        }

    </style>

    <div id="fb-root"></div>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=3209642075736668&autoLogAppEvents=1" nonce="T6LpIiWO"></script>

    <!-- Messenger Plugin chat Code -->



    <!-- Your Plugin chat code -->

    <div id="fb-customer-chat" class="fb-customerchat">

    </div>



    <script>

      var chatbox = document.getElementById('fb-customer-chat');

      chatbox.setAttribute("page_id", "105988607993244");

      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {

        FB.init({

          xfbml            : true,

          version          : 'v11.0'

        });

      };



      (function(d, s, id) {

        var js, fjs = d.getElementsByTagName(s)[0];

        if (d.getElementById(id)) return;

        js = d.createElement(s); js.id = id;

        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';

        fjs.parentNode.insertBefore(js, fjs);

      }(document, 'script', 'facebook-jssdk'));

    </script>

     <script>

    function comma(Num) { //function to add commas to textboxes

        Num += '';

        Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');

        Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');

        x = Num.split('.');

        x1 = x[0];

        x2 = x.length > 1 ? '.' + x[1] : '';

        var rgx = /(\d+)(\d{3})/;

        while (rgx.test(x1))

        x1 = x1.replace(rgx, '$1' + ',' + '$2');

        return x1 + x2;

    }

    </script>

</head>



<body class="page--has-secondary-nav page--styles-preview segment-online js-is-loaded democopy" cz-shortcut-listen="true">

    <nav id="menu-mobile" class="hidden">

        <ul>

        	

        	<?php foreach ($menu as  $value) {

                    $submenu= $data->submenu($value['id']);

                   if (count($submenu)>0) { ?>

                   				<li class="has-children">

                                  <a href="<?=$value['url']?>"><?=$value['name']?></a>

                					<ul class="child count-nav-5">

                                       <?php foreach ($submenu as $item) {

                                       	  $submenu2= $data->submenu($item['id']);

                                       	  if (count($submenu2)>0) { ?>

                                       	  	 <li class="has-children">

							                        <a href="<?=$item['url']?>"><?=$item['name']?></a>

							                        <ul class="child">

							                        	<?php foreach ($submenu2 as  $temp) {

							                        		echo '<li><a href="'.$temp['url'].'">'.$temp['name'].'</a></li>';

							                        	} ?>

							                        </ul>

							                  </li>

                                       	  <?php }else{

                                       	  	echo '<li><a href="'.$item['url'].'">'.$item['name'].'</a></li>';

                                       	  }  ?>

                                          

                                     <?php  }  ?>

                                        

                                    </ul>

                                  </li>

                                <?php } else { ?>

                                	<li><a href="<?=$value['url']?>"><?=$value['name']?></a></li>

                                <?php } } ?>

            <!-- <li><a href="/giaodien">Trang chủ</a></li>

            <li class="has-children">

                <a href="product.html">Sản phẩm</a>

                <ul class="child count-nav-5">

                    <li class="has-children">

                        <a href="product.html">Nội thất phòng khách</a>

                        <ul class="child">

                            <li><a href="product.html">Thiết kế phòng khách</a></li>

                            <li><a href="product.html">Bàn sofa Bàn trà</a></li>

                            <li><a href="product.html">Ghế thư giãn</a></li>

                            <li><a href="product.html">Kệ trang trí</a></li>

                        </ul>

                    </li>

                    

                    <li><a href="product.html">Nội thất phòng bếp</a></li>

                    <li><a href="product.html">Đồ trang trí</a></li>

                </ul>

            </li>

            <li><a href="blog.html">Blog</a></li>

            <li><a href="about.html">Giới thiệu</a></li>

            <li><a href="contact.html">Liên hệ</a></li> -->

        </ul>

    </nav>

    <div id="page" class="mm-page mm-slideout">

    	<section id="page_content" class="">

            <div id="pageContainer" class="clearfix">

                <header class="header bkg hidden-sm hidden-xs">

                    <div class="container clearfix">

                        <div class="row">

                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 logo">

                                <div class="row">

                                    <div class="col-lg-12 col-md-12 col-sm-7 col-xs-7">

                                        <!-- LOGO -->

                                        <h1>

                                            <a href="<?=HOME?>">

                                                <img src="<?=$thongtin[7]['value']?>" alt="<?=$thongtin[0]['value']?>" class="img-responsive logoimg">

                                            </a>

                                        </h1>

                                        <h1 style="display:none">

                                            <a href="#"><?=$thongtin[0]['value']?></a>

                                        </h1>

                                    </div>

                                    <div class="hidden-lg hidden-md col-sm-5 col-xs-5 mobile-icons">

                                        <div>

                                            <a href="#" title="Xem giỏ hàng" class="mobile-cart"><span>5</span></a>

                                            <a href="#" id="mobile-toggle"><i class="fa fa-bars"></i></a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 ">

                                <aside class="top-info">

                                    <div class="cart-info hidden-xs">

                                        <a class="cart-link" href="cart">

                                            <span class="icon-cart">																

                                    </span>

                                            <div class="cart-number">

                                               <?php if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {

                                                   echo count($_SESSION['cart']);

                                               } ?>

                                            </div>

                                        </a>

                                        <!-- <div class="cart-view clearfix" style="display: none;">

                                            <table id="clone-item-cart" class="table-clone-cart">

                                                <tbody>

                                                    <tr class="item_2 hidden">

                                                        <td class="img">

                                                            <a href="" title=""><img src="" alt=""></a>

                                                        </td>

                                                        <td>

                                                            <a class="pro-title-view" href="" title=""></a>

                                                            <span class="variant"></span>

                                                            <span class="pro-quantity-view"></span>

                                                            <span class="pro-price-view"></span>

                                                            <span class="remove_link remove-cart">					

                                                </span>

                                                        </td>

                                                    </tr>

                                                </tbody>

                                            </table>

                                            <table id="cart-view">

                                                <tbody>

                                                    <tr>

                                                        <td>Hiện chưa có sản phẩm</td>

                                                    </tr>

                                                </tbody>

                                            </table>

                                            <span class="line"></span>

                                            <table class="table-total">

                                                <tbody>

                                                    <tr>

                                                        <td class="text-left">TỔNG TIỀN:</td>

                                                        <td class="text-right" id="total-view-cart">0₫</td>

                                                    </tr>

                                                    <tr>

                                                        <td><a href="/cart" class="linktocart">Xem giỏ hàng</a></td>

                                                        <td><a href="/checkout" class="linktocheckout">Thanh toán</a></td>

                                                    </tr>

                                                </tbody>

                                            </table>

                                        </div> -->

                                    </div>

                                    <div class="navholder">

                                        <nav id="subnav">

                                            <ul>

                                                <li>

                                                    <a href="tel:<?=$thongtin[2]['value']?>"><i class="fa fa-phone" aria-hidden="true"></i><?=$thongtin[2]['value']?></a>

                                                </li>

                                                <li>

                                                    <a class="reg" href="mailto:<?=$thongtin[3]['value']?>" title="Email"><?=$thongtin[3]['value']?></a>

                                                </li>

                                            </ul>

                                        </nav>

                                        <div class="header_line">

                                            <p>Tra cứu cước vận chuyển<a class="mar-l5" href="https://viettelpost.com.vn/tra-cuoc-va-thoi-gian-van-chuyen/">VIETEL POST</a></p>

                                        </div>

                                    </div>

                                </aside>

                            </div>

                        </div>

                    </div>

                </header>

                <nav class="navbar-main navbar navbar-default cl-pri">

                    <!-- MENU MAIN -->

                    <div class="container nav-wrapper check_nav">

                        <div class="row">

                            <div class="navbar-header">

                                <div class="mobile-menu-icon-wrapper">

                                    <div class="menu-logo">



                                        <h1 class="logo logo-mobile">

                                            <a href="<?=HOME?>">

                                                <img src="<?=$thongtin[7]['value']?>" alt="<?=$thongtin[0]['value']?>" class="img-responsive logoimg">

                                            </a>

                                        </h1>



                                        <!-- <div class="nav-login">

                                            <a href="/account" class="cart " title="Tài khoản">

                                                <svg class="icon icon-user" viewBox="0 0 32 32">

                                                    <use xmlns:xlink="https://www.w3.org/1999/xlink" xlink:href="#icon-user">

                                                    </use>

                                                </svg>

                                            </a>

                                        </div> -->

                                        <div class="menu-btn click-menu-mobile ">

                                            <a href="#menu-mobile" class="navbar-toggle">

                                                <span class="sr-only">Toggle navigation</span>

                                                <span class="icon-bar"></span>

                                                <span class="icon-bar"></span>

                                                <span class="icon-bar"></span></a>

                                        </div>



                                        <div id="cart-targets" class="cart">

                                            <a href="cart" class="cart " title="Giỏ hàng">

                                                <span>



													<svg class="shopping-cart">

														<use xmlns:xlink="//www.w3.org/1999/xlink" xlink:href="#icon-add-cart"></use>

													</svg>

										</span>

                                                <span id="cart-count" class="cart-number">

                                                     <?php if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {

                                                   echo count($_SESSION['cart']);

                                               } ?>

                                                </span>

                                            </a>

                                        </div>

                                    </div>

                                    <div class="search-bar-top">

                                        <div class="search-input-top">

                                            <form action="search" method="post">

                                                <input type="text" name="keywords" placeholder="Tìm kiếm sản phẩm ..." required>

                                                <button type="submit" class="icon-search">

                                                    <svg class="icon-search_white">

                                                        <use xmlns:xlink="//www.w3.org/1999/xlink" xlink:href="#icon-search_white"></use>

                                                    </svg>

                                                </button>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div id="navbar" class="navbar-collapse collapse">

                                <ul class="nav navbar-nav clearfix sm" >



                                	<?php foreach ($menu as  $value) {

					                    $submenu= $data->submenu($value['id']);

					                    if ($thisurl==$value['url'])

					                    	$active='active';

					                    else

					                    	$active='';

					                   if (count($submenu)>0) { ?>

					                   	<li class="dropdown <?=$active?>">

	                                        <a href="<?=$value['url']?>" title="<?=$value['name']?>" class="has-submenu">

	                                            <span><?=$value['name']?></span>

	                                        </a>

	                                        <ul class="dropdown-menu sm-nowrap" role="menu" style="display: none; min-width: 10em; max-width: 20em; top: auto; left: 0px; margin-top: 0px; margin-left: 0px; width: auto;">

					                                       <?php foreach ($submenu as $item) {

					                                       	  $submenu2= $data->submenu($item['id']);

					                                       	   if ($thisurl==$item['url'])

											                    	$active='active';

											                   else

											                    	$active='';

					                                       	  if (count($submenu2)>0) { ?>

												                  <li class="<?=$active?>">

					                                                <a href="<?=$item['url']?>" title="<?=$item['name']?>" class="has-submenu"><?=$item['name']?></a>

					                                                <ul class="dropdown-menu">

					                                                	<?php foreach ($submenu2 as  $temp) {

												                        		echo '<li><a href="'.$temp['url'].'" title="'.$temp['name'].'">'.$temp['name'].'</a></li>';

												                        	} ?>

					                                                    

					                                                </ul>

					                                            </li>

					                                       	  <?php }else{

					                                       	  	echo '<li class="'.$active.'"><a href="'.$item['url'].'" title="'.$item['name'].'">'.$item['name'].'</a></li>';

					                                       	  }  ?>

					                                          

					                                     <?php  }  ?>

					                                        

					                                    </ul>

                                    	</li>

	                                <?php } else { ?>

	                                	<li class="<?=$active?>"><a href="<?=$value['url']?>" class="" title="<?=$value['name']?>"><span><?=$value['name']?></span></a></li>

	                                <?php } } ?>



	                            </ul>







                            </div>

                            <div class="hidden-xs pull-right right-menu">

                                <ul class="nav navbar-nav pull-right sm">

                                    <li class="col-md-12">



                                        <div class="search-bar">



                                            <div class="">

                                                <form action="search" method="post">

                                                    <input type="text" name="keywords" placeholder="Tìm kiếm..." autocomplete="off" required>

                                                </form>

                                            </div>

                                        </div>

                                    </li>



                                </ul>

                            </div>

                            <!--/.nav-collapse -->

                        </div>

                    </div>

                    <!-- End container  -->

                    <script>

                        $(window).resize(function() {

                            $('li.dropdown li.active').parents('.dropdown').addClass('active');

                            if ($('.right-menu').width() + $('#navbar').width() > $('.check_nav.nav-wrapper').width() - 40) {

                                $('.nav-wrapper').addClass('responsive-menu');

                            } else {

                                $('.nav-wrapper').removeClass('responsive-menu');

                            }

                        });



                        $(document).on("click", ".mobile-menu-icon .dropdown-menu ,.drop-control .dropdown-menu, .drop-control .input-dropdown", function(e) {

                            e.stopPropagation();

                        });

                    </script>

                    <script>

                        $(function() {

                            $('nav#menu-mobile').mmenu();

                        });

                        $(document).ready(function() {

                            flagg = true;

                            if (flagg) {

                                $('.click-menu-mobile a').click(function() {

                                    $('#menu-mobile').removeClass('hidden');

                                    flagg = false;

                                })

                            }

                        })

                    </script>

                </nav>

        

