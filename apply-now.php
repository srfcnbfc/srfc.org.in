<!DOCTYPE HTML>
<html lang="en-US">
    <?php include 'app/config/front-config.php'; ?>
    <?php include 'header.php'; ?>
    <?php
    if (isset($_GET['token'])) {
        $tokenvalue = htmlspecialchars(filter_input(INPUT_GET, 'token', FILTER_SANITIZE_STRING));

        $mobile_sql = "SELECT * FROM guest_enquiry WHERE guest_token='$tokenvalue' and guest_verify_status='VERIFIED'";
        $num_row = getNumRows($mobile_sql);
        if ($num_row > 0) {
            $fileopen = 'step2-form.php';
            $mobile = getsingleData($mobile_sql)['guest_mobile'];
        } else {
            echo '<script>window.history.back();</script>';
        }
    } else {
        $fileopen = 'step1-form.php';
    }
    ?>
    <!--==================================================-->
    <div class="breadcumb-area d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h1> Apply for Loan  </h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> Apply for Loan  </li>
                        </ul>
                    </div>
                </div>
                <div class="britcam-shape">
                    <div class="breadcumb-content upp">
                        <ul>
                            <li><a href="index">Home</a></li>
                            <li> Apply for Loan </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->

    <div class="ceo-cod-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 wow fadeInLeft" data-wow-delay="0.5s">
                    <div class="consen-section-title">
                        <h2>Apply for Loan</h2>
                        <h3><span>Shri Ram Finance Corporation Pvt. Ltd.</span></h3>
                        <div class="lines style-three pt-20 pb-10">
                            <div class="line"></div>
                        </div>

                    </div>
                    <div class="contact_from_box">
                        <div class="contact_title pb-4">
                            <p class="about-text2 text-justify"><strong>Please Fill the Form Carefully</strong></p>
                        </div>
                        <?php include $fileopen; ?>

                    </div>

                </div>
                <div class="col-lg-6 col-md-12 wow fadeInRight d-none d-lg-block" data-wow-delay="0.5s">
                    <div class="dreamit-about-thumb1">
                        <img src="upload/other/apply-now.png" alt="Shri ram finance" class="img-fluid">
                    </div>
                    <div class="about-shape-box">
                        <div class="about-shape-thumb bounce-animate">
                            <img src="upload/other/trust.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>










    <?php include 'footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>      
    <?php include 'modules/otp/modal-container.php'; ?>
    <script>
        $(document).ready(function () {
            $("#enquiry-form").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "modules/otp/otp-generate.php",
                    method: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        //var data = JSON.parse(response);
//                        $("#enquiry-form")[0].reset();
//                        swal(data[0].msg, "", data[0].status);

                        $("#modaldetails").html(data);
                        $("#showModal").modal('show');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#serviceData").on("change", function () {
                var code = $("#serviceData").val();
                $.ajax({
                    url: "modules/service/service-select.php",
                    method: "post",
                    data: {service: code},
                    success: function (data) {
                        $("#service-form").html(data);
                    }
                });
            });
        });
    </script>


</body>
</html>