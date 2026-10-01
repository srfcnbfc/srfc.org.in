<?php
$testimonial_sql = "SELECT * FROM testimonial WHERE testimonial_status='ACTIVE' ORDER BY testimonial_id DESC";
$testimonial_row = getData($testimonial_sql);
?>
<!--==================================================-->
<!-- Start consen Testimonial Area -->
<!--==================================================-->
<div class="testimonial-area style-two">
    <div class="container">
        <div class="row testi-rotate align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="consen-section-title  pb-50">
                    <h5> Testimonials </h5>
                    <h2> Our Trusted Customers </h2>
                    <h2> Awesome <span> Reviews </span></h2>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 ">
                <div class="row">
                    <div class="col-6">
                        <div class="testi-counter-box upper">
                            <div class="testi-counter-title ">
                                <h3 class="counter text-dark"> 10,000 </h3>
                                <span>+</span>
                                <p class="text-danger"> Happy Customers </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="testi-counter-box">
                            <div class="testi-counter-title">
                                <h3 class="counter text-dark"> 99 </h3>
                                <span>%</span>
                                <p class="text-danger"> Satisfaction Rate </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testi-shape-thumb1 rotateme">
                <img src="upload/other/testimonial-map.png" alt="Shri Ram Finance">
            </div>
        </div>
        <div class="row">
            <div class="testimonial_list owl-carousel">
                <?php foreach ($testimonial_row as $testimonial) { ?>
                    <div class="col-lg-12 pr-1">
                        <div class="testimonial-single-box">
                            <div class="testimonial-content1">
                                <div class="single-quote-icon">
                                    <div class="quote-thumb">
                                        <img src="upload/testimonial/<?= $testimonial['person_img']; ?>" alt="<?= $testimonial['person_name']; ?>">
                                    </div>
                                    <div class="quote-title">
                                        <h4><?= $testimonial['person_name']; ?></h4>
                                        <p><?= $testimonial['person_designation']; ?></p>
                                    </div>
                                </div>
                                <div class="em-testimonial-text">
                                    <p><?= $testimonial['testimonial_description']; ?></p>
                                </div>
                                <div class="em-testi-start-icon">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- testi shape -->
            <div class="testi-shape">
                <div class="testi-shape-thumb">
                    <img src="assets/images/resource/all-shape5.png" alt="Shri Ram Finance">
                </div>
            </div>
        </div>

        <?php include 'investor.php'; ?>
    </div>
</div>
<!--==================================================-->
<!-- End consen Testimonial Area -->
<!--==================================================-->