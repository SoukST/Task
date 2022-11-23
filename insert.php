<?php

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) {
        $_SESSION['error'] = 'ກະລຸນາເຂົ້າສູ່ລະບົບ!';
        header("location: signin.php");
    }

    $count = 5;
    $start_time = microtime(true);
    $fname = "Souksavanh";
    $lname = "CHANPHENGXAY";
    $username = "test";
    $password = "12345";
    $tel = "02091176324";
    $email = "souksavanh07@hotmail.com";

        for ($i=0; $i < $count; $i++) {
        $stmt = $conn->prepare("INSERT INTO tbl_theory (first_name, last_name, username, user_password, user_tel, user_email)
                                VALUES(:fname, :lname, :username, :password, :tel, :email)");
        $stmt->bindParam(":fname", $fname);
        $stmt->bindParam(":lname", $lname);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":tel", $tel);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        }
        $end_time = microtime(true);
        $execute_time = ($end_time - $start_time);
        $_SESSION['success'] = "Execute time of insert =".$execute_time." s";
        header("location: admin.php");

?>