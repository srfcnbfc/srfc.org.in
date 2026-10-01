<?php include_once 'header.php'; ?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Banner</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Setting</a></li>
                        <li class="breadcrumb-item">Banner</li>
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
                            <?php include_once 'modules/banner/banner-add-box.php'; ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="email-right-aside bookmark-tabcontent">
                        <div class="card email-body radius-left">
                            <div class="ps-0">
                                <?php include_once 'modules/banner/banner-list.php'; ?>
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
        $("#banner-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "modules/banner/banner-update.php",
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    var data = JSON.parse(response);
                    console.log(response);
                    $("#banner-form")[0].reset();
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
            var banner_id = $(this).attr("id");
            swal("Are you sure to want delete? ", "", "warning", {
                buttons: {cancel: true, confirm: true}
            }).then((value) => {
                if (value === true) {
                    $.ajax({
                        url: "modules/banner/banner-delete.php",
                        method: "POST",
                        data: {code: banner_id},
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

</body>
</html>