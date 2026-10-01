<?php
$emp_sql = "SELECT emp_code,emp_id,emp_name FROM employee ORDER by emp_id DESC ";
$emp_row = getData($emp_sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Please Fill All the Details</h5>
    </div>
    <div class="card-body">

        <div class="form theme-form">
            <form autocomplete="off" id="video-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Employee</label>
                            <select name="person_name" class="form-control" required>
                                <option value="ALL">ALL</option>
                                <?php foreach ($emp_row as $key => $emp) { ?>
                                    <option value="<?= $emp['emp_code']?>"><?= $emp['emp_name']?></option>
                                <?php } ?>


                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Notification Details</label>
                            <textarea name="notification_msg" class="form-control"  placeholder="Enter Notification *" required></textarea>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="add_notification" class="btn btn-primary me-3" >Add Notification</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>