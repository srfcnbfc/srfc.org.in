<div class="card">
    <div class="card-header">
        <h5 class="card-title">Please Fill All the Details</h5>
    </div>
    <div class="card-body">

        <div class="form theme-form">
            <form autocomplete="off" id="my-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Employee Name</label>
                            <input type="text" name="emp_name" class="form-control"  placeholder="Employee name *" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Emp. Code</label>
                            <input type="text" name="emp_code" class="form-control"  placeholder="Employee Code*" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label>Department</label>
                            <input type="text" name="emp_department" class="form-control"  placeholder="Department Name *" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Designation</label>
                            <input type="text" name="emp_designation" class="form-control"  placeholder="Employee Designation. *" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label>Job Type</label>
                            <input type="text" name="emp_job_type"  class="form-control"  placeholder="Job Type*" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Mobile</label>
                            <input type="text" name="emp_mobile"class="form-control"  placeholder="Employee Mobile No. *" required>
                        </div>
                    </div>
                   <div class="col">
                        <div class="mb-3">
                            <label>Job Location</label>
                            <input type="text" name="emp_location" class="form-control"  placeholder="Job Location*" required>         
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="add_employee" class="btn btn-primary me-3" >Add Employee</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>