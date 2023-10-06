<?php
require './action.php';
$page_name = "Task_Info";

include("include/sidebar.php");
if (!isset($_COOKIE['cookie'])) {
    header('Location: ./login.php');
    exit();
}
if (isset($_POST['add_task_post'])) {
    add_task($_POST);
}

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog add-category-modal">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title text-center">Assign New Task</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" action="" method="post" autocomplete="off">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-5">Task Title</label>
                                    <div class="col-sm-7">
                                        <input type="text" placeholder="Task Title" id="task_title" name="task_title" list="expense" class="form-control" id="default" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5">Task Description</label>
                                    <div class="col-sm-7">
                                        <textarea name="task_description" id="task_description" placeholder="Text Description" class="form-control" rows="5" cols="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5">Start Time</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="t_start_time" id="t_start_time" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5">End Time</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="t_end_time" id="t_end_time" class="form-control">
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-3">
                            <button type="submit" name="add_task_post" class="btn btn-success-custom">Assign Task</button>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-danger-custom" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="well well-custom">
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-8">
                    <div class="btn-group">
                        <div class="btn-group">
                            <button class="btn btn-warning btn-menu" data-toggle="modal" data-target="#myModal">Assign New Task</button>
                        </div>
                    </div>
                </div>

            </div>
            <center>
                <h3>Task Management Section</h3>
            </center>
            <div class="gap"></div>
            <div class="gap"></div>

            <div class="table-responsive">
                <table class="table table-codensed table-custom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task Title</th>
                            <th>Description tile</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = 'SELECT * FROM task_infor';
                        $info = execute_query($sql);
                        $serial = 1;
                        $num_row = $info->rowCount();
                        if ($num_row == 0) {
                            echo '<tr><td colspan="7">No Data found</td></tr>';
                        }
                        while ($row = $info->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $serial;
                                    $serial++; ?></td>
                                <td><?php echo ($row['t_title']); ?></td>
                                <td><?php echo ($row['t_description']); ?></td>
                                <td><?php echo ($row['start_time']); ?></td>
                                <td><?php echo ($row['end_time']); ?></td>
                                <td>
                                    <?php if ($row['status'] == 1) {
                                        echo "In Progress <span style='color:#d4ab3a;' class=' glyphicon glyphicon-refresh' >";
                                    } elseif ($row['status'] == 2) {
                                        echo "Completed <span style='color:#00af16;' class=' glyphicon glyphicon-ok' >";
                                    } else {
                                        echo "Incomplete <span style='color:#d00909;' class=' glyphicon glyphicon-remove' >";
                                    } ?>
                                </td>
                                <td><a title="Update Task" href="edit-task.php?task_id=<?php echo $row['t_id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;
                                    <a title="View" href="task-details.php?task_id=<?php echo $row['t_id']; ?>"><span class="glyphicon glyphicon-folder-open"></span></a>&nbsp;&nbsp;
                                    <a title="Delete" href="javascript:void(0);" onclick="delete_task(<?php echo $row['t_id']; ?>)"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="pagination">
    <?php
    ?>
</div>

<!-- delete task  -->
<script>
    function delete_task(task_id) {
        if (confirm("Bạn có chắc chắn muốn xóa task này không?")) {
            $.ajax({
                url: 'action.php',
                type: 'POST',
                data: {
                    action: 'delete_task',
                    task_id: task_id
                },
                success: function(response) {
                    if (response === 'success') {
                        location.reload();
                    } else {
                        location.reload();
                    }
                }
            });
        }
    }
</script>


<?php
include("include/footer.php");
?>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript">
    flatpickr('#t_start_time', {
        enableTime: true
    });
    flatpickr('#t_end_time', {
        enableTime: true
    });
</script>