<!--==================================================-->
<!-- Start consen Main Menu Area (Desktop) -->
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
                            <li><a href="tds-declaration-form-121">TDS Declaration – Form 121</a></li>
                        </ul>
                        
                            <li><a href="preview.php">Interest & Charges Schedule FY 2026-27</a></li>
                            <li><a href="#" onclick="return false;">Grievance Redressal & Customer Support<span><i class="fas fa-angle-right"></i></span></a>
                        <ul class="sub-menu">
                            <li><a href="upload/docs/Customer Grievances Redressal and Escalation Mechanism_with flowchart.pdf">Customer Grievances Redressal and Escalation Mechanism</a></li>
                            <li><a href="upload/docs/Contact Details of Investor Grievance Redressal Officer.pdf">Contact Details of Investor Grievance Redressal Officer  </a></li>
                            <li><a href="tds-declaration-form-121">TDS Declaration – Form 121</a></li>
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

<!--==================================================-->
<!-- Start Modern Mobile Navigation Bar & Drawer (< 992px) -->
<!--==================================================-->
<style>
    /* Hide legacy meanmenu completely */
    .mobile-menu-area,
    .mean-container .mean-bar {
        display: none !important;
    }

    /* ---- Modern Mobile Header Bar ---- */
    .srfc-mobile-header {
        display: none;
        position: sticky;
        top: 0;
        left: 0;
        width: 100%;
        height: 64px;
        background: #ffffff;
        box-shadow: 0 2px 14px rgba(0, 0, 0, 0.08);
        z-index: 99998;
        padding: 0 16px;
        align-items: center;
        justify-content: space-between;
    }

    @media (max-width: 991px) {
        .srfc-mobile-header {
            display: flex !important;
        }
        #sticky-header.consen_nav_manu {
            display: none !important;
        }
    }

    .srfc-m-logo img {
        height: 38px;
        max-width: 180px;
        object-fit: contain;
        display: block;
    }

    .srfc-m-actions {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* Quick Pay EMI Pill Button */
    .srfc-m-payemi-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: linear-gradient(135deg, #ff4d00 0%, #e63900 100%);
        color: #ffffff !important;
        -webkit-text-fill-color: #ffffff !important;
        font-size: 13px;
        font-weight: 700;
        padding: 7px 14px;
        border-radius: 50px;
        text-decoration: none !important;
        box-shadow: 0 4px 12px rgba(255, 77, 0, 0.3);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .srfc-m-payemi-pill:active {
        transform: scale(0.96);
    }

    .srfc-m-payemi-pill i {
        font-size: 12px;
    }

    /* Modern Hamburger Button */
    .srfc-m-hamburger {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 5px;
        cursor: pointer;
        padding: 0;
        transition: all 0.25s ease;
        outline: none !important;
    }

    .srfc-m-hamburger span {
        display: block;
        width: 20px;
        height: 2px;
        background: #0f172a;
        border-radius: 2px;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        transform-origin: center;
    }

    .srfc-m-hamburger.is-active span:nth-child(1) {
        transform: translateY(7px) rotate(45deg);
    }

    .srfc-m-hamburger.is-active span:nth-child(2) {
        opacity: 0;
        transform: scaleX(0);
    }

    .srfc-m-hamburger.is-active span:nth-child(3) {
        transform: translateY(-7px) rotate(-45deg);
    }

    /* ---- Mobile Drawer Backdrop ---- */
    .srfc-drawer-backdrop {
        position: fixed;
        inset: 0;
        background: rgba(7, 25, 47, 0.65);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.35s ease;
        z-index: 99999;
    }

    .srfc-drawer-backdrop.is-open {
        opacity: 1;
        pointer-events: auto;
    }

    /* ---- Mobile Off-Canvas Slide Drawer ---- */
    .srfc-drawer-panel {
        position: fixed;
        top: 0;
        right: 0;
        width: min(340px, 86vw);
        height: 100%;
        height: 100dvh;
        background: #ffffff;
        z-index: 100000;
        transform: translateX(100%);
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        display: flex;
        flex-direction: column;
        box-shadow: -8px 0 35px rgba(0, 0, 0, 0.25);
    }

    .srfc-drawer-panel.is-open {
        transform: translateX(0);
    }

    /* Drawer Top Header */
    .srfc-drawer-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border-bottom: 1px solid #f1f5f9;
        background: #ffffff;
    }

    .srfc-drawer-top img {
        height: 32px;
        max-width: 160px;
        object-fit: contain;
    }

    .srfc-drawer-close {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: #f1f5f9;
        border: none;
        color: #475569;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s;
        outline: none;
    }

    .srfc-drawer-close:hover {
        background: #ff4d00;
        color: #ffffff;
    }

    /* Drawer Toll-Free Call Banner */
    .srfc-drawer-call-banner {
        background: linear-gradient(135deg, #07192f 0%, #0d2847 100%);
        padding: 11px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .srfc-drawer-call-link {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #ffffff !important;
        text-decoration: none !important;
        font-size: 13px;
        font-weight: 500;
    }

    .srfc-drawer-call-link i {
        width: 28px;
        height: 28px;
        background: #22c55e;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 13px;
    }

    .srfc-drawer-call-link strong {
        color: #38bdf8;
        font-weight: 700;
    }

    /* Drawer Nav Scroll Body */
    .srfc-drawer-body {
        flex: 1;
        overflow-y: auto;
        padding: 12px 14px;
        -webkit-overflow-scrolling: touch;
    }

    .srfc-m-nav-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .srfc-m-nav-item {
        margin-bottom: 4px;
    }

    .srfc-m-nav-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 14px;
        color: #1e293b !important;
        font-size: 14.5px;
        font-weight: 600;
        border-radius: 8px;
        text-decoration: none !important;
        transition: background 0.2s, color 0.2s;
    }

    .srfc-m-nav-link i.nav-icon {
        width: 22px;
        color: #0284c7;
        font-size: 15px;
        margin-right: 8px;
        text-align: center;
    }

    .srfc-m-nav-link:hover,
    .srfc-m-nav-link:active {
        background: #f8fafc;
        color: #ff4d00 !important;
    }

    .srfc-m-nav-link:hover i.nav-icon {
        color: #ff4d00;
    }

    /* Submenu Expand Chevron */
    .srfc-m-chevron {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        font-size: 12px;
        transition: transform 0.3s ease;
    }

    .srfc-m-nav-item.is-open > .srfc-m-nav-link .srfc-m-chevron {
        transform: rotate(180deg);
        color: #ff4d00;
    }

    /* Submenu Container */
    .srfc-m-submenu {
        display: none;
        list-style: none;
        padding: 4px 0 6px 14px;
        margin: 0;
    }

    .srfc-m-nav-item.is-open > .srfc-m-submenu {
        display: block;
    }

    .srfc-m-sublink {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 9px 12px;
        color: #475569 !important;
        font-size: 13.5px;
        font-weight: 500;
        border-radius: 6px;
        text-decoration: none !important;
        transition: background 0.2s, color 0.2s;
    }

    .srfc-m-sublink:hover,
    .srfc-m-sublink:active {
        background: #f1f5f9;
        color: #0284c7 !important;
    }

    /* Level 3 Nested Submenu (e.g. Investor's Corner) */
    .srfc-m-nested-item {
        margin: 4px 0;
    }

    .srfc-m-nested-menu {
        display: none;
        list-style: none;
        padding: 4px 0 6px 12px;
        margin: 4px 0 6px 6px;
        border-left: 2px solid #38bdf8;
        background: #f8fafc;
        border-radius: 0 6px 6px 0;
    }

    .srfc-m-nested-item.is-open > .srfc-m-nested-menu {
        display: block;
    }

    .srfc-m-nested-item.is-open > .srfc-m-sublink .srfc-m-chevron {
        transform: rotate(180deg);
        color: #0284c7;
    }

    .srfc-m-nestedlink {
        display: block;
        padding: 7px 10px;
        color: #475569 !important;
        font-size: 13px;
        font-weight: 500;
        border-radius: 4px;
        text-decoration: none !important;
        transition: color 0.2s;
    }

    .srfc-m-nestedlink:hover {
        color: #0284c7 !important;
        background: rgba(2, 132, 199, 0.08);
    }

    /* Drawer Action Bottom */
    .srfc-drawer-footer {
        padding: 14px 18px;
        border-top: 1px solid #f1f5f9;
        background: #ffffff;
    }

    .srfc-drawer-paybtn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        background: linear-gradient(135deg, #ff4d00 0%, #e63900 100%);
        color: #ffffff !important;
        font-size: 14.5px;
        font-weight: 700;
        padding: 12px;
        border-radius: 50px;
        text-decoration: none !important;
        box-shadow: 0 4px 14px rgba(255, 77, 0, 0.35);
        margin-bottom: 12px;
    }

    .srfc-drawer-info {
        text-align: center;
        font-size: 11.5px;
        color: #94a3b8;
        margin: 0;
    }
</style>

<!-- Modern Mobile Top Header -->
<div class="srfc-mobile-header">
    <a href="/" class="srfc-m-logo" title="SHRI RAM FINANCE CORPORATION">
        <img src="upload/logo.png" alt="Shri Ram Finance Corporation" onerror="this.src='upload/logo-mobile.png';">
    </a>

    <div class="srfc-m-actions">
        <a href="https://sarthi-customer.srfcnbfc.com/login.html" target="_blank" rel="noopener" class="srfc-m-payemi-pill">
            <i class="fa fa-credit-card"></i>
            <span>Pay EMI</span>
        </a>

        <button type="button" class="srfc-m-hamburger" id="srfcNavToggle" aria-label="Open Navigation Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</div>

<!-- Backdrop Overlay -->
<div class="srfc-drawer-backdrop" id="srfcDrawerBackdrop"></div>

<!-- Off-Canvas Slide Drawer -->
<div class="srfc-drawer-panel" id="srfcDrawerPanel">
    <!-- Top Header -->
    <div class="srfc-drawer-top">
        <a href="/">
            <img src="upload/logo.png" alt="SRFC Logo" onerror="this.src='upload/logo-mobile.png';">
        </a>
        <button type="button" class="srfc-drawer-close" id="srfcDrawerClose" aria-label="Close Menu">&times;</button>
    </div>

    <!-- Quick Call Banner -->
    <?php if (!empty($mobile_no)): ?>
    <div class="srfc-drawer-call-banner">
        <a href="tel:<?= htmlspecialchars($mobile_no); ?>" class="srfc-drawer-call-link">
            <i class="fa fa-phone"></i>
            <span>Helpline: <strong><?= htmlspecialchars($mobile_no); ?></strong></span>
        </a>
    </div>
    <?php endif; ?>

    <!-- Nav Items Body -->
    <div class="srfc-drawer-body">
        <ul class="srfc-m-nav-list">
            <!-- Home -->
            <li class="srfc-m-nav-item">
                <a href="/" class="srfc-m-nav-link">
                    <span><i class="fa fa-home nav-icon"></i> Home</span>
                </a>
            </li>

            <!-- About Us -->
            <li class="srfc-m-nav-item has-dropdown">
                <a href="#" class="srfc-m-nav-link srfc-toggle-item" onclick="return false;">
                    <span><i class="fa fa-info-circle nav-icon"></i> About Us</span>
                    <span class="srfc-m-chevron"><i class="fa fa-chevron-down"></i></span>
                </a>
                <ul class="srfc-m-submenu">
                    <li><a href="about" class="srfc-m-sublink">Company Profile</a></li>
                    <li><a href="board-of-director" class="srfc-m-sublink">Board of Director</a></li>
                </ul>
            </li>

            <!-- Products -->
            <li class="srfc-m-nav-item has-dropdown">
                <a href="#" class="srfc-m-nav-link srfc-toggle-item" onclick="return false;">
                    <span><i class="fa fa-briefcase nav-icon"></i> Products</span>
                    <span class="srfc-m-chevron"><i class="fa fa-chevron-down"></i></span>
                </a>
                <ul class="srfc-m-submenu">
                    <?php if (!empty($service_menu_row)): ?>
                        <?php foreach ($service_menu_row as $service_menu): ?>
                            <li>
                                <a href="services/<?= htmlspecialchars($service_menu['service_slug']); ?>" class="srfc-m-sublink">
                                    <?= htmlspecialchars($service_menu['service_name']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </li>

            <!-- Discover -->
            <li class="srfc-m-nav-item has-dropdown">
                <a href="#" class="srfc-m-nav-link srfc-toggle-item" onclick="return false;">
                    <span><i class="fa fa-compass nav-icon"></i> Discover</span>
                    <span class="srfc-m-chevron"><i class="fa fa-chevron-down"></i></span>
                </a>
                <ul class="srfc-m-submenu">
                    <!-- Investor's Corner (Level 3) -->
                    <li class="srfc-m-nested-item">
                        <a href="#" class="srfc-m-sublink srfc-toggle-nested" onclick="return false;">
                            <span>Investor's Corner</span>
                            <span class="srfc-m-chevron"><i class="fa fa-chevron-down"></i></span>
                        </a>
                        <ul class="srfc-m-nested-menu">
                            <li><a href="financial_performance_annual_report.php" class="srfc-m-nestedlink">Annual Return & Reports</a></li>
                            <li><a href="disclosure.php" class="srfc-m-nestedlink">Disclosure</a></li>
                            <li><a href="investorcorner/policy" class="srfc-m-nestedlink">Policy</a></li>
                            <li><a href="tds-declaration-form-121" class="srfc-m-nestedlink">TDS Declaration – Form 121</a></li>
                        </ul>
                    </li>

                    <li><a href="preview.php" class="srfc-m-sublink">Interest & Charges Schedule FY 2026-27</a></li>

                    <!-- Grievance Redressal (Level 3) -->
                    <li class="srfc-m-nested-item">
                        <a href="#" class="srfc-m-sublink srfc-toggle-nested" onclick="return false;">
                            <span>Grievance & Support</span>
                            <span class="srfc-m-chevron"><i class="fa fa-chevron-down"></i></span>
                        </a>
                        <ul class="srfc-m-nested-menu">
                            <li><a href="upload/docs/Customer Grievances Redressal and Escalation Mechanism_with flowchart.pdf" target="_blank" class="srfc-m-nestedlink">Customer Grievance Redressal Flowchart</a></li>
                            <li><a href="upload/docs/Contact Details of Investor Grievance Redressal Officer.pdf" target="_blank" class="srfc-m-nestedlink">Grievance Redressal Officer</a></li>
                            <li><a href="upload/docs/Contact Details for Sharing TDS Declaration.pdf" target="_blank" class="srfc-m-nestedlink">Sharing TDS Declaration Form</a></li>
                            <li><a href="tds-declaration-form-121" class="srfc-m-nestedlink">Upload Form 121 (TDS)</a></li>
                        </ul>
                    </li>

                    <li><a href="csr" class="srfc-m-sublink">CSR</a></li>
                </ul>
            </li>

            <!-- Blog -->
            <li class="srfc-m-nav-item">
                <a href="blog" class="srfc-m-nav-link">
                    <span><i class="fa fa-newspaper-o nav-icon"></i> Blog</span>
                </a>
            </li>

            <!-- Career -->
            <li class="srfc-m-nav-item">
                <a href="career" class="srfc-m-nav-link">
                    <span><i class="fa fa-user-plus nav-icon"></i> Career</span>
                </a>
            </li>

            <!-- Contact -->
            <li class="srfc-m-nav-item">
                <a href="contact" class="srfc-m-nav-link">
                    <span><i class="fa fa-envelope-o nav-icon"></i> Contact Us</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Drawer Bottom Actions -->
    <div class="srfc-drawer-footer">
        <a href="https://sarthi-customer.srfcnbfc.com/login.html" target="_blank" rel="noopener" class="srfc-drawer-paybtn">
            <i class="fa fa-credit-card"></i> Pay EMI Online
        </a>
        <p class="srfc-drawer-info">
            RBI Regulated NBFC &bull; Reg. No. 05.01826
        </p>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var navToggle = document.getElementById("srfcNavToggle");
        var drawerClose = document.getElementById("srfcDrawerClose");
        var drawerPanel = document.getElementById("srfcDrawerPanel");
        var drawerBackdrop = document.getElementById("srfcDrawerBackdrop");

        function openDrawer() {
            if (drawerPanel && drawerBackdrop) {
                drawerPanel.classList.add("is-open");
                drawerBackdrop.classList.add("is-open");
                if (navToggle) navToggle.classList.add("is-active");
                document.body.style.overflow = "hidden";
            }
        }

        function closeDrawer() {
            if (drawerPanel && drawerBackdrop) {
                drawerPanel.classList.remove("is-open");
                drawerBackdrop.classList.remove("is-open");
                if (navToggle) navToggle.classList.remove("is-active");
                document.body.style.overflow = "";
            }
        }

        if (navToggle) {
            navToggle.addEventListener("click", function (e) {
                e.preventDefault();
                if (drawerPanel && drawerPanel.classList.contains("is-open")) {
                    closeDrawer();
                } else {
                    openDrawer();
                }
            });
        }

        if (drawerClose) {
            drawerClose.addEventListener("click", function (e) {
                e.preventDefault();
                closeDrawer();
            });
        }

        if (drawerBackdrop) {
            drawerBackdrop.addEventListener("click", closeDrawer);
        }

        // Close on ESC
        document.addEventListener("keydown", function (e) {
            if (e.key === "Escape") closeDrawer();
        });

        // Accordion dropdown toggles (Level 1)
        var toggleItems = document.querySelectorAll(".srfc-toggle-item");
        toggleItems.forEach(function (btn) {
            btn.addEventListener("click", function (e) {
                e.preventDefault();
                var parent = btn.closest(".srfc-m-nav-item");
                if (parent) {
                    var isOpen = parent.classList.contains("is-open");
                    // Optionally close siblings
                    var siblings = parent.parentElement.querySelectorAll(".srfc-m-nav-item.has-dropdown");
                    siblings.forEach(function (sib) {
                        if (sib !== parent) sib.classList.remove("is-open");
                    });
                    if (isOpen) {
                        parent.classList.remove("is-open");
                    } else {
                        parent.classList.add("is-open");
                    }
                }
            });
        });

        // Accordion nested toggles (Level 2)
        var toggleNested = document.querySelectorAll(".srfc-toggle-nested");
        toggleNested.forEach(function (btn) {
            btn.addEventListener("click", function (e) {
                e.preventDefault();
                var parent = btn.closest(".srfc-m-nested-item");
                if (parent) {
                    parent.classList.toggle("is-open");
                }
            });
        });
    });
</script>
<!--==================================================-->
<!-- End consen Main Menu Area -->
<!--==================================================-->
