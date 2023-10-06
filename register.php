
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="./style_register.css">
</head>

<body>

    <form method="post" action="" class="form">
        <h2>Đăng ký thành viên</h2>
        Tên đăng nhập: <input type="text" name="username" required />
        <br>
        <br>
        Mật Khẩu: <input type="password" name="password" required />
        <br>
        <br>
        Nhập Lại Mật Khẩu: <input type="password" name="re_password" required />
        <br>
        <br>
        Email: <input type="text" name="email" required />
        <br>
        <br>
        <input type="submit" name="register" value="Đăng Ký" />

    </form>

</body>

</html>
<?php
require './action.php';
if (isset($_POST['register'])) {
    register_user($_POST);
}