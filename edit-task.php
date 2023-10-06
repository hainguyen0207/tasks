<?php
if (!isset($_COOKIE['cookie'])) {
    header('Location: ./login.php');
    exit();
}
require './action.php';
$task_id = $_GET['task_id'];

if (isset($_POST['update_task_info'])) {
    edit_task($_POST, $task_id);
}
if (!$_COOKIE['cookie']) {
    header('Location: ./login.php');
    exit();
}

$page_name = "Edit Task";
include("include/sidebar.php");

$conn = connect_db();
$infor = $conn->prepare("SELECT *FROM task_infor WHERE t_id=:a");
$infor->bindParam(':a', $task_id);
$infor->execute();
$row = $infor->fetch(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


<div class="row">
    <div class="col-md-12">
        <div class="well well-custom">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="well">
                        <h3 class="text-center bg-primary" style="padding: 7px;">Edit Task </h3><br>

                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" role="form" action="" method="post" autocomplete="off">
                                    <div class="form-group">
                                        <label class="control-label col-sm-5">Task Title</label>
                                        <div class="col-sm-7">
                                            <input type="text" placeholder="Task Title" id="task_title" name="task_title" list="expense" class="form-control" value="<?php echo ($row['t_title']); ?>" val required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-5">Task Description</label>
                                        <div class="col-sm-7">
                                            <textarea name="task_description" id="task_description" placeholder="Text Deskcription" class="form-control" rows="5" cols="5"><?php echo ($row['t_description']); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-5">Start Time</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="t_start_time" id="t_start_time" class="form-control" value="<?php echo htmlspecialchars($row['start_time'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-5">End Time</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="t_end_time" id="t_end_time" class="form-control" value="<?php echo htmlspecialchars($row['end_time'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-5">Status</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="status" id="status">
                                                <option value=<?php echo htmlspecialchars("0") ?> <?php if ($row['status'] == 0) { ?>selected <?php } ?>>Incomplete</option>
                                                <option value=<?php echo htmlspecialchars("1") ?> <?php if ($row['status'] == 1) { ?>selected <?php } ?>>In Progress</option>
                                                <option value=<?php echo htmlspecialchars("2") ?> <?php if ($row['status'] == 2) { ?>selected <?php } ?>>Completed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-3">
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" name="update_task_info" class="btn btn-success-custom">Update Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript">
    flatpickr('#t_start_time', {
        enableTime: true
    });
    flatpickr('#t_end_time', {
        enableTime: true
    });
</script>
<?php
include("include/footer.php");
?>