<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "ต้องระบุชื่อผู้ใช้");
        }

        if (empty($password)) {
            array_push($errors, "ต้องระบุรหัสผ่าน");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "ตอนนี้คุณเข้าสู่ระบบแล้ว";
                header("location: index.php");
            } else {
                array_push($errors, "Username หรือ Password ผิดพลาด");
                $_SESSION['error'] = "Username หรือ Password ผิดพลาด";
                header("location: login.php");
            }
        } else {
            array_push($errors, "ต้องระบุชื่อผู้ใช้และรหัสผ่าน");
            $_SESSION['error'] = "ระบุชื่อผู้ใช้และรหัสผ่านอีกครั้ง";
            header("location: login.php");
        }
    }

?>