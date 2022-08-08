<?php
  $baiviet=$page['data'];
  if (count($baiviet)>0) {
   $newpost= $data->newpost(8);
   $danhmuc = $data->danhmuc();
?>
<!-- top link -->
            <div class="wrap-breadcrumb">
                <div class="clearfix container">
                    <div class="row main-header">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5 blog-breadcrumb ">
                            <ol class="breadcrumb breadcrumb-arrows">
                                <li><a href="<?=HOME?>" target="_self">Trang chủ</a></li>
                                <li><a href="blog/1/<?=$baiviet['danhmucurl']?>"><?=$baiviet['danhmuc']?></a></li>
                                <li class="active"><span><?=$baiviet['name']?></span></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end top link -->
            <!-- start content page - liên hệ -->
            <section id="content" class="clearfix container">
                <div class="row">
                    <div id="article" class="content-pages main-content article-detail clearfix " data-sticky_parent="">
                        <div class="col-md-12 col-sm-12 col-xs-12 article">
                            <div class="row">
                                <!-- Begin article -->
                                <div class="article-body">
                                    <div class="wrapper-sticky">
                                        <div class="col-md-3 col-sm-12 col-xs-12   leftsidebar-col" data-sticky_column="">
                                            <div class="sidebar ">
                                                <div class="group_sidebar">
                                                    <div class="list-group navbar-inner ">
                                                        <div>
                                                            <h3 class="sb-title"><b>Danh mục</b></h3>
                                                        </div>
                                                        <ul class="nav navs sidebar menu" id="menu-blog">
                                                            <?php foreach ($danhmuc as  $value) { ?>
                                                            <li class="item  ">
                                                            <a href="blog/1/<?=$value['url']?>">
                                                                <span><?=$value['name']?></span>
                                                            </a>
                                                        </li>
                                                        <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- End: Danh mục tin tức -->
                                                <!--Begin: Bài viết mới nhất-->
                                                <div class=" group_sidebar">
                                                    <h3 class="sb-title">
                                                        <b>Bài viết mới nhất</b>
                                                    </h3>
                                                    <?php foreach ($newpost as  $value) { ?>
                                                <div class="article seller-item">
                                                    <div class="sellers-img">
                                                        <a href="blog/<?=$value['url']?>" class="products-block-image content_img clearfix">
                                                            <img src="<?=$value['hinh_anh']?>" alt="<?=$value['name']?>">
                                                        </a>
                                                    </div>
                                                    <div class="post-content has-sellers-img ">
                                                        <a href="blog/<?=$value['url']?>"><?=$value['name']?></a><span class="date"> <i class="fa fa-calendar-o"></i><?=$value['ngaydang']?></span>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                </div>
                                                <!--End: Bài viết mới nhất-->
                                            </div>
                                            <!-- End sidebar -->
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12 col-xs-12   articles " id="layout-page" data-sticky_column="">
                                        <span class="clearfix">
                                            <h1 class="sb-title-article"><?=$baiviet['name']?></h1>
                                        </span>
                                        <div class="content-page row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 article-content">
                                                <div class="body-content">
                                                    <ul class="info-more">
                                                        <li><i class="fa fa-calendar-o"></i><time pubdate="" datetime="<?=$baiviet['updated']?>"><?=$baiviet['ngaydang']?></time></li>
                                                        <li><i class="fa fa-file-text-o"></i><a href="blog/1/<?=$baiviet['danhmucurl']?>"> <?=$baiviet['danhmuc']?> </a> </li>

                                                    </ul>
                                                    <div class="article-pages">
                                                        <?=$baiviet['noi_dung']?>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    <!-- End article-->


                                    <!-- Begin sidebar -->

                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </section>
            <!-- end content page -->
<?php }else{
   echo "Nội dung đang được cập nhật";
} ?>