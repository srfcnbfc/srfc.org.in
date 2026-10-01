<!--==================================================-->
<!-- Start faq Area -->
<!--==================================================-->
<div class="faq-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 pl-0">
                <!-- Start Accordion -->
                <div class="tab_container">
                    <div class="consen-section-title white pb-40 mb-1">
                        <h5> FAQ </h5>
                        <h2> Frequently Asked <span> Question </span></h2>
                    </div>
                    <div id="tab1" class="tab_content">
                        <ul class="accordion">
                            <li>
                                <a><span> Why SRFC is the Best Finance Company? </span></a>
                                <p>We provides financial services facilitate the smooth functioning of transactions in an economy. We provide reliable measures and set benchmark to boost and strength the MSME sector in India</p>
                            </li>
                            <li>
                                <a><span> What types of loans do loan SRFC offer? </span></a>
                                <p>We offer a range of loan products, including personal loans, four wheeler loans, two wheeler loan, small business loans, and more.</p>
                            </li>
                            <li>
                                <a><span> What are the requirements for getting a loan? </span></a>
                                <p>The requirements for getting a loan from SRFC will vary depending on the type of loan you are applying for. Generally, you will need to have a good credit score, proof of income and employment, and a history of responsible borrowing.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Accordion -->
            </div>
            <div class="col-lg-6 col-md-6">
    <div class="contract-form-bg">
        <div class="contact-form-title">
            <h4> EMI Calculator </h4>
            <p>Bring Your Aspirations To Life, With A Quick Loan </p>
        </div>
        <div class="contact_from p0 mt-0">
            <div class="form-group">
                <div class="row">
                    <label class="col-lg-8 col-sm-8 col-md-8 col-8 control-label calLabel">Loan Amount Required (₹)</label>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                        <input type="text" value="10000" class="rightlabel" id="amount_label">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12" style="width: 100%;">
                        <input type="range" name="amount" min="10000" max="3000000" value="10000" step="1000" class="range-slider" id="amount">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-lg-8 col-sm-8 col-md-8 col-8 control-label calLabel">Interest Rate%</label>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                        <input type="text" value="12" class="rightlabel" id="interest_label">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12" style="width: 100%;">
                        <input type="range" min="1" max="30" value="12" step="1" class="range-slider" id="interest_rate">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-lg-8 col-sm-8 col-md-8 col-8 control-label calLabel">Tenure (Years)</label>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                        <input type="text" value="3" class="rightlabel" id="tenure_label">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12" style="width: 100%;">
                        <input type="range" min="1" max="30" value="5" step="1" class="range-slider" id="tenure">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 p0">
                        <div class="col-12">
                            <h6 class="mb-2 text-center emi">Monthly EMI</h6>
                            <div class="emidetail" id="monthlyemi"></div>
                        </div>
                        <div class="col-12">
                            <h6 class="mb-2 text-center emi">Total Interest</h6>
                            <div class="emidetail" id="totalinterest"></div>
                        </div>
                        <div class="col-12">
                            <h6 class="mb-2 text-center emi">Total Amount</h6>
                            <div class="emidetail" id="totalamount"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <canvas id="chart-line" width="100%" height="150" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="quote_button">
                <a href="apply-now" class="btn btn-warning"> <i class="bi bi-hand-index-thumb"></i> Apply Now </a>
            </div>
            <div id="status"></div>
        </div>
    </div>
</div>
            <div class="form-shape">
                <div class="testi-shape-thumb">
                    <img src="assets/images/resource/all-shape5.png" alt="Shri Ram Finance">
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- End consen faq Area -->
<!--==================================================-->

<script>
    // Function to calculate EMI, total interest, and total amount using flat interest rate
    function calculateEMI() {
        const loanAmount = parseFloat(document.getElementById('amount_label').value);
        const annualInterestRate = parseFloat(document.getElementById('interest_label').value);
        const tenureYears = parseFloat(document.getElementById('tenure_label').value);

        // Calculate total interest using flat rate
        const totalInterest = (loanAmount * annualInterestRate * tenureYears) / 100;

        // Calculate total amount to be paid
        const totalAmount = loanAmount + totalInterest;

        // Calculate EMI
        const numberOfMonths = tenureYears * 12;
        const emi = totalAmount / numberOfMonths;

        // Update the values in the HTML
        document.getElementById('monthlyemi').innerText = emi.toFixed(2);
        document.getElementById('totalinterest').innerText = totalInterest.toFixed(2);
        document.getElementById('totalamount').innerText = totalAmount.toFixed(2);
    }

    // Event listeners for the input fields and range sliders
    document.getElementById('amount_label').addEventListener('input', calculateEMI);
    document.getElementById('interest_label').addEventListener('input', calculateEMI);
    document.getElementById('tenure_label').addEventListener('input', calculateEMI);

    document.getElementById('amount').addEventListener('input', function() {
        document.getElementById('amount_label').value = this.value;
        calculateEMI();
    });

    document.getElementById('interest_rate').addEventListener('input', function() {
        document.getElementById('interest_label').value = this.value;
        calculateEMI();
    });

    document.getElementById('tenure').addEventListener('input', function() {
        document.getElementById('tenure_label').value = this.value;
        calculateEMI();
    });

    // Initial calculation
    calculateEMI();
</script>
