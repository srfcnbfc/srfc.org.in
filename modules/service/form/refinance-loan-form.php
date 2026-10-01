<div class="form-row">
    <div class="form-group col-md-6">
        <label for="applicantbike">Bike Brand</label>
        <input type="text" name="bike_brand" class="form-control" id="applicantbike" placeholder="Enter Bike Brand"  required value="">
    </div>
    <div class="form-group col-md-6">
        <label for="applicantmodel">Bike Model</label>
        <input type="text" name="bike_model" class="form-control" id="applicantmodel" required placeholder="Enter Bike Model">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="applicantbikeregno">Bike Registration No.</label>
        <input type="text" name="bike_reg_no" class="form-control" id="applicantbikeregno" placeholder="Enter Bike Registration No."  required value="">
    </div>
    <div class="form-group col-md-6">
        <label for="applicantregyear">Bike Registration Year</label>
        <input type="year" name="bike_reg_year" class="form-control" id="applicantregyear" required placeholder="Enter Bike Registration Year" maxlength="4" minlength="4">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="postalcode">Pin Code</label>
        <input type="tel" name="pincode" class="form-control" id="postalcode" placeholder="Enter Pin Code" pattern="[0-9]{6}" minlength="6" maxlength="6" required value="">
    </div>
    <div class="form-group col-md-4">
        <label for="applicantcity">City</label>
        <input type="text" name="applicant_city" class="form-control" id="applicantcity" required readonly placeholder="Enter City">
    </div>
    <div class="form-group col-md-4">
        <label for="applicantstate">State</label>
        <input type="text" name="applicant_state" class="form-control" id="applicantstate" required readonly placeholder="Enter State">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="applicantaddress">Address</label>
        <textarea name="applicant_address" class="form-control" id="applicantaddress" placeholder="Enter Your Address" required value=""></textarea>
    </div>

</div>


<script>
    $(document).ready(function () {
        $("#postalcode").on("keyup change", function () {
            var pincode = $("#postalcode").val();
            if (pincode === '') {
                jQuery('#applicantcity').val('');
                jQuery('#applicantstate').val('');
            } else if (pincode.length === 6) {
                console.log(pincode);
                $.ajax({
                    url: "modules/service/findlocation.php",
                    method: "POST",
                    data: {pincode: pincode},
                    success: function (data) {
                        if (data === 'no') {
                            alert('Wrong Pincode');
                            jQuery('#applicantcity').val('');
                            jQuery('#applicantstate').val('');
                        } else {
                            var getData = $.parseJSON(data);
                            jQuery('#applicantcity').val(getData.city);
                            jQuery('#applicantstate').val(getData.state);
                        }
                    }
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#final-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "modules/service/form/refinance-loan-save.php",
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    var data = JSON.parse(response);
//                        $("#final-form")[0].reset();

                    console.log(data);
                    swal(data[0].msg, "", data[0].status);
                    setTimeout(function () {
                        window.location = 'apply-now';
                    }, 2000);
                }
            });
        });
    });
</script>