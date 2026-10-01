<!DOCTYPE HTML>
<html lang="en-US">
    <?php
    include 'app/config/front-config.php';
    $job_slug = htmlspecialchars(mysqli_real_escape_string($conn, filter_input(INPUT_GET, 'job', FILTER_SANITIZE_URL)));
    $job_sql = "SELECT * FROM vacancy WHERE job_title_slug='$job_slug'";
    if (getNumRows($job_sql) > 0) {
        $job_row = getsingleData($job_sql);
        $social_title = $job_row['job_title'];
        $social_slug = $site_location;
        $social_img = $job_row['job_img'];
        $meta_keyword = "";
        $meta_descp = "Latest Job Vacancy in India";
    } else {
        echo "<script>window.history.back();</script>";
    }
    ?>
    <?php include 'header.php'; ?>
    <?php
    $vacancy_sql = "SELECT vacancy_id , job_title, job_title_slug,job_designation, job_timing FROM vacancy ORDER by vacancy_id DESC LIMIT 10";
    $vacancy_row = getData($vacancy_sql);
    ?>
    <!--------------------------------------------------->
    <!--Start Header Slider Section -->
    <!--===================================================-->
    <div class="breadcumb-area d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h1> <?= shorter($job_row['job_title'], 50); ?> </h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> Job </li>
                        </ul>
                    </div>
                </div>
                <div class="britcam-shape">
                    <div class="breadcumb-content upp">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> Job</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->


    <!--==================================================-->
    <!-- Start consen service details Area -->
    <!--==================================================-->
    <div class="blog-section style-two details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="blog-single-items">
                        <div class="blog-thumb">
                            <img src="upload/vacancy/<?= $job_row['job_img'] ?>" alt="<?= $job_row['job_title']; ?>">
                        </div>
                        <div class="blog-content">
                            <div class="blog-content-text text-justify">
                                <h2 class=" text-center"><?= $job_row['job_title']; ?></h2><br/>
                                <strong>Designation :</strong>   <?= $job_row['job_designation']; ?> <br/>
                                <strong>Level :</strong>   <?= $job_row['job_designation']; ?> <br/>
                                <strong>Timing :</strong>   <?= $job_row['job_timing']; ?> <br/>

                                <p class="pt-30 mb-10">Job Responsibility :<br/><?= $job_row['job_responsibility']; ?>  </p>


                                <?php include 'elements/social-share.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--==================================================-->
    <!-- End Consen service detials Area -->
    <?php include 'elements/career-apply.php'; ?>
    <?php include 'elements/testimonial.php'; ?>

    <!--------------------------------------------------->
    <?php include 'footer.php'; ?>
    <!------------------Whatsapp---------------------------->
    <script type="text/javascript" async >
        if (typeof wabtn4fg === "undefined") {
            wabtn4fg = 1;
            h = document.head || document.getElementsByTagName("head")[0], s = document.createElement("script");
            s.type = "text/javascript";
            s.src = <?= filter_input(INPUT_SERVER, 'HTTP_HOST'); ?>"/whatsapp.js";
                    h.appendChild(s);
        }
    </script>

    <?php
    mysqli_close($conn);
    ?>
</body>
</html>