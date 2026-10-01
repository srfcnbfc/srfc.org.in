
<!DOCTYPE HTML>
<html lang="en-US">
    <?php 
    
    include 'app/config/front-config.php'; 
    $banner_sql = "SELECT * FROM banner";
    $banner_row = getData($banner_sql);
    
    ?>
    <?php include 'header.php'; ?>
    <?php include 'elements/slider.php'; ?>
    <?php include 'elements/saral-pay-popup.php'; ?>
    <!--==================================================-->
    <div class="service-area">
        <div class="container">
            <div class="row align-items-center mb-90">
                <div class="col-lg-12 col-md-12 pl-0">
                    <div class="consen-section-title mobile-center">
                        <h2> We know the secret of your <span>success</span></h2>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 p-0">
                    <div class="dreamit-service-box">
                        <div class="service-box-inner">
                            <div class="em-service-icon">
                                <img src="assets/images/resource/service-icon.png" alt="Get Easy Loan with your convenience">
                            </div>
                            <div class="em-service-title">
                                <h2> Loans at your convenience </h2>
                            </div>
                            <div class="service-number">
                                <h1> 01 </h1>
                            </div>
                            <div class="em-service-text">
                                <p> We collect all the required information about your personal, professional, financial details and liabilities details of our client with proper documentation.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 p-0">
                    <div class="dreamit-service-box">
                        <div class="service-box-inner">
                            <div class="em-service-icon">
                                <img src="assets/images/resource/service-icon2.png" alt="Business Loan for Small Company">
                            </div>
                            <div class="em-service-title">
                                <h2> Loans for different purposes </h2>
                            </div>
                            <div class="service-number">
                                <h1> 02 </h1>
                            </div>
                            <div class="em-service-text">
                                <p> Company provides loan to various categories of business, Vehicles which includes Kirana Stores, Cloth Stores, Two wheeler, Four wheeler etc. </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 p-0">
                    <div class="dreamit-service-box">
                        <div class="service-box-inner">
                            <div class="em-service-icon">
                                <img src="assets/images/resource/service-icon3.png" alt="Finance Services">
                            </div>
                            <div class="em-service-title">
                                <h2> Customer relationship managers </h2>
                            </div>
                            <div class="service-number">
                                <h1> 03 </h1>
                            </div>
                            <div class="em-service-text">
                                <p> Loan repayment in flexible tenures, Low & Attractive Interest Rates, Quick documentation and responsive services.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 p-0">
                    <div class="dreamit-service-box">
                        <div class="service-box-inner">
                            <div class="em-service-icon">
                                <img src="assets/images/resource/service-icon.png" alt="Finance Solution Provider">
                            </div>
                            <div class="em-service-title">
                                <h2> One Click Solution Provider </h2>
                            </div>
                            <div class="service-number">
                                <h1> 04 </h1>
                            </div>
                            <div class="em-service-text">
                                <p> We have fast and dedicated team who verified all documents in 24 hrs and you need to just submit your document in just one click. </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->

    <!--==================================================-->
    <div class="case-study-area">
        <div class="container">
            <div class="row case-study-bg align-items-center mb-40">
                <div class="col-lg-6 col-md-8">
                    <div class="consen-section-title mobile-center white ">
                        <h2> We Serve the Best </h2>
                        <h2> <span> Financial Services </span></h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="consen-button text-right">
                        <a href="https://apply.srfc.org.in/"> Get Loan <i class="bi bi-plus"></i> </a>
                    </div>
                </div>
                <div class="case-study-shape">
                    <div class="case-shape-thumb bounce-animate4">
                        <img src="assets/images/resource/red-dot.png" alt="Shri Ram Finance">
                    </div>
                    <div class="case-shape-thumb1 bounce-animate2">
                        <img src="assets/images/resource/all-shape.png" alt="Shri Ram Finance">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="case-study owl-carousel">
                    <?php foreach ($service_menu_row  as $key => $service) { ?>
                    <div class="col-lg-12">
                        <div class="case-study-single-box">
                            <div class="case-study-thumb">
                                <img src="upload/services/<?= $service['service_img']?>" alt="<?= $service['service_name']?>" height="280px">
                                <div class="case-study-content">
                                    <div class="case-study-title">
                                        <h6> Get Easy Loan </h6>
                                        <h3> <a href="services/<?= $service['service_slug']?>"><?= $service['service_name']?></a>
                                        </h3>
                                    </div>
                                    <div class="case-button">
                                        <a href="services/<?= $service['service_slug']; ?>">Read More <i class="bi bi-plus"></i> </a>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->

    <!--==================================================-->
    
    <!--==================================================-->




    <?php include 'elements/calculator.php'; ?>
    <?php include 'elements/testimonial.php'; ?>

    <?php include 'footer.php'; ?>
    <script>
    $(document).ready(function () {
emical() ;

        $("#amount").on("change", function () {
            var amount = $('#amount').val();
            document.getElementById("amount_label").value = amount;
            emical();
        });
        $("#interest_rate").on("change", function () {
            var interest_rate = $('#interest_rate').val();
            document.getElementById("interest_label").value = interest_rate;
            emical();
        });
        $("#tenure").on("change", function () {
            var tenure = $('#tenure').val();
            document.getElementById("tenure_label").value = tenure;
            emical();
        });

        function emical() {
            var amount = $('#amount').val();
            var interest_rate = $('#interest_rate').val();
            var tenure = $('#tenure').val();
            var months = tenure * 12;

            var monthlyRate = (interest_rate / 100) / months;
            let MonthlyEmi = ((amount * monthlyRate * Math.pow(1 + monthlyRate, months)) / (Math.pow(1 + monthlyRate, months) - 1)).toFixed(2);
            var TotalAmount = (MonthlyEmi * months).toFixed(2);
            ;
            var TotalInterest = (TotalAmount - amount).toFixed(2);
            ;
            //MonthlyEmi = MonthlyEmi.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");


            document.getElementById("monthlyemi").innerHTML = MonthlyEmi+' ₹';
            document.getElementById("totalamount").innerHTML = TotalAmount+' ₹';
            document.getElementById("totalinterest").innerHTML = TotalInterest+' ₹';

            var ctx = $("#chart-line");
            var myLineChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["Amount", "Interest"],
                    datasets: [{
                            data: [amount, TotalInterest],
                            backgroundColor: ["rgba(255, 60, 0, 1)", "rgba(0, 110, 174, 1)"]
                        }]
                }

            });
        }
    });
</script>
<?php  $conn->close(); ?>
</body>
</html>