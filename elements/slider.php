<!--==================================================-->
<!-- Start consen slider Area -->
<!--==================================================-->
<div class="slider-area d-flex align-items-center ">
    <div class="banner-list owl-carousel">
        <?php foreach ($banner_row as $key => $banner) { ?>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider-content">
                            <h3> <?= $banner['banner_top_msg']?></h3>
                            <h1> <?= $banner['banner_headli ne']?> </h1>
                            <p>  <?= $banner['banner_btm_msg']?></p>
                        </div>
                        <div class="lines pt-20 pb-40">
                            <div class="line"></div>
                        </div>
                        <div class="banner-buttons">
                            <div class="slider-button">
                                
                                 <?php if (strpos($banner['banner_button'], 'http') === 0): ?>
                                    <a href="<?= $banner['banner_button'] ?>"> Apply Now <i class="bi bi-plus"></i> </a>
                                <?php else: ?>
                                    <a href="services/<?= $banner['banner_button'] ?>"> Apply Now <i class="bi bi-plus"></i> </a>
                                <?php endif; ?>
                                <!--<a href="services/<?= $banner['banner_button']?>"> Apply Now <i class="bi bi-plus"></i> </a>-->
                                <!--<a href="https://apply.srfc.org.in/"> Apply Now <i class="bi bi-plus"></i> </a>-->
                            </div>
                            <div class="slider-contact-box">
                                <a class="contact-icon" href="tel:<?= $mobile_no; ?>"><img src="assets/images/slider/call.png" alt="call icon"></a>

                                <div class="contact-number">
                                    <span> Call 24x7 </span>
                                    <h3><a href="tel:<?= $mobile_no; ?>"><?= $mobile_no; ?></a> </h3>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-5 col-md-6 ">
                        <div class="slider-thumb">
                            <img src="upload/slider/<?= $banner['banner_img']?>" alt="<?= $banner['banner_headline']?>">
                        </div>
                        
                    </div>

                </div>
            </div>
        <?php } ?>

    </div>
    <!-- slider shape -->
    <div class="slider-shape">
        <div class="slider-shape-thumb">
            <img src="assets/images/slider/hero-shape.png" alt="Shri Ram Finance">
        </div>
        <div class="slider-shape-thumb2">
            <img src="assets/images/slider/hero-shape2.png" alt="Finance Comapny">
        </div>
    </div>

</div>
<!--==================================================-->
<!--End consen slider Area  -->
<!--==================================================-->


