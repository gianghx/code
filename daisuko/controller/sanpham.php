<?php
class sanpham extends controller
{
   function __construct()
   {
       parent::__construct();
   }

   function index()
   {
       require('layouts/header.php');
       $this->view->nhasx = $this->model->nhasx();
      $this->view->danhmuc= $this->model->danhmuc();
        // $this->view->danhmuc=json_encode($danhmuc);
       $this->view->render('sanpham');
       require('layouts/footer.php');
   }

   function datatable()
   {
       $datatable['draw']=1;
       $datatable['recordsTotal']=1;
       $datatable['recordsFiltered']=1;
       $datatable['data']=$this->model->getdata();
       $i = 1;
       foreach ($datatable['data'] AS $key=>$row) {
         $datatable['data'][$key]['stt']= $i;
         $datatable['data'][$key]['action']='<a href="javascript:void(0)" onclick="edit('.$row['id'].')"><i class="fa fa-edit"></i>';
         $datatable['data'][$key]['action'].='<a href="javascript:void(0)" data-toggle="modal" data-target="#staticModal"  onclick="del('.$row['id'].')"><i class="fa fa-trash-o"></i>';
         $i++;
       }
       echo json_encode($datatable,true);
   }
   // function getdata()
   //  {
   //      $keyword = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';
   //      $offset = $_REQUEST['start'];
   //      $rows = $_REQUEST['length'];
   //      $result = $this->model->getdata($keyword, $offset, $rows);
   //      $totalData = $result['total'];
   //      $totalFilter = $totalData;
   //      $data = array();
   //      $i=0;
   //      foreach ($result['rows'] as $key => $item) {
   //          $subdata = array();
   //          $subdata[] = $i+1;
   //          $subdata[] = $item['id'];
   //          $subdata[] = $item['ma_sp'];
   //          $subdata[] = $item['name'];
   //          $subdata[] = $item['hinhanh'];
   //          $subdata[] =  $item['gianiemyet'];
   //          $subdata[] =  $item['giaban'];
   //          $subdata[] =  $item['mo_ta'];
   //          $subdata[] =  $item['noi_dung'];
   //          $subdata[] =  $item['tinh_nang'];
   //          $subdata[] =  $item['khuyen_cao'];
   //          $subdata[] =  $item['hinh_anh'];
   //          $subdata[] =  $item['danh_muc'];
   //          $subdata[] =  $item['com'];
   //          $subdata[] =  $item['url'];
   //          $subdata[] =  $item['slide_1'];
   //          $subdata[] =  $item['slide_2'];
   //          $subdata[] =  $item['slide_3'];
   //          $subdata[] =  $item['mo_ta_en'];
   //          $subdata[] =  $item['noi_dung_en'];
   //          $subdata[] =  $item['name_en'];
   //          $subdata[] =  $item['nsx'];
   //          $subdata[] =  $item['nhanvien'];
   //          $subdata[] =  $item['banchay'];
   //          $subdata[] = '<a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal" onclick="edit('.$i.')"><i class="fa fa-edit"></i></a>';
   //          $subdata[] ='<a href="sanpham/del?id='.$item['id'].'"><i class="fa fa-trash-o"></i></a>';
   //          $data[] = $subdata;
   //          $i++;
   //
   //      }
    //     $json_data = array(
    //         "draw" => intval($_REQUEST['draw']),
    //         "recordsTotal" => intval($totalData),
    //         "recordsFiltered" => intval($totalFilter),
    //         "data" => $data
    //     );
    //     echo json_encode($json_data);
    // }

   function getrow()
   {
       $id = $_REQUEST['id'];
       $data = $this->model->getrow($id);
       if (count($data)>0) {
           $jsonObj['data'] = $data[0];
           $jsonObj['success'] = true;
       } else {
           $jsonObj['err'] = 'Lỗi đọc dữ liệu từ máy chủ';
           $jsonObj['success'] = false;
       }
       $this->view->jsonObj = json_encode($jsonObj);
       $this->view->render('json');
   }

