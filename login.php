<?php
require './action.php';

if (isset($_POST['login_btn'])) {
    if (login_check($_POST)) {
        setcookie('cookie', bin2hex(random_bytes(32)), time() + (864000 * 3), './');
        header('Location: ./task-info.php', true, 301);
    } else {
        echo "<script>alert('Invalid username or password !')</script>";
    }
}
if (isset($_POST['register_btn'])) {
    header('Location: ./register.php');
}

$page_name = "Login";
include("include/login_header.php");
?>

<div class="row">
    <div class="col-md-4 col-md-offset-3">
        <div class="well" style="position:relative;top:20vh;">
            <center>
                <h3 style="margin-top:1px;">Task Management</h3>
            </center>
            <form class="form-horizontal form-custom-login" action="" method="POST">
                <div class="form-heading">
                    <h2 class="text-center">Login Panel</h2>
                </div>

                <!-- <div class="login-gap"></div> -->
                <?php if (isset($info)) { ?>
                    <h5 class="alert alert-danger"><?php echo $info; ?></h5>
                <?php } ?>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" />
                </div>
                <div class="form-group" ng-class="{'has-error': loginForm.password.$invalid && loginForm.password.$dirty,
                     'has-success': loginForm.password.$valid}">
                    <input type="password" class="form-control" placeholder="Password" name="password" />
                </div>
                <button type="submit" name="login_btn" class="btn btn-info pull-right">Login</button>
                <button type="submit" name="register_btn" onclick="">Register</button>
            </form>
        </div>
    </div>
</div>
<?php include("include/footer.php") ?>