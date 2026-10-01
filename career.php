<!DOCTYPE HTML>
<html lang="en-US">
    <?php include 'app/config/front-config.php'; 
    $site_title = "Career | Shri Ram Finance Corporation Pvt. Ltd.";
     $site_description = "Shri Ram Finance Corporation Private Limited is one of Central India's fastest growing NBFCs. Founded by Shri Ganesh Bhattar and leading by Shri Gaurav Bhattar. SRFC was incorporated in April 2004 and was involved in Two wheeler finance."; ?>
    <?php
    $vacancy_sql = "SELECT vacancy_id , job_title, job_title_slug,job_designation, job_timing FROM vacancy ORDER by vacancy_id DESC LIMIT 10";
    $vacancy_row = getData($vacancy_sql);
    ?>
    <?php include 'header.php'; ?>

    <!--------------------------------------------------->
    <!--Start Header Slider Section -->
    <!--===================================================-->
    <div class="breadcumb-area d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h1>Career</h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> Career</li>
                        </ul>
                    </div>
                </div>
                <div class="britcam-shape">
                    <div class="breadcumb-content upp">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Career</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ceo-cod-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 wow fadeInLeft" data-wow-delay="0.5s">
                    <div class="consen-section-title">
                        <h2>Explore opportunities</h2>
                        <h3><span>Shri Ram Finance Corporation Pvt. Ltd.</span></h3>
                        <div class="lines style-three pt-20 pb-10">
                            <div class="line"></div>
                        </div>
                        <p class="about-text"> “Leadership is everyone’s responsibility with a career at SRFC India. We expect all our people and enable us to successfully create 360° value.” </p>
                        <p class="about-text2 text-justify">At the heart of every great change is a great human. Every day our People of Change are doing incredible things by working together to pursue our shared purpose–to deliver on the promise of technology and human ingenuity.</p>

                        <p class="about-text2 text-justify">Come be part of our team with Shri ram finance Corporation Pvt. Ltd. India careers – bring your ideas, ingenuity and determination to make a difference, and we’ll solve some of the world’s biggest challenges.</p>    
                    </div>

                </div>
                <div class="col-lg-6 col-md-12 wow fadeInRight" data-wow-delay="0.5s">
                    <div class="dreamit-about-thumb1">
                        <img src="upload/other/job.jpg" alt="Shri ram finance" width="600px">
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <?php include 'elements/career-apply.php'; ?>
    <?php include 'elements/testimonial.php'; ?>
    <!--------------------------------------------------->
    <?php include 'footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>      
    <script>
        $(document).ready(function () {
            $("#job-form").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "modules/resume/resume-save.php",
                    method: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        var data = JSON.parse(response);
                        $("#job-form")[0].reset();
                        swal(data[0].msg, "", data[0].status);
                        setTimeout(function () {
                            window.location = 'career';
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