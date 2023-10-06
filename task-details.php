<?php

require './action.php';

$task_id = $_GET['task_id'];
if (isset($_POST['update_task_info'])) {
    edit_task($_POST, $task_id);
}
if (!isset($_COOKIE['cookie'])) {
    header('Location: ./login.php');
    exit();
}


$page_name = "Edit Task";
include("include/sidebar.php");

$conn = connect_db();
$infor = $conn->prepare("SELECT * FROM task_infor WHERE t_id=:id");
$infor->bindParam(':id', $task_id);
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
                        <h3 class="text-center bg-primary" style="padding: 7px;">Task Details </h3><br>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-single-product">
                                        <tbody>
                                            <tr>
                                                <td>Task Title</td>
                                                <td><?php echo ($row['t_title']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Description</td>
                                                <td><?php echo ($row['t_description']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Start Time</td>
                                                <td><?php echo htmlspecialchars($row['start_time']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>End Time</td>
                                                <td><?php echo htmlspecialchars($row['end_time']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td><?php if ($row['status'] == 1) {
                                                        echo "In Progress";
                                                    } elseif ($row['status'] == 2) {
                                                        echo "Completed";
                                                    } else {
                                                        echo "Incomplete";
                                                    } ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group">

                                    <div class="col-sm-3">
                                        <a title="Update Task" href="task-info.php"><span class="btn btn-success-custom btn-xs">Go Back</span></a>
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
<?php
include("include/footer.php");
?>