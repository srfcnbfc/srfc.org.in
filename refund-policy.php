<!DOCTYPE HTML>
<html lang="en-US">
    <?php include 'app/config/front-config.php'; ?>
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
                        <h1>Privacy Policy</h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> Refund Policy</li>
                        </ul>
                    </div>
                </div>
                <div class="britcam-shape">
                    <div class="breadcumb-content upp">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Refund Policy</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ceo-cod-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 wow fadeInLeft" data-wow-delay="0.5s">
                    <div class="consen-section-title">
                        <h2>Refund Policy</h2>
                        <h3><span>Shri Ram Finance Corporation Pvt. Ltd.</span></h3>
                        <div class="lines style-three pt-20 pb-10">
                            <div class="line"></div>
                        </div> 
                        <p class="about-text2 text-justify"> 
In the event a request for refund is made by the User for duplicate, incomplete or rejected transactions, as the case may be, the User agrees that SRFC shall refund such amounts as may be decided by SRFC in its sole discretion from time to time. Also such refund shall be made in accordance with the terms and conditions of the relevant service provider providing the payment gateway services.

                        </p>
                       
                        
                        <h4>COMPANY DETAILS</h4>
                        <p class="about-text2 text-justify">
                            In accordance with Information Technology Act 2000 and rules made there under, the company details are provided below for your reference: <br/>
                            <strong>CIN: </strong> U65100CT2004PTC016590<br/>
                            <strong>Address: </strong> 29B-7 PARISHRAM TOWER, IN FRONT OF T.V. TOWER, ANUPAM NAGAR. SHANKAR NAGAR , Raipur, Chhattisgarh Pincode-492007<br/>
                            <strong>Phone: </strong> +916232246858 <br/>
                            <strong>Email:</strong> support@srfcnbfc.com <br/>
                            <strong>Time:</strong> Mon- sat (10:00 - 19:00)

                        </p>







                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <?php include 'elements/testimonial.php'; ?>
    <!--------------------------------------------------->
    <?php include 'footer.php'; ?>
 
    <?php
    $conn->close();
    ?>
</body>
</html>