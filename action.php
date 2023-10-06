<?php
// if (!isset($_COOKIE['cookie'])) {
//     header('Location: ./login.php');
//     exit();
// }
function connect_db()
{
    try {
        return new PDO("mysql:host=localhost;dbname=tasks", "root", "");
    } catch (Throwable $message) {
        echo $message->getMessage();
        return null;
    }
}

//filter input
function filter_input_data($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    return htmlspecialchars($data);
}

//execute query
function execute_query($sql)
{
    try {
        $conn = connect_db();
        $infor = $conn->prepare($sql);
        $infor->execute();
        return $infor;
    } catch (Throwable $message) {
        echo $message->getMessage();
    }
}

// check login
function login_check($data)
{
    $username = filter_input_data($data['username']);
    $password = $data['password'];

    try {
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=:a");
        $stmt->bindParam(':a', $username);
        $stmt->execute();
        $user_row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            if (password_verify($password, $user_row['password'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } catch (Throwable $message) {
        echo $message->getMessage();
        return false;
    }
}

function is_username_exists($username)
{
    try {
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    } catch (Throwable $message) {
        echo $message->getMessage();
        return false;
    }
}



function register_user($data)
{
    $username = filter_input_data($data['username']);
    $password = $data['password'];
    $re_password = $data['re_password'];
    $email = filter_input_data($data['email']);
    if (empty($username) || empty($password) || empty($re_password) || empty($email)) {
        echo "<script>alert('Các trường dữ liệu không được rỗng !')</script>";
        header('Location: ./login.php');
        exit();
    } else {
        if (is_username_exists($username)) {
            echo "<script>alert('Tên người dùng đã tồn tại trong cơ sở dữ liệu.')</script>";
            // header('Location: ./login.php');
            exit();
        } else {
            if ($password !== $re_password) {
                echo "<script>alert('Mật khẩu không trùng khớp')</script>";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $conn = connect_db();
                $add_user = $conn->prepare("INSERT INTO users(username,password,email) VALUES(:a,:b,:c)");
                $add_user->bindParam(':a', $username);
                $add_user->bindParam(':b', $hashed_password);
                $add_user->bindParam(':c', $email);
                $add_user->execute();
                echo "<script>alert('Add user success');window.location.href='./login.php';</script>";
            }
        }
    }
}

// add task

function add_task($data)
{
    $t_title = filter_input_data($data['task_title']);
    $t_description = filter_input_data($data['task_description']);
    $start_time = filter_input_data($data['t_start_time']);
    $end_time = filter_input_data($data['t_end_time']);
    $status = 0;
    if (!empty($t_title) && !empty($t_description) && !empty($start_time) && !empty($end_time)) {
        $conn = connect_db();
        try {
            $add_task = $conn->prepare("INSERT INTO 
            task_infor(t_title,t_description,start_time,end_time,status) 
            VALUES(:a,:b,:c,:d,:e)");
            $add_task->bindParam(':a', $t_title);
            $add_task->bindParam(':b', $t_description);
            $add_task->bindParam(':c', $start_time);
            $add_task->bindParam(':d', $end_time);
            $add_task->bindParam(':e', $status);
            $add_task->execute();
            header('Location: task-info.php', true, 301);
        } catch (Throwable $message) {
            $message->getMessage();
        }
    } else {
        echo "<script>alert('Các trường dữ liệu không được rỗng')</script>";
    }
}
// edit task 
function edit_task($data, $t_id)
{
    $t_title = filter_input_data($data['task_title']);
    $t_description = filter_input_data($data['task_description']);
    $start_time = filter_input_data($data['t_start_time']);
    $end_time = filter_input_data($data['t_end_time']);
    $status = $data['status'];
    if ($status == '0' || $status == '1' || $status == '2') {
        $status = (int) $status;
    } else {
        $status = 0;
    }
    if (!empty($t_title) && !empty($t_description) && !empty($start_time) && !empty($end_time)) {
        $conn = connect_db();
        try {
            $update_task = $conn->prepare("UPDATE task_infor SET t_title = :a, t_description = :b,
             start_time = :c, end_time = :d, status = :e WHERE t_id = :id ");
            $update_task->bindParam(':a', $t_title);
            $update_task->bindParam(':b', $t_description);
            $update_task->bindParam(':c', $start_time);
            $update_task->bindParam(':d', $end_time);
            $update_task->bindParam(':e', $status);
            $update_task->bindParam(':id', $t_id);
            $update_task->execute();
            echo "<script>window.location.href = './task-info.php';</script>";
        } catch (Throwable $message) {
            $message->getMessage();
        }
    } else {
        echo "<script>alert('Các trường dữ liệu không được rỗng')</script>";
    }
}
// Xóa task
if (isset($_POST['action']) && $_POST['action'] == 'delete_task') {
    $task_id = $_POST['task_id'];
    try {
        $conn = connect_db();
        $delete_task = $conn->prepare("DELETE FROM task_infor WHERE t_id = :task_id");
        $delete_task->bindParam(':task_id', $task_id);
        $delete_task->execute();
        echo 'success';
    } catch (Throwable $message) {
        echo 'error';
    }
    exit;
}