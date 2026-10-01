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
                        <li><a href="#" onclick="return false;">Services <span><i class="fas fa-angle-down"></i></span></a>
                            <ul class="sub-menu">
                                <?php foreach ($service_menu_row as $service_menu) { ?>
                                    <li><a href="<?= 'services/' . $service_menu['service_slug']; ?>"><?= $service_menu['service_name']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li><a href="csr">CSR</a></li>
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
                <li><a href="#" onclick="return false;">Services </a>
                    <ul class="sub-menu">
                        <?php foreach ($service_menu_row as $service_menu) { ?>
                            <li><a href="<?= 'services/' . $service_menu['service_slug']; ?>"><?= $service_menu['service_name']; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="csr">CSR</a></li>
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


