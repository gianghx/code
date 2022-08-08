<?php
    require '../libs/startup.php';
    require '../libs/database.php';
    $db = new database();
    $id = $_REQUEST['id'];
    $query = $db->query(" SELECT phi_ship FROM quanhuyen WHERE id=$id ");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    echo $temp[0]['phi_ship'];
?>
