<?php
@ob_start();
session_start();
if (isset($_SESSION['EmpSessionID'])) {
    header("Location:home.php");
} elseif (!isset($_SESSION['employee_id'])) {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <!------------------------------------------------------------------------------>
    <body class="bg-light">
        <form id="verify-form" action=""method="POST">
            <div class="verify p-4">
                <div class="d-flex align-items-start justify-content-between mb-4">
                    <div>
                        <span class="mdi mdi-account-check-outline display-1 text-primary"></span>
                        <h2 class="my-3 fw-bold">Verification Code</h2>
                        <p class="text-muted mb-0">Enter The Code We Send You?</p>
                    </div>
                </div>
                <div class="d-flex gap-1 mb-2">
                    <div class="col">
                        <input type="text" name="otp1" class="form-control form-control-lg text-center py-3" value="" maxlength="1" required>
                    </div>
                    <div class="col">
                        <input type="text" name="otp2" class="form-control form-control-lg text-center py-3" value="" maxlength="1" required>
                    </div>
                    <div class="col">
                        <input type="text" name="otp3" class="form-control form-control-lg text-center py-3" value="" maxlength="1" required>
                    </div>
                    <div class="col">
                        <input type="text" name="otp4" class="form-control form-control-lg text-center py-3" value="" maxlength="1" required>
                    </div>
                    <div class="col">
                        <input type="text" name="otp5" class="form-control form-control-lg text-center py-3" value="" maxlength="1" required>
                    </div>
                </div>
            </div>

            <div class="footer fixed-bottom m-4">
                <button  type="submit" value="verify" href="home" class="btn btn-info btn-lg w-100 rounded-4">Verify</button>
            </div>
        </form>

        <!------------------------------------------------------------------------------>
        <?php include 'footer-scripts.php'; ?>

        <script>
            $(document).ready(function () {
                $("#verify-form").submit(function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: "otpverify-check.php",
                        method: "post",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            var data = JSON.parse(response);
                            $("#verify-form")[0].reset();
                            if (data[0].otp === 1) {
                                console.log(data[0].msg);
                                window.location.href = "home";
                            } else {
                                console.log(data[0].msg);
                            }
                        }
                    });
                });
            });
        </script>
    </body>
</html>