<!--==================================================-->
<!-- Start consen slider Area -->
<!--==================================================-->
<style>
    /* ---- Custom Modern Hero Slider Styling ---- */
    .slider-area {
        position: relative;
        background: linear-gradient(135deg, #07192f 0%, #0d2847 45%, #081e36 100%);
        min-height: 700px;
        padding: 90px 0 65px;
        overflow: hidden;
        display: flex;
        align-items: center;
        z-index: 1;
    }

    .slider-area .banner-list {
        width: 100%;
        position: relative;
    }

    /* Ambient Background Glow */
    .slider-area::before {
        content: "";
        position: absolute;
        top: -15%;
        right: -10%;
        width: 680px;
        height: 680px;
        background: radial-gradient(circle, rgba(2, 132, 199, 0.22) 0%, rgba(2, 132, 199, 0) 70%);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
        animation: heroAuraPulse 8s ease-in-out infinite alternate;
    }

    .slider-area::after {
        content: "";
        position: absolute;
        bottom: -20%;
        left: 5%;
        width: 520px;
        height: 520px;
        background: radial-gradient(circle, rgba(255, 77, 0, 0.14) 0%, rgba(255, 77, 0, 0) 70%);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
        animation: heroAuraPulse2 10s ease-in-out infinite alternate;
    }

    @keyframes heroAuraPulse {
        0% { transform: scale(1) translate(0, 0); opacity: 0.65; }
        100% { transform: scale(1.15) translate(-30px, 20px); opacity: 0.95; }
    }

    @keyframes heroAuraPulse2 {
        0% { transform: scale(1) translate(0, 0); opacity: 0.5; }
        100% { transform: scale(1.2) translate(25px, -20px); opacity: 0.85; }
    }

    .slider-content {
        position: relative;
        z-index: 2;
        padding-right: 15px;
    }

    /* Top Badge Pill */
    .hero-tag-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(2, 132, 199, 0.16);
        border: 1px solid rgba(56, 189, 248, 0.35);
        color: #38bdf8 !important;
        -webkit-text-fill-color: #38bdf8 !important;
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 13.5px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-bottom: 20px;
        backdrop-filter: blur(8px);
        box-shadow: 0 4px 14px rgba(2, 132, 199, 0.15);
    }

    .pulse-dot {
        width: 8px;
        height: 8px;
        background: #38bdf8;
        border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(56, 189, 248, 0.7);
        animation: pulseAnimation 2s infinite;
        flex-shrink: 0;
    }

    @keyframes pulseAnimation {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(56, 189, 248, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 8px rgba(56, 189, 248, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(56, 189, 248, 0); }
    }

    /* Main Headline */
    .slider-content h1 {
        color: #ffffff !important;
        font-size: clamp(30px, 4.2vw, 54px);
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 18px;
        letter-spacing: -0.5px;
    }

    .slider-content h1 span.highlight {
        background: linear-gradient(135deg, #38bdf8 0%, #60a5fa 50%, #93c5fd 100%) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        color: #38bdf8 !important;
        display: inline-block;
    }

    /* Description */
    .slider-content p {
        color: #d1d9e6 !important;
        font-size: clamp(15px, 1.2vw, 17px);
        line-height: 1.65;
        max-width: 550px;
        margin-bottom: 30px;
        font-weight: 400;
    }

    /* Actions Row */
    .hero-actions-wrap {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 16px;
        margin-bottom: 35px;
    }

    /* Primary Apply Now Button */
    .slider-content .hero-btn-primary,
    .hero-btn-primary {
        display: inline-flex !important;
        align-items: center !important;
        gap: 10px !important;
        background: linear-gradient(135deg, #ff4d00 0%, #e63900 100%) !important;
        color: #ffffff !important;
        -webkit-text-fill-color: #ffffff !important;
        font-weight: 700 !important;
        font-size: 16px !important;
        line-height: 1 !important;
        padding: 15px 34px !important;
        border-radius: 50px !important;
        border: none !important;
        box-shadow: 0 8px 24px rgba(255, 77, 0, 0.4) !important;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
        text-decoration: none !important;
        position: relative !important;
        overflow: hidden !important;
        cursor: pointer !important;
    }

    .slider-content .hero-btn-primary::before,
    .hero-btn-primary::before {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
        transition: left 0.6s ease;
    }

    .slider-content .hero-btn-primary:hover::before,
    .hero-btn-primary:hover::before {
        left: 100%;
    }

    .slider-content .hero-btn-primary:hover,
    .hero-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(255, 77, 0, 0.55) !important;
        color: #ffffff !important;
        -webkit-text-fill-color: #ffffff !important;
    }

    .slider-content .hero-btn-primary i,
    .hero-btn-primary i {
        background: rgba(255, 255, 255, 0.22) !important;
        width: 28px !important;
        height: 28px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        border-radius: 50% !important;
        font-size: 13.5px !important;
        color: #ffffff !important;
        -webkit-text-fill-color: #ffffff !important;
        transition: transform 0.25s ease !important;
    }

    .slider-content .hero-btn-primary:hover i,
    .hero-btn-primary:hover i {
        transform: translateX(4px);
    }

    /* 24x7 Contact Pill */
    .hero-call-pill {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: rgba(15, 23, 42, 0.65);
        border: 1px solid rgba(255, 255, 255, 0.12);
        padding: 8px 18px;
        border-radius: 50px;
        backdrop-filter: blur(6px);
        transition: all 0.3s ease;
    }

    .hero-call-pill:hover {
        background: rgba(15, 23, 42, 0.85);
        border-color: rgba(255, 255, 255, 0.25);
    }

    .hero-call-icon {
        width: 38px;
        height: 38px;
        background: #22c55e;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 16px;
        box-shadow: 0 0 12px rgba(34, 197, 94, 0.45);
    }

    .hero-call-text span {
        display: block;
        font-size: 11px;
        color: #94a3b8 !important;
        -webkit-text-fill-color: #94a3b8 !important;
        font-weight: 500;
        line-height: 1;
        margin-bottom: 3px;
    }

    .hero-call-text a {
        color: #ffffff !important;
        -webkit-text-fill-color: #ffffff !important;
        font-weight: 700;
        font-size: 14.5px;
        text-decoration: none !important;
        transition: color 0.2s ease;
    }

    .hero-call-text a:hover {
        color: #38bdf8 !important;
        -webkit-text-fill-color: #38bdf8 !important;
    }

    /* Right Showcase Column & Visuals */
    .slider-thumb-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .thumb-glow-backdrop {
        position: absolute;
        width: 85%;
        height: 85%;
        background: radial-gradient(circle, rgba(56, 189, 248, 0.22) 0%, rgba(2, 132, 199, 0.05) 60%, transparent 80%);
        border-radius: 50%;
        filter: blur(35px);
        z-index: 1;
        pointer-events: none;
    }

    .hero-main-img {
        position: relative;
        z-index: 2;
        max-width: 100%;
        height: auto;
        max-height: 460px;
        object-fit: contain;
        filter: drop-shadow(0 18px 35px rgba(0, 0, 0, 0.45));
        transition: transform 0.4s ease;
    }

    .slider-thumb-wrapper:hover .hero-main-img {
        transform: translateY(-5px) scale(1.02);
    }

    /* Trust Highlights Strip */
    .hero-trust-strip {
        border-top: 1px solid rgba(255, 255, 255, 0.12);
        margin-top: 26px;
        padding-top: 22px;
        display: flex;
        flex-wrap: wrap;
        gap: 16px 28px;
    }

    .trust-strip-item {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #cbd5e1;
        font-size: 13.5px;
        font-weight: 500;
    }

    .trust-strip-item i {
        font-size: 15px;
    }

    /* Owl Carousel Dots Styling */
    .banner-list .owl-dots {
        position: absolute;
        bottom: 24px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 5;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .banner-list .owl-dot {
        width: 12px;
        height: 6px;
        border-radius: 6px;
        background: rgba(255, 255, 255, 0.35) !important;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        border: none;
        padding: 0 !important;
    }

    .banner-list .owl-dot.active {
        width: 32px;
        background: #ff4d00 !important;
        box-shadow: 0 0 12px rgba(255, 77, 0, 0.65);
    }

    /* Custom Slider Navigation Arrows */
    .hero-nav-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: rgba(15, 23, 42, 0.65);
        border: 1px solid rgba(255, 255, 255, 0.18);
        color: #ffffff;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 6;
        transition: all 0.3s ease;
        backdrop-filter: blur(8px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.35);
        outline: none;
    }

    .hero-nav-arrow:hover {
        background: #ff4d00;
        border-color: #ff4d00;
        color: #ffffff;
        transform: translateY(-50%) scale(1.08);
        box-shadow: 0 8px 25px rgba(255, 77, 0, 0.55);
    }

    .hero-nav-prev {
        left: 20px;
    }

    .hero-nav-next {
        right: 20px;
    }

    /* Fluid Entrance Animations on Slide Active */
    .owl-item.active .hero-tag-badge {
        animation: heroSlideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.1s both;
    }
    .owl-item.active .slider-content h1 {
        animation: heroSlideUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) 0.2s both;
    }
    .owl-item.active .slider-content p {
        animation: heroSlideUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) 0.3s both;
    }
    .owl-item.active .hero-actions-wrap {
        animation: heroSlideUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) 0.4s both;
    }
    .owl-item.active .hero-trust-strip {
        animation: heroSlideUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) 0.5s both;
    }
    .owl-item.active .slider-thumb-wrapper {
        animation: heroSlideRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.25s both;
    }

    @keyframes heroSlideUp {
        from {
            opacity: 0;
            transform: translateY(22px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes heroSlideRight {
        from {
            opacity: 0;
            transform: translateX(28px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Responsive Adjustments */
    @media (max-width: 1200px) {
        .hero-nav-arrow {
            width: 42px;
            height: 42px;
            font-size: 18px;
        }
        .hero-nav-prev { left: 10px; }
        .hero-nav-next { right: 10px; }
    }

    @media (max-width: 991px) {
        .slider-area {
            min-height: auto;
            padding: 65px 0 55px;
        }
        .slider-content {
            text-align: center;
            padding-right: 0;
            margin-bottom: 40px;
        }
        .hero-tag-badge {
            margin: 0 auto 16px;
        }
        .slider-content p {
            margin-left: auto;
            margin-right: auto;
        }
        .hero-actions-wrap {
            justify-content: center;
        }
        .hero-trust-strip {
            justify-content: center;
        }
        .hero-nav-arrow {
            display: none; /* Hide side arrows on tablet/mobile for full swipe usability */
        }
    }

    @media (max-width: 576px) {
        .slider-area {
            padding: 45px 0 45px;
        }
        .hero-actions-wrap {
            flex-direction: column;
            width: 100%;
            gap: 12px;
        }
        .slider-content .hero-btn-primary,
        .hero-btn-primary,
        .hero-call-pill {
            width: 100% !important;
            justify-content: center !important;
        }
        .hero-main-img {
            max-height: 280px;
        }
        .hero-trust-strip {
            gap: 12px 18px;
        }
    }
</style>

<div class="slider-area d-flex align-items-center">
    <!-- Custom Side Navigation Arrows (Desktop) -->
    <button type="button" class="hero-nav-arrow hero-nav-prev" id="heroPrevBtn" aria-label="Previous Slide">
        <i class="fa fa-angle-left"></i>
    </button>
    <button type="button" class="hero-nav-arrow hero-nav-next" id="heroNextBtn" aria-label="Next Slide">
        <i class="fa fa-angle-right"></i>
    </button>

    <div class="banner-list owl-carousel">
        <?php foreach ($banner_row as $key => $banner) { 
            // Determine button destination
            $btn_target = $banner['banner_button'];
            $is_external = (strpos($btn_target, 'http') === 0);
            $btn_url = $is_external ? $btn_target : 'services/' . $btn_target;

            // Formatted Headline with Gradient Accent
            $headline = $banner['banner_headline'];
            if (strpos($headline, '<span') === false) {
                $words = explode(' ', trim($headline));
                if (count($words) >= 4) {
                    $accent_words = array_splice($words, -3);
                    $headline = implode(' ', $words) . ' <span class="highlight">' . implode(' ', $accent_words) . '</span>';
                }
            }
        ?>
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left Column: Content -->
                    <div class="col-lg-7 col-md-12">
                        <div class="slider-content">
                            <!-- Category / Top Tag -->
                            <?php if (!empty($banner['banner_top_msg'])): ?>
                            <div class="hero-tag-badge">
                                <span class="pulse-dot"></span>
                                <?= strip_tags($banner['banner_top_msg']); ?>
                            </div>
                            <?php endif; ?>

                            <!-- Headline -->
                            <h1><?= $headline; ?></h1>

                            <!-- Subheading / Description -->
                            <?php if (!empty($banner['banner_btm_msg'])): ?>
                            <p><?= htmlspecialchars($banner['banner_btm_msg']); ?></p>
                            <?php endif; ?>

                            <!-- Actions Row -->
                            <div class="hero-actions-wrap">
                                <!-- Primary Action: Apply Now -->
                                <a href="<?= htmlspecialchars($btn_url); ?>" class="hero-btn-primary" <?= $is_external ? 'target="_blank" rel="noopener"' : ''; ?>>
                                    Apply Now <i class="fa fa-arrow-right"></i>
                                </a>

                                <!-- Call Support Pill -->
                                <?php if (!empty($mobile_no)): ?>
                                <div class="hero-call-pill">
                                    <div class="hero-call-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="hero-call-text">
                                        <span>Toll Free Support</span>
                                        <a href="tel:<?= htmlspecialchars($mobile_no); ?>"><?= htmlspecialchars($mobile_no); ?></a>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>

                            <!-- Trust Badges Strip -->
                            <div class="hero-trust-strip">
                                <div class="trust-strip-item">
                                    <i class="fa fa-check-circle" style="color: #22c55e;"></i>
                                    <span>RBI Regulated NBFC</span>
                                </div>
                                <div class="trust-strip-item">
                                    <i class="fa fa-bolt" style="color: #f59e0b;"></i>
                                    <span>Quick 24-Hr Disbursal</span>
                                </div>
                                <div class="trust-strip-item">
                                    <i class="fa fa-file-text-o" style="color: #38bdf8;"></i>
                                    <span>Minimal Documentation</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Visual Showcase -->
                    <div class="col-lg-5 col-md-12">
                        <div class="slider-thumb-wrapper">
                            <!-- Ambient Glow Backdrop -->
                            <div class="thumb-glow-backdrop"></div>

                            <!-- Main Vehicle / Loan Graphic (Clean, no overlapping rating overlays) -->
                            <img class="hero-main-img" 
                                 src="upload/slider/<?= htmlspecialchars($banner['banner_img']); ?>" 
                                 alt="<?= htmlspecialchars(strip_tags($banner['banner_headline'])); ?>"
                                 onerror="this.src='assets/images/slider/banner-img.png';">
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Background Accent Shapes -->
    <div class="slider-shape" style="pointer-events: none; opacity: 0.35;">
        <div class="slider-shape-thumb">
            <img src="assets/images/slider/hero-shape.png" alt="Shri Ram Finance">
        </div>
        <div class="slider-shape-thumb2">
            <img src="assets/images/slider/hero-shape2.png" alt="Finance Company">
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Wire up custom desktop arrows with Owl Carousel
        var prevBtn = document.getElementById("heroPrevBtn");
        var nextBtn = document.getElementById("heroNextBtn");
        if (prevBtn && typeof jQuery !== "undefined") {
            prevBtn.addEventListener("click", function(e) {
                e.preventDefault();
                jQuery(".banner-list").trigger("prev.owl.carousel");
            });
        }
        if (nextBtn && typeof jQuery !== "undefined") {
            nextBtn.addEventListener("click", function(e) {
                e.preventDefault();
                jQuery(".banner-list").trigger("next.owl.carousel");
            });
        }
    });
</script>
<!--==================================================-->
<!-- End consen slider Area -->
<!--==================================================-->
