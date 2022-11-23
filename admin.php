<?php

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) {
        $_SESSION['error'] = 'ກະລຸນາເຂົ້າສູ່ລະບົບ!';
        header("location: signin.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <?php
            if (isset($_SESSION['admin_login'])) {
                $admin_id = $_SESSION['admin_login'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        ?>

        <h2 class="mt-4">Welcome, Admin <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h2>


        <div class=" h5 text-center alert alert-success mb-4 mt-4" role="alert">Member Details</div>
            
        <a href="insert.php" class="btn btn-success mb-2">Add</a>
        <a href="update.php" class="btn btn-warning mb-2"  onclick="Edit(this.href);return false;">Edit</a>
        <a href="delete.php" class="btn btn-danger mb-2" onclick="Del(this.href);return false;">Delete</a>
            
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert-danger" role="alert">
                    <?php
                        echo $_SESSION['error'];
                        unset ($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert-success" role="alert">
                    <?php
                        echo $_SESSION['success'];
                        unset ($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>First name</th>
                <th>Last name</th>
                <th>User name</th>
                <th>Password</th>
                <th>Tel</th>
                <th>Email</th>
            </tr>
            <?php
                $count =100;
                $start_time = microtime(true);
                $stmt = $conn->query("SELECT * FROM tbl_theory order by user_id limit $count");
                $stmt->execute();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?=$row["user_id"]?></td>
                <td><?=$row["first_name"]?></td>
                <td><?=$row["last_name"]?></td>
                <td><?=$row["username"]?></td>
                <td><?=$row["user_password"]?></td>
                <td><?=$row["user_tel"]?></td>
                <td><?=$row["user_email"]?></td>
            </tr>
            <?php
                }
                echo "<br>" ."Show records successfully !!!" ."<br>";
                $end_time = microtime(true);
                $execute_time = ($end_time - $start_time);
                echo "Execute time of show =".$execute_time." s";
            ?>
        </table>

        <a href="logout.php" class="btn btn-danger">Log Out</a>
    </div>

</body>
</html>

<script language="JavaScript">
    function Del(mypage) {
        var agree=confirm("ຕ້ອງການລຶບຂໍ້ມູນ ຫຼື ບໍ່ ?");
        if(agree) {
            window.location=mypage;
        }
    }
</script>

<script language="JavaScript">
    function Edit(mypage) {
        var agree=confirm("ຕ້ອງການອັບເດດຂໍ້ມູນ ຫຼື ບໍ່ ?");
        if(agree) {
            window.location=mypage;
        }
    }
</script>