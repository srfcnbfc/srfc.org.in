<!DOCTYPE HTML>
<html lang="en-US">

<?php include 'app/config/front-config.php'; ?>
<?php include 'header.php'; ?>

<style>
    .pdf-preview-area {
        padding: 60px 0;
    }

    .preview-header {
        text-align: center;
        margin-bottom: 30px;
        color: #2c3e50;
    }

    .preview-header h2 {
        font-weight: 700;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .preview-header h2:after {
        content: '';
        position: absolute;
        width: 60%;
        height: 4px;
        background: linear-gradient(90deg, #3498db, #8e44ad);
        bottom: -10px;
        left: 20%;
        border-radius: 2px;
    }

    .preview-header p {
        color: #7f8c8d;
        max-width: 700px;
        margin: 0 auto;
    }

    .pdf-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 20px;
    }

    .pdf-viewer {
        position: relative;
        padding-bottom: 60%;
        height: 0;
        overflow: hidden;
        border-radius: 8px;
        background: #f1f8ff;
        border: 1px solid #e0e0e0;
    }

    .pdf-viewer iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }

    .pdf-controls {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 20px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px;
    }

    .btn-pdf {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-download {
        background: linear-gradient(90deg, #3498db, #2980b9);
        color: white;
        border: none;
    }

    .btn-download:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        color: white;
    }

    .btn-fullscreen {
        background: linear-gradient(90deg, #9b59b6, #8e44ad);
        color: white;
        border: none;
    }

    .btn-fullscreen:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(155, 89, 182, 0.4);
        color: white;
    }

    .btn-native {
        background: linear-gradient(90deg, #f39c12, #e67e22);
        color: white;
        border: none;
    }

    .btn-native:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(243, 156, 18, 0.4);
        color: white;
    }

    .btn-open {
        background: #2c3e50;
        color: white;
        border: none;
    }

    .btn-open:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(44, 62, 80, 0.4);
        color: white;
    }

    .pdf-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 15px;
        padding: 10px 15px;
        background: #e8f4fc;
        border-radius: 8px;
        font-size: 14px;
    }

    .pdf-info div {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #34495e;
    }

    .loading-indicator,
    .fallback-indicator {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #7f8c8d;
        z-index: 1;
        width: 80%;
    }

    .spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left: 4px solid #3498db;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        animation: spin 1s linear infinite;
        margin: 0 auto 15px;
    }

    .fallback-indicator a {
        color: #3498db;
        font-weight: 600;
        text-decoration: underline;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @media (max-width: 992px) {
        .pdf-viewer {
            padding-bottom: 70%;
        }
    }

    @media (max-width: 768px) {
        .pdf-viewer {
            padding-bottom: 80%;
        }

        .pdf-controls {
            flex-direction: column;
            gap: 10px;
        }

        .btn-pdf {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .pdf-viewer {
            padding-bottom: 100%;
        }

        .preview-header h2 {
            font-size: 1.75rem;
        }
    }
</style>


<!--==================================================-->
<!-- Start Header Slider Section -->
<!--===================================================-->

<div class="breadcumb-area d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-12">
                <div class="breadcumb-content">

                    <h1>Interest and Charge Schedule 2026-27</h1>

                    <ul>
                        <li>
                            <a href="/">Home</a>
                        </li>

                        <li>
                            Discover
                        </li>
                    </ul>

                </div>
            </div>

            <div class="britcam-shape">
                <div class="breadcumb-content upp">

                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>

                        <li>
                            Discover
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </div>
</div>


<!-- Start PDF Preview Section -->
<section class="pdf-preview-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="preview-header">
                    <h2>Interest and Charge Schedule 2026-27</h2>
                    <p>
                        Review the detailed charges for the fiscal year
                        2026-27. You can download or view in fullscreen
                        for better readability.
                    </p>
                </div>

                <div class="pdf-container">
                    <!-- PDF Viewer -->
                    <div class="pdf-viewer">

                        <!-- Loading indicator -->
                        <div class="loading-indicator" id="pdf-loading">
                            <div class="spinner"></div>
                            <p>Loading document...</p>
                        </div>

                        <!-- Fallback shown if embedding fails -->
                        <div class="fallback-indicator" id="pdf-fallback" style="display:none;">
                            <i class="far fa-file-pdf" style="font-size:36px; color:#3498db; margin-bottom:10px; display:block;"></i>
                            <p style="margin:0 0 10px;">Preview couldn't be loaded.</p>
                            <a href="https://srfc.org.in/upload/Interest%20and%20Charge%20Schedule%202026-27.pdf" target="_blank">
                                Click here to open the PDF
                            </a>
                        </div>

                        <!-- Embedded PDF: Default to Google Docs Viewer to force inline display -->
                        <iframe
                            id="pdf-frame"
                            src="https://docs.google.com/viewer?url=https%3A%2F%2Fsrfc.org.in%2Fupload%2FInterest%2520and%2520Charge%2520Schedule%25202026-27.pdf&embedded=true"
                            title="Interest and Charge Schedule 2026-27 PDF"
                            allowfullscreen
                            allow="fullscreen">
                        </iframe>

                    </div>

                    <!-- PDF Controls -->
                    <div class="pdf-controls">
                        <!-- Download -->
                        <a
                            href="https://srfc.org.in/upload/Interest%20and%20Charge%20Schedule%202026-27.pdf"
                            class="btn btn-download btn-pdf"
                            download="Interest and Charge Schedule 2026-27.pdf"
                        >
                            <i class="fas fa-download"></i>
                            Download PDF
                        </a>

                        <!-- Fullscreen -->
                        <button
                            type="button"
                            class="btn btn-fullscreen btn-pdf"
                            onclick="openFullscreen()"
                        >
                            <i class="fas fa-expand"></i>
                            View Fullscreen
                        </button>

                        <!-- Switch to Native Viewer (if user wants to try) -->
                        <button
                            type="button"
                            class="btn btn-native btn-pdf"
                            onclick="switchToNative()"
                        >
                            <i class="fas fa-file-pdf"></i>
                            Native Viewer
                        </button>

                        <!-- Open in New Tab -->
                        <a
                            href="https://srfc.org.in/upload/Interest%20and%20Charge%20Schedule%202026-27.pdf"
                            target="_blank"
                            class="btn btn-open btn-pdf"
                        >
                            <i class="fas fa-external-link-alt"></i>
                            Open in New Tab
                        </a>
                    </div>

                    <!-- PDF Information -->
                    <div class="pdf-info">
                        <div>
                            <i class="far fa-file-pdf"></i>
                            <span>Interest and Charge Schedule 2026-27.pdf</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End PDF Preview Section -->


<!-- Existing content -->

<!-- Start consen service Area -->
<!--==================================================-->
<div class="body-area">
    <div class="container">
    </div>
</div>
<!-- End consen service Area -->
<!--==================================================-->


<?php include 'elements/branch-query.php'; ?>

<?php include 'footer-2.php'; ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const PDF_DIRECT_URL = 'https://srfc.org.in/upload/Interest%20and%20Charge%20Schedule%202026-27.pdf';
    const PDF_GOOGLE_URL = 'https://docs.google.com/viewer?url=' + encodeURIComponent(PDF_DIRECT_URL) + '&embedded=true';

    // Function to open the PDF viewer in fullscreen
    function openFullscreen() {
        const frame = document.getElementById('pdf-frame');
        if (!frame) return;

        if (frame.requestFullscreen) {
            frame.requestFullscreen();
        } else if (frame.webkitRequestFullscreen) {
            frame.webkitRequestFullscreen();
        } else if (frame.msRequestFullscreen) {
            frame.msRequestFullscreen();
        } else {
            // Fallback: open PDF in new tab
            window.open(PDF_DIRECT_URL, '_blank');
        }
    }

    // Switch to native browser viewer (might trigger download if server forces attachment)
    function switchToNative() {
        const frame = document.getElementById('pdf-frame');
        const loading = document.getElementById('pdf-loading');
        const fallback = document.getElementById('pdf-fallback');

        if (loading) loading.style.display = 'block';
        if (fallback) fallback.style.display = 'none';

        if (frame) {
            frame.src = PDF_DIRECT_URL;
        }
    }

    (function () {
        const pdfFrame = document.getElementById('pdf-frame');
        const loadingIndicator = document.getElementById('pdf-loading');
        const fallback = document.getElementById('pdf-fallback');
        let loaded = false;

        function hideLoading() {
            if (!loaded && loadingIndicator) {
                loadingIndicator.style.display = 'none';
                loaded = true;
                console.log('PDF iframe reported a load event.');
            }
        }

        if (pdfFrame) {
            pdfFrame.addEventListener('load', hideLoading);
        }

        // If nothing happens within 8s, assume it failed and show the fallback link.
        setTimeout(function () {
            if (!loaded) {
                console.warn('PDF did not report loading within 8s — check Content-Disposition and X-Frame-Options/CSP headers on the PDF URL.');
                if (loadingIndicator) loadingIndicator.style.display = 'none';
                if (fallback) fallback.style.display = 'block';
            }
        }, 8000);
    })();
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
<script src="assets/js/sweetalert.min.js"></script>

<script>
    $(document).ready(function () {
        $("#enquiry-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "modules/contact/contact-save.php",
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    var data = JSON.parse(response);
                    $("#enquiry-form")[0].reset();
                    swal(
                        data[0].msg,
                        "",
                        data[0].status
                    );
                    setTimeout(function () {
                        window.location = 'contact';
                    }, 2000);
                }
            });
        });
    });
</script>


<?php
$conn->close();
?>

</body>
</html>