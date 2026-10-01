<!DOCTYPE HTML>
<html lang="en-US">
    <?php include 'app/config/front-config.php'; 
    $site_title = "Contact | Shri Ram Finance Corporation Pvt. Ltd.";
     $site_description = "Shri Ram Finance Corporation Private Limited is one of Central India's fastest growing NBFCs. Founded by Shri Ganesh Bhattar and leading by Shri Gaurav Bhattar. SRFC was incorporated in April 2004 and was involved in Two wheeler finance."; ?>
    <?php include 'header.php'; ?>
    <!--------------------------------------------------->
    <!--==================================================-->
    <!--Start Header Slider Section -->
    <!--===================================================-->
    <div class="breadcumb-area d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h1> Our Service </h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> Our Service </li>
                        </ul>
                    </div>
                </div>
                <div class="britcam-shape">
                    <div class="breadcumb-content upp">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li> Our Service </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--==================================================-->
    <!-- Start consen service Area -->
    <!--==================================================-->
    <div class="body-area">
        <div class="container">
            <div class="row align-items-center mb-10">
                <div class="col-lg-7 col-md-8 pl-0">
                    <div class="consen-section-title mobile-center">
                        <h2> We Run All Kinds Of Services</h2>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4">
                    <div class="consen-button text-right">
                        <a href="service.html"> All Service <i class="bi bi-plus"></i> </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 pl-0 pr-0">
                    <div class="contact_from_box">
                        <div class="contact_title pb-4">
                            <h3>Get In Touch</h3>
                        </div>
                        <form action="#" method="POST" id="enquiry-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form_box mb-30">
                                        <input type="text" name="enq_name" placeholder="Name" pattern="([A-z0-9À-ž\s]){3,}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_box mb-30">
                                        <input type="text" name="enq_mobile" placeholder="Phone Number" pattern="[6-9]{1}[0-9]{9}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_box mb-30">
                                        <input type="email" name="enq_email" placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                    </div>
                                </div>



                                <div class="col-lg-12">
                                    <div class="form_box mb-30">
                                        <textarea name="enq_msg" id="message" cols="30" rows="10"
                                                  placeholder="Your Message"></textarea>
                                    </div>
                                    <div class="quote_button">
                                        <button class="btn" type="submit"> <i class="bi bi-gear"></i> Enquiry Here
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="status"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 pl-0 pr-0">
                    <div class="cda-content-area">
                        <div class="cda-single-content d-flex">
                            <div class="cda-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="cda-content-inner">
                                <h4>Company Location</h4>
                                <p><?= $office_hq_adress; ?></p>
                            </div>
                        </div>
                        <div class="cda-single-content hr d-flex">
                            <div class="cda-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="cda-content-inner">
                                <h4>Telephone Number</h4>
                                <p><?= $mobile_no; ?></p>
                            </div>
                        </div>
                        <div class="cda-single-content hr d-flex">
                            <div class="cda-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="cda-content-inner">
                                <h4>Our Email Address</h4>
                                <p><?= $email; ?></p>
                            </div>
                        </div>
                        <div class="cda-single-content hr d-flex">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!-- End consen service Area -->
    <!--==================================================-->

    <?php include 'elements/branch-query.php'; ?>



    <!--------------------------------------------------->

    <?php include 'footer-2.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>      
    <script>
        $(document).ready(function () {
            $("#enquiry-form").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "modules/contact/contact-save.php",
                    method: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        var data = JSON.parse(response);
                        $("#enquiry-form")[0].reset();
                        swal(data[0].msg, "", data[0].status);
                        setTimeout(function () {
                            window.location = 'contact';
                        }, 2000);
                    }
                });
            });
        });
    </script>


    <?php
    $conn->close();
    ?>
</body>
</html>