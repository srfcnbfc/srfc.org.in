
<!--==================================================-->
<!-- Start consen Subscribe Area -->
<!--==================================================-->
<div class="subscribe-area style-two mt-5 mt-sm-0">
    <div class="container">
        <div class="subscribe">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="subscribe-title">
                        <h1>Get your Loan in Just 2 Clicks </h1>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <a href="tel:<?= $mobile_no; ?> " class="subscribe-icon">
                        <i class="bi bi-telephone-inbound"></i>
                    </a>
                    <div class="subscribe-title2">
                        <h1> <?= $mobile_no; ?> </h1>
                        <p><?= $email; ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- End consen Subscribe Area -->
<!--==================================================-->

<!--==================================================-->
<!-- Start consen Footer Middle Area -->
<!--==================================================-->
<div class="footer-middle">
    <div class="container">
        <div class="footer-bg">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widgets-company-info mb-4 mb-lg-0">
                        <div class="company-info-desc pr-2">
                            <h4 class="text-white"> Shri Ram Finance Corporation Pvt. Ltd.</h4><br/>
                            <p> <strong>CIN NO. U65100CT2004PTC016590</strong>  </p>
                            
                       
                        <br/>
                        <h5 class="text-white">REGISTERED OFFICE</h5>
                        <p> <strong>Address: </strong> 3rd Floor, Parishram Tower, Shankar Nagar, Raipur, Chhattisgarh, India,  <br/> <strong>Pincode-</strong> 492001 <br/> </p>

                         <h5 class="text-white">HEAD OFFICE / CORPORATE OFFICE</h5>
                        <p> <strong>Address: </strong>  29B-7, Parishram Tower, In Front of T.V. Tower, Anupam Nagar. Shankar Nagar, <br/>Raipur, Chhattisgarh <br/> <strong>Pincode-</strong> 492007 <br/> </p>
                        
                        </div>
                        <div class="follow-company-icon">
                            <a class="social-icon-color" href="<?= $facebook_link; ?>"> <i class="bi bi-facebook"></i> </a>
                            <a class="social-icon-color2" href="<?= $instagram_link; ?>"> <i class="bi bi-instagram"> </i> </a>
                            <a class="social-icon-color1" href="<?= $twitter_link; ?>"> <i class="bi bi-twitter"></i> </a>
                            <a class="social-icon-color3" href="<?= $whatsapp_link; ?>"> <i class="bi bi-whatsapp"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="widget widget-nav-menu">
                        <h4 class="widget-title">Company</h4>
                        <div class="menu-quick-link-content">
                            <ul class="footer-menu">
                                <li><a href="/"> Home </a></li>
                                <li><a href="about"> About Us</a></li>
                                <li><a href="contact"> Contact Us </a></li>
                                <li><a href="https://employee.srfc.org.in"> Employee </a></li>
                                <li><a href="privacy-policy"> Privacy Policy </a></li>
                                <li><a href="terms-and-conditions"> Terms &amp; Conditions</a></li>
                                 <li><a href="refund-policy"> Refund Policy </a></li>
                                 <li><a href="blog"> Customer Awareness </a></li>
                                 <li><a href="upload/docs/Grievance_Redressal_Mechanism.pdf"> Grievance Redressal </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="widget widget-nav-menu">
                        <h4 class="widget-title"> Services </h4>
                        <div class="menu-quick-link-content">
                            <ul class="footer-menu">
                                <?php foreach ($service_menu_row as $service_menu) { ?>
                                    <li><a href="<?= 'services/' . $service_menu['service_slug']; ?>"><?= $service_menu['service_name']; ?></a></li>  
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <?php include 'elements/facebook-pagebox.php'; ?>
                </div>
            </div>
            <div class="foorer-shape">
                <div class="footer-thumb">
                    <img src="assets/images/resource/red-dot.png" alt="Shri Ram Finance">
                </div>
                <div class="footer-thumb1 bounce-animate2">
                    <img src="assets/images/resource/all-shape.png" alt="Shri Ram Finance">
                </div>
            </div>
        </div>

    </div>
    <div class="footer-bottom-area d-flex align-items-center">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6">
                    <div class="footer-bottom-content-copy">
                        <p>© 2023-2025 <span></span> All Rights Reserved.<a href="https://srfc.org.in">Shri Ram Finance Corporation Pvt. Ltd</a></p>
                        </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="footer-bottom-content">
                        <div class="footer-bottom-content-copy">
                          
                            <p> Design By <a href="https://www.multifysolutions.com/">Multify Solutions Pvt. Ltd.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- End consen Footer Middle Area -->
<!--==================================================-->





<!--==================================================-->
<!-- Start scrollup section Area -->
<!--==================================================-->
<!-- scrollup section -->
<div class="scroll-area">
    <div class="top-wrap">
        <div class="go-top-btn-wraper">
            <div class="go-top go-top-button">
                <i class="fas fa-arrow-up"></i>
                <i class="fas fa-arrow-up"></i>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- Start scrollup section Area -->
<!--==================================================-->
<?php include 'footer-scripts.php'; ?>