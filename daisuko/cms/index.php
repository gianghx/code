<?php
// function isMobile() {
//     return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
// }
// if(isMobile())
//     header('Location: https://vdata.com.vn/vpdtm/');
// else {
  require 'libs/startup.php';
  require 'libs/database.php';
  require 'libs/model.php';
  require 'libs/controller.php';
  require 'libs/view.php';
  require 'libs/functions.php';
  require 'libs/bootstrap.php';
  require 'libs/Mailin.php';
  $app = new bootstrap();
// }
?>
