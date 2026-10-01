<form action="#" method="POST" id="final-form">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="applicantname">Applicant Name</label>
            <input type="text" name="applicant_name" class="form-control" id="applicantname" placeholder="Enter Applicant Name" pattern="([A-z0-9À-ž\s]){3,}" minlength="3" required value="">
        </div>
        <div class="form-group col-md-6">
            <label for="applicantmobile">Mobile No.</label>
            <input type="hidden" name="token" value="<?= $tokenvalue ?>" required>
            <input type="tel" class="form-control" pattern="[6-9]{1}[0-9]{9}" minlength="10" maxlength="10" required value="<?= $mobile; ?>" disabled>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="serviceData">Loan For</label>
            <select id="serviceData" class="form-control" name="application_type" required>
                    <option value="" disabled selected>--Select Loan--</option>
                    <option value="Two Wheeler Finance">Two Wheeler Finance</option>
                    <option value="Refinance Loan">Refinance Loan</option>
                    <option value="Personal Loan">Personal Loan</option>
                    <option value="Business Loan">Business Loan</option>
                    <option value="Tractor Refinance">Tractor Refinance </option>
                </select>
        </div>
    </div>

    <div id="service-form"></div>



    <div class="col-lg-12">
        <div class="quote_button">
            <button class="btn" type="submit" name="applynow" value="submit"> <i class="fa fa-thumbs-up"></i> Apply Now </button>
        </div>
    </div>

</form>
