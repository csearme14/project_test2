<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียนเช่ารถออนไลน์</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="header">
        <h2>ลงทะเบียนเช่ารถออนไลน์</h2>
    </div>

    <form action="register_db.php" method="post"> <!--กดsubmit-->
        <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <div class="input-group">
            <label for="fullname">ชื่อ-สกุล</label>
            <input type="text" name="fullname">
        </div>
        <div class="input-sex">
            <Input type="radio" name="sex" value="male"checked>เพศชาย
            <Input type="radio" name="sex" value="female">เพศหญิง
        </div>
        <div class="input-group">
            <label for="age">อายุ</label>
            <input type="text" name="age">
        </div>
        <div class="input-group">
            <label for="id_card">บัตรประชาชน</label>
            <input type="text" name="id_card">
        </div>

            <!--ทดลอง partern-->
            ^(?: เริ่มต้น)$ สุดท้าย
        <div class="input-group">
            <label for="old-test">pattern</label>
            <input type="tel" name="old-test" pattern="[a-z]{5,}" title="กรอกอายุระหว่าง 15-65 ปี" required>
        </div>
            [A-Za-z0-9_]{1,15} 
        <div class="input-group">
            <label for="old-test">อายุ</label>
            <input type="tel" name="old-test" pattern="^(?:1[5-9]|[2-5][0-9]6[0-5])$" title="กรอกอายุระหว่าง 15-65 ปี" required>
        </div>
        ^(?:1[01][0-9]|120|1[7-9]|[2-9][0-9])$
        <div class="input-group">
        <label for="phon">เบอร์โทร</label>
        <input type="tel" name="Test_tel" pattern="\d{3}\d{3}\d{4}" title="กรอกเบอร์โทรศัทพ์" required>
            <!--label for="phon">เบอร์โทร</-label>
            <input type="text" name="phon"-->
        </div>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">Register</button>
        </div>
        <p>เป็นสมาชิกอยู่แล้ว <a href="login.php">Sign in</a></p>

    </form>

</body>
</html>