<?php
$id = $_REQUEST['tp'];
$huyen = $data->quanhuyen($id);
$json2 = json_encode($huyen);
echo $json2;
?>
