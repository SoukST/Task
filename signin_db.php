<?php

    session_start();
    require_once 'config/db.php';

    if(isset($_POST['signin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email)) {
            $_SESSION['error'] = 'ກະລຸນາໃສ່ອີເມວ';
            header("location: signin.php");
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'ອີເມວບໍ່ຖືກຕ້ອງ';
            header("location: signin.php");
        } elseif (empty($password)) {
            $_SESSION['error'] = 'ກະລຸນາໃສ່ລະຫັດຜ່ານ';
            header("location: signin.php");
        } elseif (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'ລະຫັດຜ່ານຕ້ອງມີຄວາມຍາວລະຫວ່າງ 5 ເຖິງ 20 ຕົວ';
            header("location: signin.php");
        } else {
            try {

                $check_data = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $check_data->bindParam(":email", $email);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0) {

                    if ($email == $row['email']) {
                        if (password_verify($password, $row['password'])) {
                            if ($row['urole'] == 'admin') {
                                $_SESSION['admin_login'] = $row['id'];
                                header("location: admin.php");
                            } else {
                                $_SESSION['user_login'] = $row['id'];
                                header("location: user.php");
                            }
                        } else {
                            $_SESSION['error'] = 'ລະຫັດຜ່ານຜິດ';
                            header("location: signin.php");
                        }
                    } else {
                        $_SESSION['error'] = 'ອີເມວຜິດ';
                        header("location: signin.php");
                    }
                } else {
                    $_SESSION['error'] = "ບໍ່ມີຂໍ້ມູນໃນລະບົບ";
                    header("location: signin.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

?>