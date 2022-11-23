<?php

    session_start();
    require_once 'config/db.php';

    if(isset($_POST['signup'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $urole = 'user';

        if (empty($firstname)) {
            $_SESSION['error'] = 'ກະລຸນາໃສ່ຊື່';
            header("location: index.php");
        } elseif (empty($lastname)) {
            $_SESSION['error'] = 'ກະລຸນາໃສ່ນາມສະກຸນ';
            header("location: index.php");
        } elseif (empty($email)) {
            $_SESSION['error'] = 'ກະລຸນາໃສ່ອີເມວ';
            header("location: index.php");
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'ອີເມວບໍ່ຖືກຕ້ອງ';
            header("location: index.php");
        } elseif (empty($password)) {
            $_SESSION['error'] = 'ກະລຸນາໃສ່ລະຫັດຜ່ານ';
            header("location: index.php");
        } elseif (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'ລະຫັດຜ່ານຕ້ອງມີຄວາມຍາວລະຫວ່າງ 5 ເຖິງ 20 ຕົວ';
            header("location: index.php");
        } elseif (empty($c_password)) {
            $_SESSION['error'] = 'ກະລຸນາຢືນຢັນລະຫັດຜ່ານ';
            header("location: index.php");
        } elseif ($password != $c_password) {
            $_SESSION['error'] = 'ລະຫັດຜ່ານບໍ່ຕົງກັນ';
            header("location: index.php");
        } else {
            try {

                $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email ) {
                    $_SESSION['warning'] = "ມີອີເມວນີ້ຢູ່ໃນລະບົບແລ້ວ <a href='signin.php'>ຄິກບ່ອນນີ້</a>ເພື່ອເຂົ້າສູ່ລະບົບ";
                    header("location: index.php");
                } elseif (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(firstname, lastname, email, password, urole)
                                            VALUES(:firstname, :lastname, :email, :password, :urole)");
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();
                    $_SESSION['success'] = "ສະໝັກສະມາຊິກຮຽບຮ້ອຍ ! <a href='signin.php' class='alert-link'>ຄິກບ່ອນນີ້</a> ເພື່ອເຂົ້າສູ່ລະບົບ";
                    header("location: index.php");
                } else {
                    $_SESSION['error'] = "ມີບາງຢ່າງຜິດພາດ";
                    header("location: index.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

?>