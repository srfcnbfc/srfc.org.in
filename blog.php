<!DOCTYPE HTML>
<html lang="en-US">
    <?php
    include 'app/config/front-config.php';
    $site_title = "Blog | Shri Ram Finance Corporation Pvt. Ltd.";
     $site_description = "Shri Ram Finance Corporation Private Limited is one of Central India's fastest growing NBFCs. Founded by Shri Ganesh Bhattar and leading by Shri Gaurav Bhattar. SRFC was incorporated in April 2004 and was involved in Two wheeler finance."; 
    
    ?>
    <?php include 'header.php'; ?>

    <!--------------------------------------------------->
    <div class="breadcumb-area d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h1> Customer Awareness </h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> Customer Awareness</li>
                        </ul>
                    </div>
                </div>
                <div class="britcam-shape">
                    <div class="breadcumb-content upp">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> Customer Awareness</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->

    <!-- Start consen Blog Area -->
    <!--==================================================-->
    <div class="blog-area style-two page">
        <div class="container">
            <div class="row">
                <?php
                foreach ($blog_row as $key => $blog) {
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-box">
                            <div class="single-blog-thumb">
                                <img src="upload/blog/<?= $blog['blog_img']; ?>" alt="<?= $blog['blog_title']; ?>" height="230px">
                                <div class="blog-top-button">
                                    <a href="#"> Shri Ram Finance Corporation Pvt. Ltd. </a>
                                </div>
                            </div>
                            <div class="em-blog-content">
                                <div class="em-blog-title">
                                    <h2> <a href="blogs/<?= $blog['blog_slug']; ?>"> <?= shorter($blog['blog_title'], 50); ?></a> </h2>
                                </div>
                                <div class="em-blog-icon">
                                    <div class="em-blog-thumb">
                                        <img src="upload/other/srfc-circle.png" alt="<?= $blog['blog_title']; ?>" width="30px">
                                    </div>
                                </div>
                                <div class="blog-button">
                                    <a href="blogs/<?= $blog['blog_slug']; ?>"> Learn More <i class="bi bi-plus"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
    <!--==================================================-->

    <?php include 'elements/call-do-action.php'; ?>
    <?php include 'elements/testimonial.php'; ?>


    <!--------------------------------------------------->
    <?php include 'footer.php'; ?>

</body>
</html>