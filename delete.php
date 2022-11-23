<?php

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) {
        $_SESSION['error'] = 'ກະລຸນາເຂົ້າສູ່ລະບົບ!';
        header("location: signin.php");
    }

    $count = 500000;
    $start_time = microtime(true);
    $stmt = $conn->query("DELETE FROM tbl_theory limit $count");
    $stmt->execute();
    $end_time = microtime(true);
    $execute_time = ($end_time - $start_time);
    $_SESSION['success'] = "Execute time of delete =".$execute_time." s";
    header("location: admin.php");

?>