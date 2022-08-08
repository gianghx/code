<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="flexbox">
   <head>
      <link rel="shortcut icon" href="http://tainghetelesale.com/uploads/home/logo1.png" type="image/png" />
      <title>
         Thông tin đơn hàng
      </title>
      <link href='//hstatic.net/0/0/global/checkouts.css?v=1.1' rel='stylesheet' type='text/css'  media='all'  />
      <link href='//theme.hstatic.net/1000247582/1000494745/14/check_out.css?v=690' rel='stylesheet' type='text/css'  media='all'  />
      <script src='//hstatic.net/0/0/global/jquery.min.js' type='text/javascript'></script>
      <script src='//hstatic.net/0/0/global/jquery.validate.js' type='text/javascript'></script>
      <style>
         .mainbar-qr h2 {
         text-align: center;
         font-size: 16px;
         margin-bottom: 30px;
         font-weight: 500;
         color: #212121;
         }
         .mainbar-info .mainbar-qr_section {
         text-align: center;
         }
         .mainbar-info .mainbar-qr_section .count_time {
         margin-bottom: 10px;
         margin-top: 30px;
         }
         .mainbar-info .mainbar-qr_section .count_time .time-out {
         color: #008fe5;
         }
         .mainbar-info .mainbar-qr_section .count_time .count_text {
         margin-bottom: 10px;
         }
         .mainbar-info .mainbar-qr_section .count_time .time {
         display: inline-block;
         position: relative;
         font-style: italic;
         font-size:12px;
         }
         .mainbar-info .mainbar-qr_section .count_time .time i {
         width: 10px;
         height: 10px;
         border: 1px solid #333;
         border-bottom-color: transparent;
         border-radius: 100%;
         position: absolute;
         top: 50%;
         left: -14px;
         margin-top: -6px;
         margin-left: -6px;
         opacity: 1;
         -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=" 0 ")";
         filter: alpha(opacity=0);
         -webkit-animation: rotate 0.5s linear infinite;
         animation: rotate 0.5s linear infinite;
         opacity: 1;
         -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=" 100 ")";
         filter: alpha(opacity=100);
         }
         .mainbar-info .mainbar-qr_instruction {
         max-width: 300px;
         margin: auto;
         text-align: center;
         color: #212121;
         line-height: 24px;
         }
         form#form_update_shipping_method {
         position: relative;
         }
         .order-checkout__loading { position: static; }
         .order-checkout__loading--box{
         position: absolute;
         left: 0;
         top: 0;
         z-index: -1;
         width: 100%;
         height: 100%;
         display: -webkit-flex;
         display: flex;
         opacity: 0;
         visibility: hidden;
         justify-content: center;
         align-items: center;
         padding: 0;
         }
         .order-checkout__loading--box.show {
         z-index: 2;
         visibility: visible;
         opacity: 1;
         }
         .order-checkout__loading--circle {
         border: 2px solid #f3f3f3;
         border-top: 2px solid #5cabe0;
         border-radius: 50%;
         width: 32px;
         height: 32px;
         margin: 0;
         -webkit-transform-origin: 50%;
         -o-transform-origin: 50%;
         -ms-transform-origin: 50%;
         transform-origin: 50%;
         -moz-animation: spin 700ms infinite linear;
         -ms-animation: spin 1.5s infinite linear;
         -webkit-animation: spin 700ms infinite linear;
         -o-animation: spin 700ms infinite linear;
         animation: spin 700ms infinite linear;
         z-index: 1;
         }
         .order-checkout__loading--box.show:after {
         content: "";
         position: fixed;
         width: 100%;
         height: 100%;
         left: 0;
         top: 0;
         z-index: 3;
         }
         .step-sections { position: relative; z-index: 3; }
         @media (max-width: 767px){
         .order-checkout__loading--box{ position: fixed; }
         .order-checkout__loading--box.show:after { display: none; }
         }
         .order-checkout__loading--show .order-checkout__loading--box {
         display:block;
         }
         @-moz-keyframes spin {
         100% {
         -moz-transform: rotate(360deg);
         }
         }
         @-webkit-keyframes spin {
         100% {
         -webkit-transform: rotate(360deg);
         }
         }
         @keyframes spin {
         100% {
         -webkit-transform: rotate(360deg);
         transform: rotate(360deg);
         }
         }
         .redeem-login {
         display: flex;
         align-items: center;
         justify-content: space-between;
         }
         .redeem-login-title {
         position: relative;
         display: flex;
         flex-wrap: wrap;
         }
         .redeem-login-title h2 {
         color: #333;
         margin-right: 5px;
         }
         .redeem-login-btn a {
         display: inline-block;
         border-radius: 4px;
         font-weight: 500;
         padding: 13px 10px;
         background: #338dbc;
         color: #fff;
         width: 82px;
         text-align: center;
         }
         .redeem-form-used
         {
         padding-top : 10px;
         }
         .btn-redeem-loading .btn-redeem-spinner {
         -webkit-animation: rotate 0.5s linear infinite;
         animation: rotate 0.5s linear infinite;
         opacity: 1;
         -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=" 100 ")";
         filter: alpha(opacity=100);
         }
         .icon-redeem-button-spinner {
         position: absolute;
         top: 0;
         opacity: 0;
         right: -25px;
         width: 12px;
         height: 12px;
         border: 2px solid #999999;
         border-bottom-color: transparent;
         border-radius: 100%;
         }
         .total-line-table-footer {
         white-space: nowrap;
         }
         .row-align-top {
         vertical-align: top;
         }
      </style>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no">
   </head>
   <body>
      <input id="reloadValue" type="hidden" name="reloadValue" value="" />
      <input id="is_vietnam" type="hidden" value="true" />
      <input id="is_vietnam_location" type="hidden" value="true" />
      <div class="banner">
         <div class="wrap">
            <a href="" class="logo">
               <h1 class="logo-text">abc</h1>
            </a>
         </div>
      </div>
      <button class="order-summary-toggle order-summary-toggle-hide">
         <div class="wrap">
            <div class="order-summary-toggle-inner">
               <div class="order-summary-toggle-icon-wrapper">
                  <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-icon">
                     <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z"></path>
                  </svg>
               </div>
               <div class="order-summary-toggle-text order-summary-toggle-text-show">
                  <span>Hiển thị thông tin đơn hàng</span>
                  <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-dropdown" fill="#000">
                     <path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path>
                  </svg>
               </div>
               <div class="order-summary-toggle-text order-summary-toggle-text-hide">
                  <span>Ẩn thông tin đơn hàng</span>
                  <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-dropdown" fill="#000">
                     <path d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z"></path>
                  </svg>
               </div>
               <div class="order-summary-toggle-total-recap" data-checkout-payment-due-target="125000000">
                  <span class="total-recap-final-price">1,250,000₫</span>
               </div>
            </div>
         </div>
      </button>
      <div class="content content-second">
         <div class="wrap">
            <div class="sidebar sidebar-second">
               <div class="sidebar-content">
                  <div class="order-summary">
                     <div class="order-summary-sections">
                        <div class="order-summary-section order-summary-section-discount" data-order-summary-section="discount">
                           <form id="form_discount_add" accept-charset="UTF-8" method="post">
                              <input name="utf8" type="hidden" value="✓">
                              <div class="fieldset">
                                 <div class="field  ">
                                    <div class="field-input-btn-wrapper">
                                       <div class="field-input-wrapper">
                                          <label class="field-label" for="discount.code">Mã giảm giá</label>
                                          <input placeholder="Mã giảm giá" class="field-input" data-discount-field="true" autocomplete="off" autocapitalize="off" spellcheck="false" size="30" type="text" id="discount.code" name="discount.code" value="" />
                                       </div>
                                       <button type="submit" class="field-input-btn btn btn-default btn-disabled">
                                       <span class="btn-content">Sử dụng</span>
                                       <i class="btn-spinner icon icon-button-spinner"></i>
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="content">
         <div class="wrap">
            <div class="sidebar">
               <div class="sidebar-content">
                  <div class="order-summary order-summary-is-collapsed">
                     <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                     <div class="order-summary-sections">
                        <div class="order-summary-section order-summary-section-product-list" data-order-summary-section="line-items">
                           <table class="product-table">
                              <thead>
                                 <tr>
                                    <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                    <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                    <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                    <th scope="col"><span class="visually-hidden">Giá</span></th>
                                 </tr>
                              </thead>
                              <tbody>
                              <?php $total=0; foreach ($this->data as $key => $value) {?>
                                 <tr class="product" data-product-id="1017810217" data-variant-id="1034726198">
                                    <td class="product-image">
                                       <div class="product-thumbnail">
                                          <div class="product-thumbnail-wrapper">
                                             <img class="product-thumbnail-image" src="<?=$value['hinhanh']?>" />
                                          </div>
                                          <span class="product-thumbnail-quantity" aria-hidden="true"><?=$value['so_luong']?></span>
                                       </div>
                                    </td>
                                    <td class="product-description">
                                       <span class="product-description-name order-summary-emphasis"><?=$value['tensp']?></span>
                                    </td>
                                    <td class="product-quantity visually-hidden">1</td>
                                    <td class="product-price">
                                       <span class="order-summary-emphasis"><?php $tong=$value['gia']*$value['so_luong']; echo number_format($tong); ?> đ</span>
                                    </td>
                                 </tr>
                                 <?php $total+=$tong; } ?>
                              </tbody>
                           </table>
                        </div>
                      
                        <div class="order-summary-section order-summary-section-total-lines payment-lines" data-order-summary-section="payment-lines">
                           <table class="total-line-table">
                              <thead>
                                 <tr>
                                    <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                    <th scope="col"><span class="visually-hidden">Giá</span></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr class="total-line total-line-subtotal">
                                    <td class="total-line-name">Tạm tính</td>
                                    <td class="total-line-price">
                                       <span class="order-summary-emphasis">
                                       <?php echo number_format($total); ?>₫
                                       </span>
                                    </td>
                                 </tr>
                                 <tr class="total-line total-line-shipping">
                                    <td class="total-line-name">Phí ship</td>
                                    <td class="total-line-price">
                                       <span class="order-summary-emphasis" data-checkout-total-shipping-target="0">
                                       Miễn phí
                                       </span>
                                    </td>
                                 </tr>
                              </tbody>
                              <tfoot class="total-line-table-footer">
                                 <tr class="total-line">
                                    <td class="total-line-name payment-due-label">
                                       <span class="payment-due-label-total">Tổng tiền</span>
                                    </td>
                                    <td class="total-line-name payment-due">
                                       <span class="payment-due-currency">VND</span>
                                       <span class="payment-due-price">
                                       <?php echo number_format($total); ?>₫
                                       </span>
                                    </td>
                                 </tr>
                              </tfoot>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="main">
               <div class="main-header">
                  <a href="<?=CMS?>/donhang" class="logo">
                     <h1 class="logo-text">Thông tin đơn hàng</h1>
                  </a>
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item">
                        <a href="<?=CMS?>/donhang">Đơn hàng</a>
                     </li>
                     <li class="breadcrumb-item breadcrumb-item-current">
                        Thông tin 
                     </li>
                  </ul>
               </div>
               <div class="main-content">
                  <form method="post" action="updatedon?sdt=<?php echo $value['sdt'] ?>&date=<?php echo $value['ngay_gio'] ?>&tt=<?php echo $value['tinh_trang'] ?>">
                  <div class="step">
                     <div class="step-sections steps-onepage" step="1">
                        <div class="section">
                           <div class="section-header">
                              <h2 class="section-title">Thông tin thanh toán</h2>
                           </div>
                           <div class="section-content section-customer-information no-mb">
                              <div class="fieldset">
                                 <div class="field   ">
                                    <div class="field-input-wrapper">
                                       <label class="field-label" for="billing_address_full_name">Họ và tên</label>
                                       <input placeholder="Họ và tên" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text" id="name" name="name" value="<?php echo $value['name']; ?>"  />
                                    </div>
                                 </div>
                                 <div class="field  field-two-thirds  ">
                                    <div class="field-input-wrapper">
                                       <label class="field-label" for="checkout_user_email">Email</label>
                                       <input placeholder="Email" class="field-input" type="email" id="email" name="email" value="<?php echo $value['email']; ?>"  />
                                    </div>
                                 </div>
                                 <div class="field field-required field-third  ">
                                    <div class="field-input-wrapper">
                                       <label class="field-label" for="billing_address_phone">Điện thoại</label>
                                       <input placeholder="Điện thoại" autocapitalize="off" spellcheck="false" class="field-input" size="30" maxlength="11" type="tel" id="sdt" name="sdt" value="<?php echo $value['sdt']; ?>" />
                                    </div>
                                 </div>
                                 <div class="field field-required  ">
                                    <div class="field-input-wrapper">
                                       <label class="field-label" for="billing_address_address1">Địa chỉ</label>
                                       <input placeholder="Địa chỉ" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text" id="dia_chi" name="dia_chi" value="<?php echo $value['dia_chi']; ?>" />
                                    </div>
                                 </div>
                                 <div class="field field-required  ">
                                    <div class="field-input-wrapper">
                                       <label class="field-label" for="billing_address_address1">Ghi chú</label>
                                       <input placeholder="Ghi chú" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text" id="ghi_chu" name="ghi_chu" value="<?=$value['ghi_chu']?>" />
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="change_pick_location_or_shipping">
                        <div id="section-shipping-rate">
                           <div class="section-header">
                              <h2 class="section-title">Phương thức vận chuyển</h2>
                           </div>
                           <div class="section-content">
                              <div class="content-box">
                                 <div class="content-box-row">
                                    <div class="radio-wrapper">
                                       <label class="radio-label" for="shipping_rate_id_1188080">
                                          <div class="radio-input">
                                             <input id="shipping_rate_id_1188080" class="input-radio" type="radio" name="shipping_rate_id" value="1188080" checked />
                                          </div>
                                          <span class="radio-label-primary">Giao hàng nhanh ( 2 - 4 ngày làm việc )</span>
                                          <span class="radio-accessory content-box-emphasis">
                                          0₫
                                          </span>
                                       </label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="section-payment-method" class="section">
                           <div class="section-header">
                              <h2 class="section-title">Phương thức thanh toán</h2>
                           </div>
                           <div class="section-content">
                              <div class="content-box">
                                 <div class="radio-wrapper content-box-row">
                                    <label class="radio-label" for="payment_method_id_722479">
                                       <div class="radio-input">
                                          <input id="payment_method_id_722479" class="input-radio" name="payment_method_id" type="radio" value="722479" checked />
                                       </div>
                                       <span class="radio-label-primary">Thanh toán khi giao hàng (COD)</span>
                                    </label>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                        <?php if ($value['tinh_trang']==3) {
                          echo '
                            <div class="step-footer">
                           
                           <button class="step-footer-continue-btn btn" disabled>
                           <span class="btn-content">Đơn hàng đã hoàn thành</span>
                           <i class="btn-spinner icon icon-button-spinner"></i>
                           </button>
                           
                           <a class="step-footer-previous-link" href="'.CMS.'/donhang">
                              <svg class="previous-link-icon icon-chevron icon" width="6.7" height="11.3" viewBox="0 0 6.7 11.3">
                                 <path d="M6.7 1.1l-1-1.1-4.6 4.6-1.1 1.1 1.1 1 4.6 4.6 1-1-4.6-4.6z"></path>
                              </svg>
                              Trở về
                           </a>
                        </div>
                          ';
                        }elseif($value['tinh_trang']==1) {
                          echo '<div class="step-footer">
                           
                           <button type="submit" name="btnxn" class="step-footer-continue-btn btn">
                           <span class="btn-content">Xác nhận đơn hàng</span>
                           <i class="btn-spinner icon icon-button-spinner"></i>
                           </button>
                           
                           <a class="step-footer-previous-link" href="'.CMS.'/donhang">
                              <svg class="previous-link-icon icon-chevron icon" width="6.7" height="11.3" viewBox="0 0 6.7 11.3">
                                 <path d="M6.7 1.1l-1-1.1-4.6 4.6-1.1 1.1 1.1 1 4.6 4.6 1-1-4.6-4.6z"></path>
                              </svg>
                              Trở về
                           </a>
                        </div>';

                        }elseif($value['tinh_trang']==2){
                          echo '<div class="step-footer">
                           
                           <button type="submit" name="btnxn" class="step-footer-continue-btn btn">
                           <span class="btn-content">Hoàn thành</span>
                           <i class="btn-spinner icon icon-button-spinner"></i>
                           </button>
                           
                           <a class="step-footer-previous-link" href="'.CMS.'/donhang">
                              <svg class="previous-link-icon icon-chevron icon" width="6.7" height="11.3" viewBox="0 0 6.7 11.3">
                                 <path d="M6.7 1.1l-1-1.1-4.6 4.6-1.1 1.1 1.1 1 4.6 4.6 1-1-4.6-4.6z"></path>
                              </svg>
                              Trở về
                           </a>
                        </div>';
                        }else{
                          echo '<div class="step-footer">
                           
                           <button class="step-footer-continue-btn btn" disabled>
                           <span class="btn-content">Đơn hàng đã hủy</span>
                           <i class="btn-spinner icon icon-button-spinner"></i>
                           </button>
                           
                           <a class="step-footer-previous-link" href="'.CMS.'/donhang">
                              <svg class="previous-link-icon icon-chevron icon" width="6.7" height="11.3" viewBox="0 0 6.7 11.3">
                                 <path d="M6.7 1.1l-1-1.1-4.6 4.6-1.1 1.1 1.1 1 4.6 4.6 1-1-4.6-4.6z"></path>
                              </svg>
                              Trở về
                           </a>
                        </div>';
                        } ?>
                     </div>

                  </div>
                  </form>
               </div>
               
            </div>
         </div>
         <div class="main-footer">
         </div>
      </div>
      </div>
      </div>
   </body>
</html>