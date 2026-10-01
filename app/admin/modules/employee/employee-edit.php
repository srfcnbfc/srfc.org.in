<?php
if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $emp_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    $sql = "SELECT * FROM employee WHERE emp_code= '$emp_code'";
    $emp_data = getsingleData($sql);
    ?>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit the Employee Details</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form theme-form">
                <form autocomplete="off" id="edit-form" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Employee Name</label>
                                <input type="hidden" name="emp_code" value="<?= $emp_code; ?>" required>
                                <input type="text" name="emp_name" value="<?= $emp_data['emp_name']; ?>" class="form-control"  placeholder="Employee Name *" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label>Employee Mobile</label>
                                <input type="text" name="emp_mobile" value="<?= $emp_data['emp_mobile']; ?>" class="form-control"  placeholder="Employee Mobile No. *" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Department</label>
                                <input type="text" value="<?= $emp_data['emp_department']; ?>" name="emp_department" class="form-control"  placeholder="Department Name *" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label>Job Location</label>
                                <input type="text" name="emp_location" value="<?= $emp_data['emp_location']; ?>" class="form-control"  placeholder="Job Location*" required>         
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Employee Designation</label>
                            <input type="text" name="emp_designation" value="<?= $emp_data['emp_designation']; ?>" class="form-control"  placeholder="Employee Designation. *" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label>Employee Job Type</label>
                            <input type="text" name="emp_job_type" value="<?= $emp_data['emp_job_type']; ?>"  class="form-control"  placeholder="Job Type*" required>
                        </div>
                    </div>
                </div>



                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="updatedata" value="client_update">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#chkimg').change(function () {
                var changeimg = document.getElementById("imagechange");
                changeimg.disabled = chkimg.checked ? false : true;
                if (!changeimg.disabled) {
                    changeimg.focus();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#edit-form").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "modules/employee/employee-update.php",
                    method: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        var data = JSON.parse(response);
                        $("#edit-form")[0].reset();
                        swal(data[0].msg, "", data[0].status);
                        setTimeout(function () {
                            window.location = window.location;
                        }, 2000);
                    }
                });
            });
        });

    </script>
    <?php
}
?>
