<!DOCTYPE html>
<html lang="en">

<head>
    <title>Task Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.theme.min.css">
    <link rel="stylesheet" href="assets/bootstrap-datepicker/css/datepicker.css">
    <link rel="stylesheet" href="assets/bootstrap-datepicker/css/datepicker-custom.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/bootstrap-datepicker/js/datepicker-custom.js"></script>

</head>

<body>

    <nav class="navbar navbar-inverse sidebar navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="task-info.php"><span style="color: #d4ab3a; font-weight: bold;">Hai Do</span></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-nav-custom">
                    <li <?php if ($page_name == "Task_Info") {
                            echo "class=\"active\"";
                        } ?>><a href="task-info.php">Task Mangement<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tasks"></span></a></li>
                    <li><a href="logout.php">Logout<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
                </ul>
            </div>
            <?php

            ?>
        </div>
    </nav>
    <div class="main">
</body>

