<!DOCTYPE html>
<html lang="en-US">
<?php include 'app/config/front-config.php'; 
    $site_title = "Become Our Advisor | SRFC";
    $site_description = "Partner with Central India's fastest growing NBFC. Earn high commissions by referring loans and insurance."; 
?>
<head>
    <?php include 'header.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_title; ?></title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0d47a1; /* Deep Blue */
            --primary-dark: #002171;
            --secondary-color: #00bcd4; /* Cyan Accent */
            --accent-color: #ffca28; /* Gold */
            --text-dark: #1e293b;
            --text-light: #64748b;
            --white: #ffffff;
            --light-bg: #f8fafc;
            --success: #16a34a;
            --border-radius: 12px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.1);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--light-bg);
            scroll-behavior: smooth;
        }

        h1, h2, h3, h4 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        /* Utilities */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3.5rem;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.25rem;
            color: var(--primary-color);
            margin-bottom: 12px;
        }

        .section-title p {
            color: var(--text-light);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 35px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: var(--white);
            box-shadow: 0 4px 15px rgba(13, 71, 161, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(13, 71, 161, 0.5);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, rgba(13, 71, 161, 0.95) 0%, rgba(0, 33, 113, 0.98) 100%), url('https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            color: var(--white);
            padding: 120px 0 100px;
            text-align: center;
            position: relative;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            font-weight: 700;
            line-height: 1.2;
            color:#ffffff;
        }

        .hero p {
            font-size: 1.25rem;
            max-width: 700px;
            margin: 0 auto 35px;
            opacity: 0.9;
        }

        .hero .badge {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255,255,255,0.3);
            color: var(--accent-color);
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 0.85rem;
            letter-spacing: 1px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px;
            backdrop-filter: blur(5px);
        }

        /* Trust Stats Bar */
        .trust-bar {
            background: var(--white);
            padding: 30px 0;
            margin-top: -40px;
            position: relative;
            z-index: 8;
            box-shadow: var(--shadow-md);
            border-radius: 8px;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .trust-item {
            text-align: center;
        }

        .trust-item h4 {
            color: var(--primary-color);
            font-size: 1.8rem;
            margin-bottom: 5px;
        }
        
        .trust-item span {
            color: var(--text-light);
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Products Section */
        .products {
            padding: 100px 0 80px;
            background: var(--light-bg);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 30px;
        }

        .product-card {
            background: var(--white);
            padding: 40px 30px;
            border-radius: var(--border-radius);
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            box-shadow: var(--shadow-sm);
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
            border-color: var(--secondary-color);
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background: #e0f7fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            transition: 0.3s;
        }

        .product-card:hover .icon-circle {
            background: var(--secondary-color);
        }

        .product-card i {
            font-size: 2rem;
            color: var(--secondary-color);
            transition: 0.3s;
        }

        .product-card:hover i {
            color: var(--white);
        }

        .product-card h3 {
            margin-bottom: 10px;
            color: var(--text-dark);
            font-size: 1.25rem;
        }

        .product-card p {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        /* Incentive Section & Tables */
        .incentives {
            padding: 80px 0;
            background: var(--white);
        }

        .incentive-category {
            margin-bottom: 50px;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            border: 1px solid #edf2f7;
        }
        
        .incentive-category h3{
            color:#ffffff;
        }

        .cat-header {
            background: var(--primary-color);
            color: var(--white);
            padding: 20px 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .cat-header h3 {
            margin: 0;
            font-size: 1.3rem;
        }

        /* Responsive Table Wrapper */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .incentive-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
            min-width: 600px; /* Forces scroll on mobile if needed */
        }

        .incentive-table th, 
        .incentive-table td {
            padding: 18px 30px;
            text-align: left;
            border-bottom: 1px solid #f1f5f9;
        }

        .incentive-table th {
            background-color: #f8fafc;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .incentive-table tr:hover {
            background-color: #f8fafc;
        }

        .amount {
            color: var(--success);
            font-weight: 700;
            font-size: 1.15rem;
        }

        .bonus-row {
            background-color: #fffbeb !important; /* Amber-50 */
        }
        
        .bonus-row td {
            border-bottom: 2px solid var(--accent-color);
        }

        .note {
            font-size: 0.8rem;
            color: var(--text-light);
            display: block;
            margin-top: 4px;
            font-weight: 400;
        }

        /* Requirements Section */
        .requirements {
            padding: 80px 0;
            background: var(--primary-color);
            background-image: radial-gradient(circle at 10% 20%, rgba(255,255,255,0.05) 0%, transparent 20%);
            color: var(--white);
        }

        .req-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            text-align: center;
        }

        .req-item {
            background: rgba(255,255,255,0.1);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
            flex: 1;
            min-width: 220px;
            max-width: 300px;
            transition: 0.3s;
        }
        
        .req-item:hover {
            background: rgba(255,255,255,0.15);
            transform: translateY(-5px);
        }

        .req-item i {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: var(--accent-color);
        }
        
        .req-item h3 {
            font-size: 1.1rem;
            margin-bottom: 5px;
            color:#ffffff;
        }

        /* Form Section */
        .apply-section {
            padding: 90px 0;
            background: #f1f5f9;
        }

        .form-wrapper {
            max-width: 700px;
            margin: 0 auto;
            background: var(--white);
            padding: 50px;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }
        
        .form-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group.full-width {
            grid-column: span 2;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-dark);
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s;
            background: #f8fafc;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(13, 71, 161, 0.1);
        }

        /* Better File Upload Style */
        .file-upload-box {
            border: 2px dashed #cbd5e1;
            padding: 30px 20px;
            text-align: center;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            background: #f8fafc;
        }

        .file-upload-box:hover {
            border-color: var(--secondary-color);
            background: #f0f9ff;
        }
        
        .file-upload-box input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .upload-icon {
            font-size: 2rem;
            color: var(--text-light);
            margin-bottom: 10px;
            display: block;
        }

        .file-label {
            color: var(--text-light);
            font-size: 0.9rem;
            pointer-events: none;
        }
        
        .file-name-display {
            display: block;
            margin-top: 8px;
            font-size: 0.85rem;
            color: var(--success);
            font-weight: 600;
        }
        
        .upload-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Footer */
        footer {
            background: #0f172a;
            color: #94a3b8;
            padding: 40px 0;
            text-align: center;
            font-size: 0.9rem;
            border-top: 1px solid #1e293b;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 { font-size: 2.5rem; }
            .form-grid, .upload-row { grid-template-columns: 1fr; }
            .form-group.full-width { grid-column: span 1; }
            .form-wrapper { padding: 30px 20px; }
            .trust-bar { margin-top: 0; border-radius: 0; box-shadow: none; border-bottom: 1px solid #eee; }
        }
    </style>
</head>
<body>

    <header class="hero">
        <div class="container hero-content">
            <span class="badge">OFFICIAL PARTNER PROGRAM</span>
            <h1>Become Our Agent Today & Start Earning Commission on Every Lead<br> with Leading NBFC</h1>
            <p>Join our growing network and earn attractive incentives by referring customers for multiple financial products.</p>
            <a href="become-our-advisor#apply" class="btn btn-primary">Start Earning Today <i class="fas fa-arrow-right" style="margin-left: 10px;"></i></a>
        </div>
    </header>

    <div class="container">
        <div class="trust-bar">
            <div class="trust-item">
                <h4>18+</h4>
                <span>Years of Trust</span>
            </div>
            <div class="trust-item">
                <h4>8–10 Lakh+</h4>
                <span>Loans Disbursements</span>
            </div>
            <div class="trust-item">
                <h4>10,000+</h4>
                <span>Active Advisors</span>
            </div>
            
        </div>
    </div>

    <section class="products">
        <div class="container">
            <div class="section-title">
                <h2>Products You Can Refer</h2>
                <p>Monetize your network by referring friends, family, and clients for these high-demand financial products.</p>
            </div>
            <div class="products-grid">
                <div class="product-card">
                    <div class="icon-circle"><i class="fas fa-briefcase"></i></div>
                    <h3>Business Loan</h3>
                    <p>MSME & Commercial Financing for local businesses.</p>
                </div>
                <div class="product-card">
                    <div class="icon-circle"><i class="fas fa-user-tag"></i></div>
                    <h3>Personal Loan</h3>
                    <p>Instant unsecured loans for salaried & self-employed.</p>
                </div>
                <div class="product-card">
                    <div class="icon-circle"><i class="fas fa-motorcycle"></i></div>
                    <h3>New Two Wheeler</h3>
                    <p>Easy finance options for all major bike brands.</p>
                </div>
                <div class="product-card">
                    <div class="icon-circle"><i class="fas fa-sync-alt"></i></div>
                    <h3>Bike Refinance</h3>
                    <p>Quick cash loans against existing vehicles.</p>
                </div>
                <div class="product-card">
                    <div class="icon-circle"><i class="fas fa-shield-alt"></i></div>
                    <h3>Insurance</h3>
                    <p>Comprehensive Motor & Asset Insurance.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="requirements">
        <div class="container">
            <div class="section-title" style="margin-bottom: 2rem;">
                <h2 style="color: var(--white);">Minimum Requirements</h2>
                <p style="color: rgba(255,255,255,0.8);">Get your advisor code in 24 hours with just these documents</p>
            </div>
            <div class="req-container">
                <div class="req-item">
                    <i class="far fa-id-card"></i>
                    <h3>Aadhaar Card</h3>
                    <p style="font-size:0.9rem; opacity:0.8;">Front & Back</p>
                </div>
                <div class="req-item">
                    <i class="fas fa-passport"></i>
                    <h3>PAN Card</h3>
                    <p style="font-size:0.9rem; opacity:0.8;">For KYC</p>
                </div>
                <div class="req-item">
                    <i class="fas fa-university"></i>
                    <h3>Bank Details</h3>
                    <p style="font-size:0.9rem; opacity:0.8;">Cancelled Cheque/Passbook</p>
                </div>
            </div>
        </div>
    </section>

    <section class="incentives">
        <div class="container">
            <div class="section-title">
                <h2>Commission Structure</h2>
                <p>Industry-leading payout rates with complete transparency</p>
            </div>

            <div class="incentive-category">
                <div class="cat-header">
                    <i class="fas fa-money-bill-wave fa-lg"></i>
                    <h3>Loans (Business & Personal)</h3>
                </div>
                <div class="cat-body table-responsive">
                    <table class="incentive-table">
                        <thead>
                            <tr>
                                <th>Product Type</th>
                                <th>Condition</th>
                                <th>Incentive</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Personal Loan</strong></td>
                                <td>Per Disbursement</td>
                                <td class="amount">₹ 2,000</td>
                            </tr>
                            <tr>
                                <td><strong>Business Loan</strong></td>
                                <td>Unsecured</td>
                                <td class="amount">₹ 2,500 <span class="note">per case</span></td>
                            </tr>
                            <tr>
                                <td><strong>Business Loan</strong></td>
                                <td>Secured (Property)</td>
                                <td class="amount">₹ 3,500 <span class="note">per case</span></td>
                            </tr>
                            <tr class="bonus-row">
                                <td><i class="fas fa-star" style="color: #d97706;"></i> <strong>Performance Bonus</strong></td>
                                <td>3+ files in a month</td>
                                <td class="amount" style="color:#d97706">+ ₹ 1,000 <span class="note">extra per file</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="incentive-category">
                <div class="cat-header">
                    <i class="fas fa-motorcycle fa-lg"></i>
                    <h3>Two Wheeler Finance</h3>
                </div>
                <div class="cat-body table-responsive">
                    <table class="incentive-table">
                        <thead>
                            <tr>
                                <th>Product Category</th>
                                <th>Monthly Volume</th>
                                <th>Incentive</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>New Two Wheeler</strong></td>
                                <td>Flat Rate</td>
                                <td class="amount">₹ 500 <span class="note">per vehicle</span></td>
                            </tr>
                            <tr>
                                <td rowspan="3" style="vertical-align: top;"><strong>Refinance (Used 2W)</strong><br><span class="note">Volume determines rate for all files</span></td>
                                <td>1 – 4 Files</td>
                                <td class="amount">₹ 500 <span class="note">per file</span></td>
                            </tr>
                            <tr>
                                <td>5 – 9 Files</td>
                                <td class="amount">₹ 700 <span class="note">per file (Retrospective)</span></td>
                            </tr>
                            <tr class="bonus-row">
                                <td>10+ Files</td>
                                <td class="amount" style="color:#d97706">₹ 1,000 <span class="note">per file (High Volume)</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="incentive-category">
                <div class="cat-header">
                    <i class="fas fa-shield-alt fa-lg"></i>
                    <h3>Insurance Products</h3>
                </div>
                <div class="cat-body table-responsive">
                    <table class="incentive-table">
                        <thead>
                            <tr>
                                <th>Insurance Type</th>
                                <th>Coverage</th>
                                <th>Incentive Basis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Motor Insurance</strong></td>
                                <td>2W / 4W / Commercial</td>
                                <td>
                                    
                                    <span class="note">Incentive based on premium amount as per vehicle model</span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Plant & Machinery</strong></td>
                                <td>Industrial Mills/Factories</td>
                                <td>
                                    <span class="amount">Custom Quote</span>
                                    <span class="note">Based on machinery valuation</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section id="apply" class="apply-section">
        <div class="container">
            <div class="section-title">
                <h2>Join Our Network</h2>
                <p>Fill in your details below. Our team will contact you within 24 hours.</p>
            </div>
            
            <div class="form-wrapper">
                <form id="advisorForm">
                   
                    <a href="https://forms.gle/TcnqvqJZVrcRTXf48" class="btn btn-primary" style="width: 100%; margin-top: 10px; font-size: 1.1rem; text-decoration: none; display: flex; justify-content: center; align-items: center;">
    Apply Now <i class="fas fa-paper-plane" style="margin-left: 8px;"></i>
</a>
                    <p style="text-align: center; margin-top: 15px; font-size: 0.85rem; color: #94a3b8;">
                        <i class="fas fa-lock"></i> Your data is secure with us.
                    </p>
                </form>
            </div>
        </div>
    </section>

    <script>
        // Script to show selected filename
        function updateFileName(input, displayId) {
            const displaySpan = document.getElementById(displayId);
            const box = input.parentElement;
            
            if (input.files && input.files[0]) {
                displaySpan.textContent = input.files[0].name;
                box.style.borderColor = "var(--success)";
                box.style.backgroundColor = "#f0fdf4";
                box.querySelector('.upload-icon').style.color = "var(--success)";
                box.querySelector('.upload-icon').classList.remove('fa-cloud-upload-alt');
                box.querySelector('.upload-icon').classList.add('fa-check-circle');
            } else {
                displaySpan.textContent = "";
            }
        }

        // Form submission handler
        document.getElementById('advisorForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            const contact = document.getElementById('contact').value;
            const front = document.getElementById('aadhaarFront').files[0];
            const back = document.getElementById('aadhaarBack').files[0];

            if(!front || !back) {
                alert("Please upload both sides of your Aadhaar Card to proceed.");
                return;
            }

            // Simulate submission UI state
            const btn = this.querySelector('button');
            const originalText = btn.innerHTML;
            
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            btn.disabled = true;
            btn.style.opacity = "0.7";

            setTimeout(() => {
                alert(`Success! Thank you ${name}. Your application has been sent to our team. We will call you at ${contact} shortly.`);
                
                // Reset Form
                this.reset();
                document.getElementById('frontName').textContent = "";
                document.getElementById('backName').textContent = "";
                
                // Reset Upload Boxes Styles
                document.querySelectorAll('.file-upload-box').forEach(box => {
                    box.style.borderColor = "#cbd5e1";
                    box.style.backgroundColor = "#f8fafc";
                    const icon = box.querySelector('.upload-icon');
                    icon.style.color = "var(--text-light)";
                    icon.classList.remove('fa-check-circle');
                    icon.classList.add('fa-cloud-upload-alt');
                });

                btn.innerHTML = originalText;
                btn.disabled = false;
                btn.style.opacity = "1";
            }, 2000);
        });
    </script>
    
    <?php include 'elements/testimonial.php'; ?>
    <?php include 'footer.php'; ?>

</body>
</html>