<?php
$notification_sql = "SELECT * FROM emp_notification ORDER by notification_id DESC ";
$notification_row = getData($notification_sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Notification List</h5>
    </div>
    <div class="card-body">
        <div class="dt-ext table-responsive">
            <table class="display" id="responsive">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Employee</th>
                        <th>Notification</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($notification_row as $key => $notification) {
                        ?>
                        <tr>
                            <td class="bd-t-none u-s-tb">
                                <?= $i++; ?>
                            </td>
                            <td><?= employeecodecheck($notification['emp_code'])['employee_name']; ?></td>
                            <td><?= $notification['notification_msg']; ?></td>
                            <td><?= $notification['created_at']; ?></td>

                            <td>
                                <button class="btn btn-danger btn-xs delete_data" id="<?= $notification['notification_id']; ?>"><i class="fa fa-trash"></i></button>   
                            </td>

                        </tr>
                    <?php } ?>

                </tbody>

            </table>
        </div>

    </div>

</div>