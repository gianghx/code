<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $page['title'] ?></title>
    <base href="<?=HOME?>/">
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="template/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="template/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="template/css/owl.carousel.min.css">
    <link rel="stylesheet" href="template/css/lightslider.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="template/css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="template/css/flaticon.css">
    <link rel="stylesheet" href="template/css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="template/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="template/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="template/css/style.css">
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
      <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=3209642075736668&autoLogAppEvents=1" nonce="KnW0OPbH"></script>
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?=HOME?>"> <img src="<?=$thongtin[7]['value']?>" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <?php foreach ($menu as  $value) {
                                $submenu= $data->submenu($value['id']);
                                if (count($submenu)>0) { ?>
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="<?=$value['url']?>" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?=$value['name']?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                       <?php foreach ($submenu as $item) {
                                          echo '<a class="dropdown-item" href="'.$item['url'].'"> '.$item['name'].'</a>';
                                       } ?>
                                        <!-- <a class="dropdown-item" href="category.html"> shop category</a>
                                        <a class="dropdown-item" href="single-product.html">product details</a> -->
                                        
                                    </div>
                                  </li>
                                <?php }else{ ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=$value['url']?>"><?=$value['name']?></a>
                                </li>
                                <?php } } ?>

                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Shop
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="category.html"> shop category</a>
                                        <a class="dropdown-item" href="single-product.html">product details</a>
                                        
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="login.html"> login</a>
                                        <a class="dropdown-item" href="tracking.html">tracking</a>
                                        <a class="dropdown-item" href="checkout.html">product checkout</a>
                                        <a class="dropdown-item" href="cart.html">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                        <a class="dropdown-item" href="elements.html">elements</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="blog.html"> blog</a>
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex" id="abc">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <!-- <a href=""><i class="ti-heart"></i></a> -->
                            <!-- <div class="dropdown cart">
                                <a class="dropdown-toggle" href="cart" >
                                    <i class="fas fa-cart-plus"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div class="single_product">
                                            <a href="cart" style="text-align: center;color: #fff;">Có 2 sản phẩm</a>
                                    </div>
                                </div>
                                
                            </div> -->
                            <style type="text/css">
                            .main_menu .cart i:after{
                                content: "<?=count($_SESSION['cart'])?>";
                            }
                            </style>
                        </div>
                        

                    </nav>
                </div>
            </div>
        </div>

        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner" action="search" method="post">
                    <input type="text" class="form-control" id="search_input" name="key" placeholder="Search Here" required>
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->
