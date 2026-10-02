<?php 
require_once __DIR__ . '/header.php'; 
check_page_access(['SUPER_ADMIN']);
?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <h3>Enquiry</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item">Enquiry</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid list-products">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>All Enquiry Details </h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="display" id="data-example">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Time</th>
                                        <th>Name</th>
                                        <th>Mobile </th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>





    <!-- Container-fluid Ends-->
</div>




<?php include('elements/modal-container.php') ?>
<?php include_once 'footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
<script>
    $(document).ready(function () {
        var table = $('#data-example').DataTable({
            "paging": true,
            "stateSave": true,
            "info": true,
            "processing": true,
            "serverSide": true,
            "ajax": "modules/enquiry/enquiry-load.php",
            "columnDefs": [{
                    "searchable": false,
                    "orderable": true,
                    "targets": 0}

            ], "order": [[0, 'desc']]
        });
        table.on('draw.dt', function () {
            var info = table.page.info();
            table.column(0, {search: 'applied', order: 'applied', page: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1 + info.start;
            });
        });
    });
</script>

<script >
    $(document).ready(function () {
        $(document).on('click', '.delete_data', function () {
            var enquiry_id = $(this).attr("id");
            swal("Are you sure to want delete? ", "", "warning", {
                buttons: {cancel: true, confirm: true}
            }).then((value) => {
                if (value === true) {
                    $.ajax({
                        url: "modules/enquiry/enquiry-delete.php",
                        method: "POST",
                        data: {code: enquiry_id},
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
        $(document).on('click', '.send_email', function () {
            var enq_id = $(this).attr("id");
            $.ajax({
                url: "modules/enquiry/enquiry-email.php",
                method: "POST",
                data: {code: enq_id},
                success: function (data) {
                    $("#modaldetails").html(data);
                    $("#viewModal").modal('show');
                }
            });
        });
    });</script>
</body>
</html>