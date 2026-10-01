<?php include_once 'header.php'; ?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-6 col-md-8">
                    <h3>TDS Declaration – Form 121</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="investor">Investor</a></li>
                        <li class="breadcrumb-item active">TDS Form 121</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-4 text-end">
                    <a href="modules/tds/tds-export.php" class="btn btn-success btn-sm" title="Export all submissions to Excel / CSV">
                        <i class="fa fa-file-excel-o"></i> Export CSV
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid list-products">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Investor Form 121 Submissions</h5>
                            <span class="text-muted f-12">Submissions received from the investor portal for Accounts Team review</span>
                        </div>
                        <div>
                            <button id="btn-refresh" class="btn btn-outline-primary btn-xs" title="Refresh Table">
                                <i class="fa fa-refresh"></i> Refresh
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="display table table-striped table-bordered" id="tds-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">S.No.</th>
                                        <th style="width: 130px;">Date & Time</th>
                                        <th>Investor Name</th>
                                        <th>ISIN</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Form 121</th>
                                        <th style="width: 130px;">Status</th>
                                        <th style="width: 60px;">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<?php include('elements/modal-container.php'); ?>
<?php include_once 'footer.php'; ?>

<script>
    $(document).ready(function () {
        var table = $('#tds-table').DataTable({
            "paging": true,
            "stateSave": true,
            "info": true,
            "processing": true,
            "serverSide": true,
            "ajax": "modules/tds/tds-load.php",
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 6, 7, 8]
                }
            ],
            "order": [[1, 'desc']]
        });

        table.on('draw.dt', function () {
            var info = table.page.info();
            table.column(0, {search: 'applied', order: 'applied', page: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1 + info.start;
            });
        });

        // Refresh button
        $('#btn-refresh').on('click', function () {
            table.ajax.reload(null, false);
        });

        // Status change handler
        $(document).on('change', '.change-status', function () {
            var selectElem = $(this);
            var recordId = selectElem.data('id');
            var newStatus = selectElem.val();

            $.ajax({
                url: "modules/tds/tds-status.php",
                method: "POST",
                data: { id: recordId, status: newStatus },
                dataType: "json",
                success: function (res) {
                    if (res.status === 'success') {
                        swal("Status Updated", res.msg, "success");
                    } else {
                        swal("Error", res.msg, "warning");
                        table.ajax.reload(null, false);
                    }
                },
                error: function () {
                    swal("Error", "Could not connect to the server.", "error");
                    table.ajax.reload(null, false);
                }
            });
        });

        // Delete handler
        $(document).on('click', '.delete_data', function () {
            var recordId = $(this).attr("id");
            swal({
                title: "Are you sure?",
                text: "This will permanently remove the submission and uploaded Form 121 document.",
                icon: "warning",
                buttons: ["Cancel", "Yes, delete it!"],
                dangerMode: true
            }).then(function (willDelete) {
                if (willDelete) {
                    $.ajax({
                        url: "modules/tds/tds-delete.php",
                        method: "POST",
                        data: { code: recordId },
                        dataType: "json",
                        success: function (res) {
                            if (res.status === 'success') {
                                swal("Deleted!", res.msg, "success");
                                table.ajax.reload(null, false);
                            } else {
                                swal("Error", res.msg, "warning");
                            }
                        },
                        error: function () {
                            swal("Error", "Failed to delete record.", "error");
                        }
                    });
                }
            });
        });
    });
</script>