   function save()
   {
       $id = $_REQUEST['id'];
       $name = $_REQUEST['name'];
       $nha_sx = $_REQUEST['nhasx'];
       $name_en = $_REQUEST['name_en'];
       $name_en =str_replace("'", "\'", $name_en);
       $url = ($_REQUEST['url']!='')?$_REQUEST['url']:functions::convertname($name);
       $url =str_replace("+", "", $url);
       $masp = $_REQUEST['masp'];
       $hinhanh = $_REQUEST['hinhanh0'];
       $slide1 = $_REQUEST['hinhanh1'];
       $slide2 = $_REQUEST['hinhanh2'];
       $slide3 = $_REQUEST['hinhanh3'];
       $gianiemyet = str_replace(",","",$_REQUEST['gianiemyet']);
       $giaban = str_replace(",","",$_REQUEST['giaban']);
       $danhmuc = $_REQUEST['danhmuc'];
       $mota = $_REQUEST['mota'];
       $thanhphan = $_REQUEST['thanhphan'];
       $motaen = $_REQUEST['motaen'];
       $motaen =str_replace("'", "\'", $motaen);
       $noidungen = $_REQUEST['noidungen'];
       $noidungen = str_replace("'", "\'", $noidungen);
       $vitri = $_REQUEST['vitri'];
       $banchay = isset($_REQUEST['banchay'])?1:0;
       if ($id>0) {
          $data = ['ma_sp'=>$masp, 'name'=>$name,'name_en'=>$name_en,'updated'=> date("Y-m-d"), 'hinh_anh'=>$hinhanh,'gia_niem_yet'=>$gianiemyet, 'com'=>$vitri, 'nsx'=>$nha_sx,
          'gia_ban'=>$giaban, 'mo_ta'=>$mota,'mo_ta_en'=>$motaen,'noi_dung'=>$thanhphan,'noi_dung_en'=>$noidungen,'danh_muc'=>$danhmuc,'url'=>$url,'slide_1'=>$slide1,'slide_2'=>$slide2,'slide_3'=>$slide3,'banchay'=>$banchay];
       }else{
          $data = ['ma_sp'=>$masp, 'name'=>$name,'name_en'=>$name_en,'updated'=> date("Y-m-d"), 'hinh_anh'=>$hinhanh,'gia_niem_yet'=>$gianiemyet, 'com'=>$vitri, 'nsx'=>$nha_sx,
          'gia_ban'=>$giaban, 'mo_ta'=>$mota,'mo_ta_en'=>$motaen,'noi_dung'=>$thanhphan,'noi_dung_en'=>$noidungen, 'danh_muc'=>$danhmuc, 'url'=>$url,'slide_1'=>$slide1,'slide_2'=>$slide2,'slide_3'=>$slide3,'banchay'=>$banchay];
       }
       if ($this->model->save($id,$data)){
            $jsonObj['msg'] = "Cập nhật thành công";
            $jsonObj['success'] = 1;
        }
        else{
            $jsonObj['msg'] = "Cập nhật không thành công";
            $jsonObj['success'] = 0;
        }
        echo json_encode($jsonObj);
   }

   function del()
   {
       $id = $_REQUEST['id'];
       require 'layouts/header.php';
       if ($this->model->del($id)) {
           $this->view->thongbao = 'Đã xóa bản ghi! <a href="sanpham">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Có lỗi khi xóa bản ghi này! <a href="sanpham">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }

   function thayanh()
   {
       $i = $_REQUEST['index'];
       $dir = ROOT_DIR . '/uploads/sanpham/';
       $file = functions::uploadImg('img'.$i, $dir);
       if ($file==1) {
           $jsonObj['msg'] = "Bạn không được phép tải lên file lớn hơn 5M";
           $jsonObj['success'] = false;
       } elseif ($file==3) {
            $jsonObj['msg'] = "Lỗi khi tải ảnh lên";
            $jsonObj['success'] = false;
       } else {
           $jsonObj['file'] = $file;
           $jsonObj['success'] = true;
       }
       echo json_encode($jsonObj);
   }
}
?>
