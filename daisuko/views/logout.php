<?php
    session_unset();
    session_destroy();
    echo "<script>window.location.assign('".HOME."');</script>";
?>
