<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) { //หากกดปุ่ม 
        $username   = mysqli_real_escape_string($conn, $_POST['username']);
        $email      = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
       //new
        $fullname   = mysqli_real_escape_string($conn, $_POST['fullname']);
        $sex        = mysqli_real_escape_string($conn, $_POST['sex']);
        $age        = mysqli_real_escape_string($conn, $_POST['age']);
        $id_card    = mysqli_real_escape_string($conn, $_POST['id_card']);
        $phon       = mysqli_real_escape_string($conn, $_POST['phon']); 

        //new
        if (empty($fullname)) {
            array_push($errors, "ระบุชื่อ-นามสกุล");
            $_SESSION['error'] = "ระบุชื่อ-นามสกุล";
        }
        if (empty($sex)) {
            array_push($errors, "เลือกเพศ");
            $_SESSION['error'] = "เลือกเพศ";
        }
        if (empty($age)) {
            array_push($errors, "ระบุอายุตามความจริง");
            $_SESSION['error'] = "ระบุอายุตามความจริง";
        }
        if (empty($id_card)) {
            array_push($errors, "กรอกหมายเลขบัตรประชาชน");
            $_SESSION['error'] = "กรอกหมายเลขบัตรประชาชน";
        }
        if (empty($phon )) {
            array_push($errors, "กรอกหมายเลขโทรศัพท์");
            $_SESSION['error'] = "กรอกหมายเลขโทรศัพท์";
        }//new

        if (empty($username)) {
            array_push($errors, "ต้องระบุชื่อผู้ใช้");
            $_SESSION['error'] = "ต้องระบุชื่อผู้ใช้";
        }
        if (empty($email)) {
            array_push($errors, "ต้องระบุ Email");
            $_SESSION['error'] = "ต้องระบุ Email";
        }
        if (empty($password_1)) {
            array_push($errors, "ต้องระบุรหัสผ่าน");
            $_SESSION['error'] = "ต้องระบุรหัสผ่าน";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "รหัสผ่านสองรหัสไม่ตรงกัน");
            $_SESSION['error'] = "รหัสผ่านสองรหัสไม่ตรงกัน";
        }


        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "มีชื่อผู้ใช้อยู่แล้ว");
            }
            if ($result['email'] === $email) {
                array_push($errors, "มีอีเมลอยู่แล้ว");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO user (username, email, password, fullname, sex, age, id_card, phon) VALUES ('$username', '$email', '$password','$fullname','$sex','$age','$id_card','$phon')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "ตอนนี้คุณเข้าสู่ระบบแล้ว";
            header('location: index.php');
        } else {
           // array_push($errors, "Email หรือ Password มีอยู่แล้ว");
            //$_SESSION['error'] = "Email หรือ Password มีอยู่แล้ว";
            header("location: register.php");
        }
    }
    ?>