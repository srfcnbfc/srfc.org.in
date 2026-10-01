<?php include_once 'header.php'; ?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Employee</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item">Employee</li>
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
                        <a class="btn btn-primary email-aside-toggle" href="javascript:void(0)"><i class="fa fa-plus"></i> Add Employee</a>
                        <div class="email-left-aside">
                            <?php include_once 'modules/employee/employee-add.php'; ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="email-right-aside bookmark-tabcontent">
                        <div class="card email-body radius-left">
                            <div class="ps-0">
                                <?php include_once 'modules/employee/employee-list.php'; ?>
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
                url: "modules/employee/employee-save.php",
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
            var employeecode = $(this).attr("id");
            var statusData = document.getElementById(employeecode).value;
            if (statusData === "ACTIVE") {
                statusData = 'BLOCK';
            } else {
                statusData = 'ACTIVE';
            }
            $.ajax({
                url: "modules/employee/employee-status.php",
                method: "POST",
                data: {code: employeecode, status: statusData},
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
            var employeecode = $(this).attr("id");
            swal("Are you sure to want delete? ", "", "warning", {
                buttons: {cancel: true, confirm: true}
            }).then((value) => {
                if (value === true) {
                    $.ajax({
                        url: "modules/employee/employee-delete.php",
                        method: "POST",
                        data: {code: employeecode},
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
            var employeecode = $(this).attr("id");
            $.ajax({
                url: "modules/employee/employee-edit.php",
                method: "POST",
                data: {code: employeecode},
                success: function (data) {
                    $("#modaldetails").html(data);
                    $("#viewModal").modal('show');
                }
            });
        });
    });</script>
</body>
</html>