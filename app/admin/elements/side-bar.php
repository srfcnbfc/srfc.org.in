<!-- Page Sidebar Start-->
<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)" title="Edit Profile"><i data-feather="settings"></i></a>
        <img class="img-90 rounded-circle" src="../assets/images/dashboard/1.png" alt="">
        <div class="badge-bottom"><span class="badge badge-primary"><?= htmlspecialchars(get_admin_role()); ?></span></div>
        <a href="#">
            <h6 class="mt-3 f-14 f-w-600"><?= htmlspecialchars(get_admin_name()); ?></h6>
        </a>
        <p class="mb-0 font-roboto text-muted f-12"><?= htmlspecialchars(get_role_label()); ?></p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">           
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Navigation</h6>
                        </div>
                    </li>
                    <li><a class="nav-link menu-title link-nav" href="dashboard"><i data-feather="home"></i><span>Dashboard</span></a></li>

                    <!-- HR Role Modules -->
                    <?php if (has_access(['SUPER_ADMIN', 'HR'])) { ?>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="briefcase"></i><span>Career (HR)</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="vacancy">Job Vacancies</a></li>
                            <li><a href="resume">Candidate Resumes</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="user"></i><span>Employee</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="employee">Employee List</a></li>
                            <li><a href="video-category">Video Category</a></li>
                            <li><a href="video-tutorial">Video Tutorial</a></li>
                            <li><a href="imp-contact">Contacts</a></li>
                            <li><a href="emp-notification">Notifications</a></li>
                        </ul>
                    </li>
                    <?php } ?>

                    <!-- CS / Compliance Role Modules -->
                    <?php if (has_access(['SUPER_ADMIN', 'CS'])) { ?>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="book"></i><span>Compliance & Docs</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="investor-doc-type">Document Type</a></li>
                            <li><a href="upload-investor-docs">Upload Document</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link menu-title link-nav" href="investor"><i data-feather="feather"></i><span>Investors</span></a></li>
                    <?php } ?>

                    <!-- TDS Form 121 (Accounts & CS) -->
                    <?php if (has_access(['SUPER_ADMIN', 'CS', 'ACCOUNTS'])) { ?>
                    <li><a class="nav-link menu-title link-nav" href="tds-declaration"><i data-feather="file-text"></i><span>TDS Form 121</span></a></li>
                    <?php } ?>

                    <!-- Finance & Accounts Role Modules -->
                    <?php if (has_access(['SUPER_ADMIN', 'ACCOUNTS'])) { ?>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="dollar-sign"></i><span>Finance Query</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="refinance-loan">Refinance Loan</a></li>
                            <li><a href="two-wheeler-finance">Two Wheeler Finance</a></li>
                            <li><a href="personal-loan">Personal Loan (Govt.)</a></li>
                            <li><a href="business-loan">Business Loan</a></li>
                            <li><a href="tractor-refinance-loan">Tractor Refinance Loan</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link menu-title link-nav" href="enquiry"><i data-feather="phone-incoming"></i><span>Enquiry</span></a></li>
                    <?php } ?>

                    <!-- Blog (Super Admin, HR, CS) -->
                    <?php if (has_access(['SUPER_ADMIN', 'HR', 'CS'])) { ?>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="edit-3"></i><span>Blog</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="blog">All Blog</a></li>
                            <li><a href="add-blog">Add Blog</a></li>
                        </ul>
                    </li>
                    <?php } ?>

                    <!-- Super Admin Exclusive Modules -->
                    <?php if (has_access(['SUPER_ADMIN'])) { ?>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="shopping-bag"></i><span>Services</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="service-list">All Services</a></li>
                            <li><a href="add-service">Add Service</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link menu-title link-nav" href="testimonial"><i data-feather="package"></i><span>Testimonials</span></a></li>

                    <li class="sidebar-main-title">
                        <div> <h6>Administration</h6></div>
                    </li>
                    <li><a class="nav-link menu-title link-nav" href="admin-users"><i data-feather="users"></i><span>Admin Users & Roles</span></a></li>

                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="settings"></i><span>Settings</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="banner-setting">Banner</a></li>
                            <li><a href="contact-setting">Contact</a></li>
                            <li><a href="socialmedia-setting">Social Media</a></li>
                            <li><a href="seo-setting">Seo</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link menu-title link-nav" href="otplist"><i data-feather="server"></i><span>OTP List</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="backup"><i data-feather="database"></i><span>Backup</span></a></li>
                    <?php } ?>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
<!-- Page Sidebar Ends-->