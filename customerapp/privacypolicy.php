<!DOCTYPE HTML>
<html lang="en-US">
    <?php include '../app/config/front-config.php'; ?>
    <?php
    $vacancy_sql = "SELECT vacancy_id , job_title, job_title_slug,job_designation, job_timing FROM vacancy ORDER by vacancy_id DESC LIMIT 10";
    $vacancy_row = getData($vacancy_sql);
    ?>
    <?php include '../header.php'; ?>

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
                            <li> Terms & Conditions</li>
                        </ul>
                    </div>
                </div>
                <div class="britcam-shape">
                    <div class="breadcumb-content upp">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Privacy Policy</li>
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
                        <h2>Privacy Policy</h2>
                        <h3><span>Shri Ram Finance Corporation Pvt. Ltd.</span></h3>
                        <div class="lines style-three pt-20 pb-10">
                            <div class="line"></div>
                        </div> 
                        <p class="about-text2 text-justify"> 
                            <strong>Last updated: 01/11/2021</strong></p>
                        
                       <h4>1. Introduction</h4>
        <p>This document serves as the Privacy Policy for the SRFC CustomerApp, operated by Shri Ram Finance Corporation Pvt. Ltd. Our website: <a href="https://www.srfc.org.in/customerapp/privacypolicy" target="_blank">https://www.srfc.org.in/customerapp/privacypolicy</a>. It outlines our practices regarding the collection, use, and protection of personal information from users of our app. Your privacy is critically important to us, and we are committed to safeguarding the information you entrust to us.</p>

        <h4>2. Data Collection and Use</h4>
        <p>When you use the SRFC CustomerApp, we may collect personal data that is essential for providing our services, such as processing loan applications and managing customer accounts. This may include, but is not limited to, your employment details, financial status, and credit history. We use this information to tailor our services to your needs, improve our app's functionality, and comply with legal and regulatory requirements.</p>

        <h4>3. Data Sharing and Disclosure</h4>
        <p>Your personal data may be shared with entities necessary for the provision of our services, such as credit reference agencies, anti-fraud agencies, regulatory bodies, and our technology partners. We ensure that these entities maintain the confidentiality and security of your data and use it solely for the purposes for which we have shared it.</p>

        <h4>4. Data Security</h4>
        <p>We employ advanced security measures to protect your personal data from unauthorized access, alteration, disclosure, or destruction. These measures include encryption, access controls, and secure data storage. We regularly review our security policies and update them as necessary to meet industry standards and technological advancements.</p>

        <h4>5. Your Rights</h4>
        <p>You have the right to access the personal data we hold about you, request corrections or deletions, and object to certain types of processing. If you wish to exercise these rights or have any concerns about how we handle your data, please contact us using the details provided below.</p>

        <h4>6. Changes to This Privacy Policy</h4>
        <p>Our Privacy Policy may be updated periodically to reflect changes in our practices or legal requirements. We encourage you to review this policy regularly to stay informed about how we protect your personal information.</p>

        <h4>7. Contact Us</h4>
        <p>If you have any questions, concerns, or comments about our Privacy Policy, please do not hesitate to contact us at our contact page: <a href="https://www.srfc.org.in/contact" target="_blank">https://www.srfc.org.in/contact</a>. We value your feedback and are dedicated to addressing any privacy concerns you may have.</p>





                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <?php include '../elements/testimonial.php'; ?>
    <!--------------------------------------------------->
    <?php include '../footer.php'; ?>
 
    <?php
    $conn->close();
    ?>
</body>
</html>