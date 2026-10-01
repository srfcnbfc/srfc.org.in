<!DOCTYPE HTML>
<html lang="en-US">
    <?php
    include 'app/config/front-config.php';
    $blog_slug = htmlspecialchars(mysqli_real_escape_string($conn, filter_input(INPUT_GET, 'blog', FILTER_SANITIZE_URL)));
    $blog_sql = "SELECT * FROM blog WHERE blog_slug='$blog_slug'";
    if (getNumRows($blog_sql) > 0) {
        $blog_row = getsingleData($blog_sql);
        $social_title = $blog_row['blog_title'];
        $social_slug = $site_location;
        $social_img = $blog_row['blog_img'];
        $meta_keyword = $blog_row['blog_tag'];
        $meta_descp = $blog_row['blog_meta_descp'];
    } else {
        echo "<script>window.history.back();</script>";
    }
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
                        <h1> <?= shorter($blog_row['blog_title'], 50); ?> </h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> Blog </li>
                        </ul>
                    </div>
                </div>
                <div class="britcam-shape">
                    <div class="breadcumb-content upp">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> Blog</li>
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
                <div class="col-lg-8">
                    <div class="blog-single-items">
                        <div class="blog-thumb">
                            <img src="upload/blog/<?= $blog_row['blog_img'] ?>" alt="<?= $blog_row['blog_title']; ?>">
                        </div>
                        <div class="blog-content">
                            <div class="blog-content-text text-justify">
                                <h2 class=" text-center"><?= $blog_row['blog_title']; ?></h2>

                                <p class="pt-30 mb-10"><?= $blog_row['blog_descp']; ?>  </p>


                                <?php include 'elements/social-share.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <?php include_once 'elements/service-sidebar.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!-- End Consen service detials Area -->
    <!--==================================================-->
    <?php include 'elements/calculator.php'; ?>
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