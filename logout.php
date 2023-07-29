<?php
    session_start();
    setcookie("apikey", "", time() - 3600);
    setcookie("filter", "", time() - 3600);
    // require_once './config.php';
    session_destroy();
    header("Location: /PA4/index.php");
    exit();
?>
<!-- Name: Shashin Gounden -->
<!-- Student Number: u21458686 -->
