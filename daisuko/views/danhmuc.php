<?php
  $danhmuc=$page['data'];
  if (isset($danhmuc) && count($danhmuc)>0) { 
     $baiviet= $data->getbaivietdanhmuc($danhmuc[0]['id']);
     $newpost= $data->newpost(8);
     $tongbv= count($baiviet);
     $trang= $url[1];
     $sotrang= ceil($tongbv/5);
     $baiviet1= $data->getbaivietdanhmuc1($danhmuc[0]['id'],$trang);
     $danhmuc = $data->danhmuc();
?>
 <!-- top link -->
            <div class="wrap-breadcrumb">
                <div class="clearfix container">
                    <div class="row main-header">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                            <ol class="breadcrumb breadcrumb-arrows">
                                <li><a href="<?=HOME?>" target="_self">Trang chủ</a></li>
                                <li class="active"><span>Blog</span></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end top link -->
            <!-- start content page - liên hệ -->
            <section id="content" class="clearfix container">
                <div class="row">
                    <div id="blog" class="page-content main-content content-pages" data-sticky_parent="">
                        <!-- Begin content -->
                        <div class="blog-content col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="wrapper-sticky">
                                    <div class="col-md-3  col-sm-12 col-xs-12 leftsidebar-col" data-sticky_column="">
                                        <!-- Begin sidebar blog -->
                                        <div class="sidebar ">
                                            <div class="group_sidebar">
                                                <div class="list-group navbar-inner ">
                                                    <div>
                                                        <h3 class="sb-title"><b>Danh mục blog</b></h3>
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
                                        <!-- End sidebar blog -->
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12 col-xs-12 " id="blog-container" data-sticky_column="">
                                    <div class="row">
                                        <div class="articles clearfix" id="layout-page">
                                            <div class="col-md-12  col-sm-12 col-xs-12">
                                                <h1><?=$page['title']?></h1>
                                            </div>
                                            <!-- Begin: Nội dung blog -->

                                            <?php foreach ($baiviet1 as $value) { ?>
                                            <div class="news-content">
                                                <div class="col-md-5 col-xs-12 col-sm-12 img-article">
                                                    <div class="art-img">
                                                        <img src="<?=$value['hinh_anh']?>" alt="<?=$value['name']?>">
                                                    </div>
                                                </div>
                                                <div class=" col-md-7 col-sm-12  col-xs-12">
                                                    <!-- Begin: Nội dung bài viết -->
                                                    <h2 class="title-article"><a href="blog/<?=$value['url']?>"><?=$value['name']?></a></h2>
                                                    <div class="body-content">
                                                        <ul class="info-more">
                                                            <li><i class="fa fa-calendar-o"></i><time pubdate="" datetime="<?=$value['updated']?>"><?=$value['ngaydang']?></time></li>
                                                            <li><i class="fa fa-file-text-o"></i><a href="blog/1/<?=$value['urldanhmuc']?>"> <?=$value['danhmuc']?> </a> </li>

                                                        </ul>
                                                        <p><?=$value['mo_ta']?></p>
                                                    </div>
                                                    <!-- End: Nội dung bài viết -->
                                                    <a class="readmore btn-rb clear-fix" href="blog/<?=$value['url']?>" role="button">Xem tiếp <span class="fa fa-angle-double-right"></span></a>
                                                </div>
                                            </div>
                                            <hr class="line-blog">
                                           <?php } ?>
                                            <!-- End: Nội dung blog -->
                                        </div>
                                        <div class="col-md-12">
                                            <!-- Begin: Phân trang blog -->
                                             <div id="pagination" class="">
                                                    <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
                                                        <?php if ($trang>1 && $sotrang>1) {
                                                            echo '<a class="prev fa fa-angle-left" href="blog/'.($trang-1).'/'.$url[2].'"><span>Trang trước</span></a>';
                                                        } ?>
                                                        
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 text-center">
                                                        <?php for ($i=1; $i <=$sotrang ; $i++) { 
                                                            if ($trang==$i) {
                                                                echo '<span class="page-node current">'.$i.'</span>';
                                                            }else{
                                                                echo '<a class="page-node" href="blog/'.$i.'/'.$url[2].'">'.$i.'</a>';
                                                            }
                                                        } ?>
                                                        
                                                        
                                                        <!-- <a class="page-node" href="product?page=3">3</a> -->
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
                                                        <?php if ($trang<$sotrang) {
                                                            echo '<a class="pull-right next fa fa-angle-right" href="blog/'.($trang+1).'/'.$url[2].'"><span>Trang sau</span></a>';
                                                        } ?>
                                                        
                                                    </div>
                                                </div>
                                            <!-- End: Phân trang blog -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End content -->
                    </div>
                </div>
            </section>
            <!-- end content page -->
<?php }else{
  echo "Nội dung đang được cập nhật";
} ?>