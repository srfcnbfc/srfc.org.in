<?php
$emp_sql = "SELECT *  FROM employee GROUP BY emp_name ORDER by emp_id DESC ";
$emp_row = getData($emp_sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">All Testimonials List</h5>
    </div>
    <div class="card-body">
        <div class="dt-ext table-responsive">
            <table class="display" id="responsive">
                <thead>
                    <tr>
                        <th>Employee </th>
                        <th>Employee ID</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Job Type</th>
                        <th>Job Location</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($emp_row as $key => $emp) {
                        $emp_check = ($emp['emp_status'] == 'ACTIVE') ? 'CHECKED' : '';
                        ?>
                        <tr>
                            <td><?= $emp['emp_name']; ?></td>
                            <td><?= $emp['emp_code']; ?></td>
                            <td><?= $emp['emp_department']; ?></td>
                            <td><?= $emp['emp_designation']; ?></td>
                            <td><?= $emp['emp_job_type']; ?></td>
                            <td><?= $emp['emp_location']; ?></td>
                            <td><?= $emp['emp_mobile']; ?></td>
                            <td>
                                <div class="media-body icon-state ">
                                    <label class="switch">
                                        <input type="checkbox" <?= $emp_check; ?> value="<?= $emp['emp_status']; ?>" class="changestatus" id="<?= $emp['emp_code']; ?>"><span class="switch-state"></span>
                                    </label>
                                </div>
                            </td>

                            <td>
                                <button class="btn btn-primary btn-xs edit_data" id="<?= $emp['emp_code']; ?>"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger btn-xs delete_data" id="<?= $emp['emp_code']; ?>"><i class="fa fa-trash"></i></button>   
                            </td>

                        </tr>
                    <?php } ?>

                </tbody>

            </table>
        </div>

    </div>

</div>