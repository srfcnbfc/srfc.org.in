<!DOCTYPE HTML>
<html lang="en-US">
    <?php
    include 'app/config/front-config.php';
    $service = htmlspecialchars(mysqli_real_escape_string($conn, filter_input(INPUT_GET, 'service', FILTER_SANITIZE_URL)));
    $service_sql = "SELECT * FROM service WHERE service_slug='$service'";
    if (getNumRows($service_sql) > 0) {
        $service_row = getsingleData($service_sql);
        $service_code = $service_row['service_code'];
        $faq_sql = "SELECT * FROM faq WHERE service_code='$service_code'";
        $faq_row = getData($faq_sql);
    } else {
        echo "<script>window.history.back();</script>";
    }
    ?>
    <?php include 'header.php'; ?>

    <!--------------------------------------------------->
    <!--Start Header Slider Section -->
    <!--===================================================-->
    <div class="breadcumb-area d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h1> <?= $service_row['service_name']; ?> </h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> <?= $service_row['service_name']; ?> </li>
                        </ul>
                    </div>
                </div>
                <div class="britcam-shape">
                    <div class="breadcumb-content upp">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> <?= $service_row['service_name']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->


    <!--==================================================-->
    <!-- Start consen service details Area -->
    <!--==================================================-->
    <div class="service-detials-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="consen-service-details-box">
                                <div class="consen-service-thumb">
                                    <img src="upload/services/<?= $service_row['service_img']; ?>" alt="">
                                </div>
                                <div class="service-details-content">
                                    <div class="service-page-title">
                                        <h2 class="service-title text-center"> <?= $service_row['service_headline']; ?></h2>
                                    </div>
                                    <div class="serivce-details-desc text-justify">
                                        <p><?= $service_row['service_description']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      


                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <?php include 'elements/service-sidebar.php'; ?>
                </div>

            </div>
        </div>
    </div>
    <!--==================================================-->
    <!-- End Consen service detials Area -->
    <!--==================================================-->
    <?php include 'elements/service-calculator.php'; ?>
    <?php include 'elements/testimonial.php'; ?>
    <!--------------------------------------------------->
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
    
    <?php
    $conn->close();
    ?>
</body>
</html>