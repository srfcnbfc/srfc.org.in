<!--==================================================-->
<!-- Start consen Main Menu Area -->
<!--==================================================-->
<div id="sticky-header" class="consen_nav_manu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="logo">
                    <a class="logo_img" href="/" title="SHRI RAM FINANCE ">
                        <img src="upload/logo.png" alt="logo" width="250px">
                    </a>
                    <a class="main_sticky" href="/" title="consen">
                        <img src="upload/logo-mobile.png" alt="logo" width="250px">
                    </a>
                </div>
            </div>
            <div class="col-lg-9 pl-0 pr-0">
                <nav class="consen_menu">
                    <ul class="nav_scroll">
                        <li><a href="/"><span><i class="fas fa-home"></i></span> Home</a></li>
                        <li><a href="#" onclick="return false;">About Us <span><i class="fas fa-angle-down"></i></span></a>
                            <ul class="sub-menu">
                                <li><a href="about">Company Profile</a></li>
                                <li><a href="board-of-director">Board of Director</a></li>
                            </ul>
                        </li>
                        <li><a href="#" onclick="return false;">Products <span><i class="fas fa-angle-down"></i></span></a>
                            <ul class="sub-menu">
                                <?php foreach ($service_menu_row as $service_menu) { ?>
                                    <li><a href="<?= 'services/' . $service_menu['service_slug']; ?>"><?= $service_menu['service_name']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li><a href="#" onclick="return false;">Discover <span><i class="fas fa-angle-down"></i></span></a>
                        <ul class="sub-menu">
                        <li><a href="#" onclick="return false;">Investor's corner <span><i class="fas fa-angle-right"></i></span></a>
                        <ul class="sub-menu">
                            <li><a href="financial_performance_annual_report.php">Annual return & Reports</a></li>
                            <li><a href="disclosure.php">Disclosure</a></li>
                            <li><a href="investorcorner/policy">Policy</a></li>
                        </ul>
                        
                           <!-- <li><a href="upload/investor-documents/ChargesFY2024-25.pdf">Interest & Charges Schedule FY 2024-25</a></li> -->
                           <li><a href="preview.php">Interest & Charges Schedule FY 2026-27</a></li>
                            <!--<li><a href="upload/docs/Grievance_Redressal_Mechanism.pdf" >Complaints & Grievance</a></li>-->
                            <li><a href="#" onclick="return false;">Grievance Redressal & Customer Support<span><i class="fas fa-angle-right"></i></span></a>
                        <ul class="sub-menu">
                            <li><a href="upload/docs/Customer Grievances Redressal and Escalation Mechanism_with flowchart.pdf">Customer Grievances Redressal and Escalation Mechanism</a></li>
                            <li><a href="upload/docs/Contact Details of Investor Grievance Redressal Officer.pdf">Contact Details of Investor Grievance Redressal Officer  </a></li>
                            <li><a href="upload/docs/Contact Details for Sharing TDS Declaration.pdf">Contact Details for Sharing TDS Declaration – Form 15G / 15H</a></li>
                        </ul> 
                            <li><a href="csr">CSR</a></li>
                        
                        </li>
                        </ul>
                        </li>
                        <li><a href="blog">Blog</a></li>
                        <li><a href="career">Career</a></li>
                        <li><a href="contact">Contact</a></li>
                    </ul>
                    <div class="header-button">
                        <a href="https://sarthi-customer.srfcnbfc.com/login.html" target="_blank"><i class="fa fa-credit-card"></i> Pay EMI</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- consen Mobile Menu Area -->
<div class="mobile-menu-area sticky d-sm-block d-md-block d-lg-none ">
    <div class="mobile-menu">    
        <nav class="consen_menu">
            <ul class="nav_scroll">
                <li><a href="/">Home</a></li>
                <li><a href="#" onclick="return false;">About Us</a>
                    <ul class="sub-menu">
                        <li><a href="about">Company Profile</a></li>
                        <li><a href="board-of-director">Board of Director</a></li>
                    </ul>
                </li>
                <li><a href="#" onclick="return false;">Products </a>
                    <ul class="sub-menu">
                        <?php foreach ($service_menu_row as $service_menu) { ?>
                            <li><a href="<?= 'services/' . $service_menu['service_slug']; ?>"><?= $service_menu['service_name']; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="#" onclick="return false;">Discover <span><i class="fas fa-angle-down"></i></span></a>
                        <ul class="sub-menu">
                        <li><a href="#" onclick="return false;">Investor's corner <span><i class="fas fa-angle-right"></i></span></a>
                        <ul class="sub-menu">
                            <li><a href="financial_performance_annual_report.php">Annual return</a></li>
                            <li><a href="disclosure.php">Disclosure</a></li>
                            <li><a href="investorcorner/policy">Policy</a></li>
                        </ul>
                           <li><a href="upload/investor-documents/ChargesFY2024-25.pdf">Interest & Charges Schedule FY 2026-27</a></li>
                            <!--<li><a href="upload/docs/Grievance_Redressal_Mechanism.pdf" >Complaints & Grievance</a></li>-->
                         <li><a href="#" onclick="return false;">Grievance Redressal & Customer Support <span><i class="fas fa-angle-right"></i></span></a>
                        <ul class="sub-menu">
                            <li><a href="upload/docs/Customer Grievances Redressal and Escalation Mechanism_with flowchart.pdf">Customer Grievances Redressal and Escalation Mechanism</a></li>
                            <li><a href="upload/docs/Contact Details of Investor Grievance Redressal Officer.pdf">Contact Details of Investor Grievance Redressal Officer  </a></li>
                            <li><a href="upload/docs/Contact Details for Sharing TDS Declaration.pdf">Contact Details for Sharing TDS Declaration – Form 15G / 15H</a></li>
                        </ul> 
                         </li>
                            <li><a href="csr">CSR</a></li>
                        
                        </li>
                        </ul>
                        </li>
                <li><a href="blog">Blog</a></li>
                <li><a href="career">Career</a></li>
                <li><a href="contact">Contact</a></li>
            </ul>
            
        </nav>
    </div>
</div>
<!--==================================================-->
<!-- End consen Main Menu Area -->
<!--==================================================-->


