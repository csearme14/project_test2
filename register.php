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

                        <!-- new 14/4/2564-->
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
        <div class="input-group">
            <label for="phon">เบอร์โทร</label>
            <input type="text" name="phon">
        </div>
        
        <!-- end-->
        <input type="text" name="Number" pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น" required><br/>
        <input type="text" name="Test" pattern="[A-Za-zก-ฮ]{1,}" title="กรอกตัวอักษรเท่านั้น" required>





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