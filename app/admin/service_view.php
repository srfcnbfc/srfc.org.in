<?php include_once 'header.php'; ?>
<?php
$service_code = mysqli_real_escape_string($conn, filter_input(INPUT_GET, 'id', FILTER_DEFAULT));
$sql = "SELECT * FROM service WHERE service_code= '$service_code'";
$service_data = getsingleData($sql);
?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <h3><?= $service_data['service_name']; ?></h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="service-list.php">Service</a></li>
                        <li class="breadcrumb-item"><?= $service_data['service_name']; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div>
            <div class="row product-page-main p-0">
                <div class="col-xl-5 col-md-6 box-col-12 xl-50">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col product-main">
                                    <div class="pro-slide-single">
                                        <div><img class="img-fluid" src="../../upload/services/<?= $service_data['service_img']; ?>" alt="" style="width:400px;height: 400px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 box-col-7 proorder-xl-3 xl-100">
                    <div class="card">
                        <div class="card-body">
                            <div class="pro-group pt-0 border-0">
                                <div class="product-page-details mt-0">
                                    <h3><?= strtoupper($service_data['service_name']); ?></h3>  
                                </div>

                            </div>
                            <div class="pro-group">
                                <h4><?= $service_data['service_headline']; ?></h4>
                                <p><?= $service_data['service_shrt_description']; ?></p>
                            </div>
                            <div class="pro-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td> <b>Status &nbsp;: &nbsp;</b></td>
                                                    <td class="txt-success"><?= $service_data['service_status']; ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                            <div class="pro-group pb-0">
                                <div class="pro-shop">
                                    <a class="btn btn-success" href="edit-service.php?service=<?= $service_data['service_code']; ?>"><i class="fa fa-edit me-2"></i>Edit Services</a>
                                    <a class="btn btn-info" href="faq-service.php?service=<?= $service_data['service_code']; ?>"><i class="fa fa-forward me-2"></i>Add FAQ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="row product-page-main">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs border-tab mb-0" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="false">Description</a>
                            <div class="material-border"></div>
                        </li>

                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                            <?= $service_data['service_description']; ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Container-fluid Ends-->
</div>





<?php include('elements/modal-container.php') ?>
<?php include_once 'footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
<script >
    $(document).ready(function () {
        $(document).on('click', '.product_images', function () {
            var productcode = $(this).attr("id");
            $.ajax({
                url: "modules/products/product-other-images.php",
                method: "POST",
                data: {code: productcode},
                success: function (data) {
                    $("#modaldetails").html(data);
                    $("#viewModal").modal('show');
                }
            });
        });
    });</script>
<script>
    $(document).ready(function () {
        $("#disp-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "modules/products/product-display-update.php",
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    var data = JSON.parse(response);
                    $("#disp-form")[0].reset();
                    swal(data[0].msg, "", data[0].status);
                    setTimeout(function () {
                        window.location = window.location;
                    }, 2000);
                }
            });
        });
    });

</script>
</body>
</html>