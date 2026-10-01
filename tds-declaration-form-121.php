<!DOCTYPE HTML>
<html lang="en-US">
    <?php 
    include 'app/config/front-config.php'; 
    $site_title = "TDS Declaration – Form 121 | Shri Ram Finance Corporation Pvt. Ltd.";
    $site_description = "Submit your Form 121 TDS Declaration directly online to Shri Ram Finance Corporation Pvt. Ltd. Fast, secure, and hassle-free document submission for investors."; 
    ?>
    <?php include 'header.php'; ?>

    <style>
        .tds-hero-area {
            padding: 70px 0 60px;
            background: linear-gradient(135deg, #0a2540 0%, #174276 100%);
            position: relative;
            overflow: hidden;
        }
        .tds-hero-content h1 {
            color: #ffffff;
            font-size: 38px;
            font-weight: 700;
            margin-bottom: 12px;
        }
        .tds-hero-content ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .tds-hero-content ul li {
            color: #dbe4f0;
            font-size: 15px;
        }
        .tds-hero-content ul li a {
            color: #38bdf8;
            text-decoration: none;
        }
        .tds-hero-content ul li a:hover {
            text-decoration: underline;
        }

        .tds-section {
            padding: 70px 0 80px;
            background: #f8fafc;
        }
        .tds-info-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 35px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            height: 100%;
        }
        .tds-info-card h3 {
            font-size: 24px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 15px;
        }
        .tds-info-card p {
            color: #475569;
            font-size: 15px;
            line-height: 1.7;
        }
        .tds-badge-list {
            margin: 25px 0;
            padding: 0;
            list-style: none;
        }
        .tds-badge-list li {
            display: flex;
            align-items: flex-start;
            margin-bottom: 16px;
            color: #334155;
            font-size: 14px;
            line-height: 1.5;
        }
        .tds-badge-list li i {
            color: #0ea5e9;
            font-size: 18px;
            margin-right: 12px;
            margin-top: 2px;
            flex-shrink: 0;
        }
        .tds-support-box {
            background: #f0fdf4;
            border-left: 4px solid #22c55e;
            padding: 18px;
            border-radius: 8px;
            margin-top: 25px;
        }
        .tds-support-box h6 {
            color: #15803d;
            font-weight: 700;
            margin-bottom: 6px;
            font-size: 15px;
        }
        .tds-support-box p {
            margin: 0;
            font-size: 13px;
            color: #166534;
        }

        .tds-form-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.07);
            border: 1px solid #e2e8f0;
        }
        .tds-form-card h4 {
            font-size: 24px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }
        .tds-form-card .subtitle {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 25px;
        }
        .tds-form-group {
            margin-bottom: 22px;
        }
        .tds-form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 7px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .tds-form-group label span.req {
            color: #ef4444;
        }
        .tds-input-wrap {
            position: relative;
        }
        .tds-input-wrap i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 16px;
        }
        .tds-form-group input[type="text"],
        .tds-form-group input[type="email"],
        .tds-form-group input[type="tel"] {
            width: 100%;
            height: 48px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 0 15px 0 45px;
            font-size: 15px;
            color: #1e293b;
            background: #ffffff;
            transition: all 0.2s ease-in-out;
        }
        .tds-form-group input:focus {
            border-color: #0284c7;
            outline: none;
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15);
        }
        .tds-file-drop {
            border: 2px dashed #cbd5e1;
            border-radius: 10px;
            padding: 25px 20px;
            text-align: center;
            background: #f8fafc;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }
        .tds-file-drop:hover {
            border-color: #0284c7;
            background: #f0f9ff;
        }
        .tds-file-drop input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }
        .tds-file-drop i {
            font-size: 32px;
            color: #0284c7;
            margin-bottom: 8px;
        }
        .tds-file-drop p {
            margin: 0;
            font-size: 14px;
            color: #475569;
            font-weight: 500;
        }
        .tds-file-drop span.file-hint {
            display: block;
            font-size: 12px;
            color: #94a3b8;
            margin-top: 4px;
        }
        .tds-file-selected-name {
            display: none;
            margin-top: 10px;
            font-size: 13px;
            color: #059669;
            font-weight: 600;
        }
        .tds-submit-btn {
            background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            height: 50px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }
        .tds-submit-btn:hover {
            background: linear-gradient(135deg, #0369a1 0%, #075985 100%);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(2, 132, 199, 0.3);
        }
        .tds-submit-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }
    </style>

    <!-- Header Breadcrumb Section -->
    <div class="tds-hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tds-hero-content">
                        <h1>TDS Declaration – Form 121</h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>Investor's Corner</li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>TDS Declaration Form 121</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content & Form Section -->
    <div class="tds-section">
        <div class="container">
            <div class="row">
                <!-- Left Column: Information & Guidelines -->
                <div class="col-lg-5 col-md-12 mb-4 mb-lg-0">
                    <div class="tds-info-card">
                        <h3>Investor Submission Portal</h3>
                        <p>
                            To streamline compliance and expedite the processing of TDS declarations, investors can now upload their <strong>Form 121</strong> directly through this secure portal.
                        </p>

                        <ul class="tds-badge-list">
                            <li>
                                <i class="fa fa-check-circle"></i>
                                <span><strong>Instant Verification:</strong> Submissions are logged immediately for review by our Accounts Team.</span>
                            </li>
                            <li>
                                <i class="fa fa-check-circle"></i>
                                <span><strong>Valid ISIN Required:</strong> Ensure you enter your correct 12-character International Securities Identification Number.</span>
                            </li>
                            <li>
                                <i class="fa fa-check-circle"></i>
                                <span><strong>Accepted Formats:</strong> PDF documents (recommended), JPEG, or PNG files up to 5MB.</span>
                            </li>
                            <li>
                                <i class="fa fa-check-circle"></i>
                                <span><strong>Safe & Encrypted:</strong> Your uploaded documents are handled through secure financial data practices.</span>
                            </li>
                        </ul>

                        <div class="tds-support-box">
                            <h6>Need Assistance?</h6>
                            <p>For any queries regarding Form 121 or TDS deductions, please reach out to our investor grievance team at <a href="mailto:grievance@srfc.org.in" style="color: #15803d; font-weight: 600; text-decoration: underline;">grievance@srfc.org.in</a>.</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Submission Form -->
                <div class="col-lg-7 col-md-12">
                    <div class="tds-form-card">
                        <h4>Upload Form 121</h4>
                        <p class="subtitle">Please provide your investor details and attach the signed Form 121.</p>

                        <form id="tds-form" enctype="multipart/form-data">
                            <!-- Name of Investor -->
                            <div class="tds-form-group">
                                <label for="investor_name">Name of Investor <span class="req">*</span></label>
                                <div class="tds-input-wrap">
                                    <i class="fa fa-user"></i>
                                    <input type="text" id="investor_name" name="investor_name" placeholder="Full name as per investor records" minlength="3" required>
                                </div>
                            </div>

                            <!-- ISIN -->
                            <div class="tds-form-group">
                                <label for="isin">ISIN Number <span class="req">*</span></label>
                                <div class="tds-input-wrap">
                                    <i class="fa fa-barcode"></i>
                                    <input type="text" id="isin" name="isin" placeholder="e.g. INE123A01010 (12 characters)" maxlength="12" pattern="^[A-Za-z0-9]{12}$" style="text-transform: uppercase;" required>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Email ID -->
                                <div class="col-md-6">
                                    <div class="tds-form-group">
                                        <label for="email">Email Address <span class="req">*</span></label>
                                        <div class="tds-input-wrap">
                                            <i class="fa fa-envelope"></i>
                                            <input type="email" id="email" name="email" placeholder="investor@example.com" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Mobile Number -->
                                <div class="col-md-6">
                                    <div class="tds-form-group">
                                        <label for="mobile">Mobile Number <span class="req">*</span></label>
                                        <div class="tds-input-wrap">
                                            <i class="fa fa-phone"></i>
                                            <input type="tel" id="mobile" name="mobile" placeholder="10-digit mobile number" maxlength="10" pattern="^[6-9][0-9]{9}$" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Upload Form 121 -->
                            <div class="tds-form-group">
                                <label>Upload Form 121 (PDF / Image) <span class="req">*</span></label>
                                <div class="tds-file-drop" id="file-drop-area">
                                    <input type="file" id="form_file" name="form_file" accept=".pdf,.jpg,.jpeg,.png" required>
                                    <i class="fa fa-cloud-upload"></i>
                                    <p id="file-instruction">Click or drag & drop Form 121 here</p>
                                    <span class="file-hint">Supported formats: PDF, JPG, PNG (Max: 5MB)</span>
                                    <div class="tds-file-selected-name" id="selected-file-name"></div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="tds-submit-btn" id="submit-btn">
                                <i class="fa fa-paper-plane"></i>
                                <span>Submit TDS Declaration</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="assets/js/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            // Auto uppercase ISIN input
            $('#isin').on('input', function () {
                $(this).val($(this).val().toUpperCase().replace(/[^A-Z0-9]/g, ''));
            });

            // Display selected file name
            $('#form_file').on('change', function () {
                var file = this.files[0];
                if (file) {
                    if (file.size > 5 * 1024 * 1024) {
                        swal("File Too Large", "Maximum file size allowed is 5MB.", "warning");
                        $(this).val('');
                        $('#selected-file-name').hide().text('');
                        return;
                    }
                    $('#selected-file-name').show().html('<i class="fa fa-check"></i> Selected: ' + file.name + ' (' + (file.size / 1024).toFixed(1) + ' KB)');
                } else {
                    $('#selected-file-name').hide().text('');
                }
            });

            // AJAX Form Submit
            $('#tds-form').on('submit', function (e) {
                e.preventDefault();
                var btn = $('#submit-btn');
                var originalText = btn.html();

                btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Submitting...');

                var formData = new FormData(this);

                $.ajax({
                    url: 'modules/tds/tds-save.php',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (response) {
                        btn.prop('disabled', false).html(originalText);
                        var res = Array.isArray(response) ? response[0] : response;
                        if (res.status === 'success') {
                            swal("Success!", res.msg, "success").then(function () {
                                $('#tds-form')[0].reset();
                                $('#selected-file-name').hide().text('');
                            });
                        } else {
                            swal("Notice", res.msg, res.status || "warning");
                        }
                    },
                    error: function (xhr, status, error) {
                        btn.prop('disabled', false).html(originalText);
                        swal("Submission Failed", "An unexpected error occurred. Please try again.", "error");
                    }
                });
            });
        });
    </script>

    <?php $conn->close(); ?>
</body>
</html>
