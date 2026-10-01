<?php
include_once '../../app/config/front-config.php';
include_once '../sms/smsapi.php';
$mobile = htmlspecialchars(filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_NUMBER_INT));
$new_mobile = substr($mobile, 0, 4) . "****" . substr($mobile, 7, 4);
$otpData = rand(11111, 99999);
$tokenData = md5($mobile * rand(1, 9));
$otp_query = "SELECT * FROM guest_enquiry WHERE guest_mobile='$mobile'";
$result = mysqli_query($conn, $otp_query)or die(mysqli_error());
$num_row = mysqli_num_rows($result);

if ($num_row > 0) {
    $otp_sql = "UPDATE guest_enquiry SET guest_otp='$otpData', guest_token='$tokenData', guest_verify_status='UNVERIFIED' WHERE guest_mobile='$mobile'";
} else {
    $otp_sql = "INSERT INTO guest_enquiry(guest_mobile, guest_otp, guest_token,guest_verify_status)"
            . "VALUES('$mobile','$otpData','$tokenData','UNVERIFIED')";
}
if ($conn->query($otp_sql) === TRUE) {
    sendsms($mobile, $otpData);  // Send OTP
    ?>

    <div class="modal-content">
        <!-- Modal Body -->
        <div class="modal-body">
            <form id="edit-form" method="POST" class="form-inline" enctype="multipart/form-data">
                <div class="col-12">
                    <p>Please Enter Your OTP <?= $new_mobile; ?></p>
                    <input type="hidden" name="token" value="<?= $tokenData; ?>" required>
                </div>
                <div class="col-12" id="otpform">
                    <input type="tel" name="otp1" class="otp-input" maxlength="1" required>
                    <input type="tel" name="otp2" class="otp-input" maxlength="1" required>
                    <input type="tel" name="otp3" class="otp-input" maxlength="1" required>
                    <input type="tel" name="otp4" class="otp-input" maxlength="1" required>
                    <input type="tel" name="otp5" class="otp-input" maxlength="1" required>

                </div>


                <!-- Modal Footer -->
                <div class="modal-footer align-content-center col-12">
                    <button type="submit" name="update-otp" value="otpcheck" class="btn btn-primary btn-sm w-100">Verify</button>
                </div>
                <!-- /modal footer -->
            </form>
            <div><p id="alert-msg" class="text-center text-danger"></p></div>
        </div>
    </div>
<?php } ?>
<script>
    $(document).ready(function () {
        $("#edit-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "modules/otp/otp-verify.php",
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data[0].task_status === '1')
                    {
                        $("#showModal").modal('hide');
                        var token_Data = data[0].mytoken;
                        window.location = 'verifier/' + token_Data;
                    }
                    {
                        document.getElementById("alert-msg").innerHTML = data[0].message;
                    }
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function () {
        /*  This is for switching back and forth the input box for user experience */
        const inputs = document.querySelectorAll('#otpform > *[class]');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener('keydown', function (event) {
                if (event.key === "Backspace") {
                    if (inputs[i].value === '') {
                        if (i !== 0) {
                            inputs[i - 1].focus();
                        }
                    } else {
                        inputs[i].value = '';
                    }
                } else if (event.key === "ArrowLeft" && i !== 0) {
                    inputs[i - 1].focus();
                } else if (event.key === "ArrowRight" && i !== inputs.length - 1) {
                    inputs[i + 1].focus();
                } else if (event.key !== "ArrowLeft" && event.key !== "ArrowRight") {
                    inputs[i].setAttribute("type", "tel");
                    inputs[i].value = ''; // Bug Fix: allow user to change a random otp digit after pressing it
//                    setTimeout(function () {
//                        inputs[i].setAttribute("type", "password");
//                    }, 1000); // Hides the text after 1 sec
                }
            });
            inputs[i].addEventListener('input', function () {
                inputs[i].value = inputs[i].value.toUpperCase(); // Converts to Upper case. Remove .toUpperCase() if conversion isnt required.
                if (i === inputs.length - 1 && inputs[i].value !== '') {
                    return true;
                } else if (inputs[i].value !== '') {
                    inputs[i + 1].focus();
                }
            });

        }
    });


</script>