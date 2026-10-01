<?php include_once 'header.php'; ?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Testimonial</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item">Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="email-wrap bookmark-wrap">
            <div class="row">
                <div class="col-sm-4">
                    <div class="email-sidebar">
                        <a class="btn btn-primary email-aside-toggle" href="javascript:void(0)"><i class="fa fa-plus"></i> Add Category</a>
                        <div class="email-left-aside">
                            <?php include_once 'modules/testimonials/testimonials-add.php'; ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="email-right-aside bookmark-tabcontent">
                        <div class="card email-body radius-left">
                            <div class="ps-0">
                                <?php include_once 'modules/testimonials/testimonial-list.php'; ?>
                            </div>
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
<script>
    $(document).ready(function () {
        $("#my-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "modules/testimonials/testimonials-save.php",
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    var data = JSON.parse(response);
                    $("#my-form")[0].reset();
                    swal(data[0].msg, "", data[0].status);
                    setTimeout(function () {
                        window.location = window.location;
                    }, 2000);
                }
            });
        });
    });

</script>



<script >
    $(document).ready(function () {
        $(document).on('click', '.changestatus', function () {
            var testimonialcode = $(this).attr("id");
            var statusData = document.getElementById(testimonialcode).value;
            if (statusData === "ACTIVE") {
                statusData = 'BLOCK';
            } else {
                statusData = 'ACTIVE';
            }
            $.ajax({
                url: "modules/testimonials/testimonial-status.php",
                method: "POST",
                data: {code: testimonialcode, status: statusData},
                success: function (response) {
                    var data = JSON.parse(response);
                    swal(data[0].msg, "", data[0].status);
                    setTimeout(function () {
                        window.location = window.location;
                    }, 2000);
                }
            });
        });
    });
</script>
<script >
    $(document).ready(function () {
        $(document).on('click', '.delete_data', function () {
            var categorycode = $(this).attr("id");
            swal("Are you sure to want delete? ", "", "warning", {
                buttons: {cancel: true, confirm: true}
            }).then((value) => {
                if (value === true) {
                    $.ajax({
                        url: "modules/testimonials/testimonial-delete.php",
                        method: "POST",
                        data: {code: categorycode},
                        success: function (response) {
                            var data = JSON.parse(response);
                            swal(data[0].msg, "", data[0].status);
                            setTimeout(function () {
                                window.location = window.location;
                            }, 2000);
                        }
                    });
                }
            });

        });
    });
</script>
<script >
    $(document).ready(function () {
        $(document).on('click', '.edit_data', function () {
            var categorycode = $(this).attr("id");
            $.ajax({
                url: "modules/testimonials/testimonial-edit.php",
                method: "POST",
                data: {code: categorycode},
                success: function (data) {
                    $("#modaldetails").html(data);
                    $("#viewModal").modal('show');
                }
            });
        });
    });</script>
</body>
</html>