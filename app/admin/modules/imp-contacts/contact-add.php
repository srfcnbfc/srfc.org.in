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
                            <label>Contact Person Name</label>
                            <input type="text" name="person_name" class="form-control"  placeholder="Enter Person Name*" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Person Mobile</label>
                            <input type="tel" name="person_mobile" maxlength="10" minlength="10" class="form-control"  placeholder="Enter Number *" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Person Designation</label>
                            <input type="text" name="person_designation" class="form-control"  placeholder="Enter Designation *" required>
                        </div>
                    </div>
                     <div class="col">
                        <div class="mb-3">
                            <label>Person Location</label>
                            <input type="text" name="person_location" class="form-control"  placeholder="Enter Location *" required>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="add_contact" class="btn btn-primary me-3" >Add Contact</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>