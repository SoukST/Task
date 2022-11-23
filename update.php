<?php

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) {
        $_SESSION['error'] = 'ກະລຸນາເຂົ້າສູ່ລະບົບ!';
        header("location: signin.php");
    }

    $count = 100000;
    $start_time = microtime(true);
    $tel = "02052503725";

        for ($i=0; $i < $count; $i++) {
        $stmt = $conn->prepare("UPDATE tbl_theory SET user_tel = '$tel' ORDER BY user_id limit $count");
        $stmt->bindParam(":tel", $tel);
        $stmt->execute();
        }
        $end_time = microtime(true);
        $execute_time = ($end_time - $start_time);
        $_SESSION['success'] = "Execute time of Update =".$execute_time." s";
        header("location: admin.php");

?>