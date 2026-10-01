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
                            <label>Job Title</label>
                            <input type="text" name="job_title" id="category_name" class="form-control"  placeholder="Enter Job Title*" required>
                            <input type="hidden" name="job_title_slug" id="category_slug" class="form-control" required> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Job Designation</label>
                            <input type="text" name="job_designation" class="form-control"  placeholder="Job Designation *" required>         
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Skill Level</label>
                            <select class="form-control" name="candidate_level" required>
                                <option value="" disabled selected>--Select Level--</option>
                                <option>Fresher</option>
                                <option>Experience</option>
                                <option>Both (Experience & Fresher)</option>
                            </select>      
                        </div>
                    </div>
                     <div class="col">
                        <div class="mb-3">
                            <label>Job Timing</label>
                            <select class="form-control" name="job_timing" required>
                                <option value="" disabled selected>--Select Timing--</option>
                                <option>Full Time</option>
                                <option>Part Time</option>
                            </select>      
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Job Responsibility Handled</label>
                            <textarea name="job_responsibility"class="form-control" id="exampleFormControlTextarea4" rows="3" required="" placeholder="Job Responsibility Handled"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Job Image</label>
                            <input type="file" name="job_img" class="form-control" accept="image/png, image/jpeg" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="add_data" class="btn btn-primary me-3" >Add Vacancy</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>