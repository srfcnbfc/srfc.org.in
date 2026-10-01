<?php include_once 'header.php'; ?>
<?php
$investor_doc_sql = "SELECT * FROM investor_doc_type ORDER by doc_id ASC ";
$investor_doc_row = getData($investor_doc_sql);
?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Investor Documents</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item">Investor Documents</li>
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
                        <a class="btn btn-primary email-aside-toggle" href="javascript:void(0)"><i class="fa fa-plus"></i> Add Investor Documents Type</a>
                        <div class="email-left-aside">
                            <?php include_once 'modules/investor-documents/add-investor-doc-type.php'; ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="email-right-aside bookmark-tabcontent">
                        <div class="card email-body radius-left">
                            <div class="ps-0">
                                <?php include_once 'modules/investor-documents/investor-doc-category-list.php'; ?>
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
        $("#investor-doc-category-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "modules/investor-documents/investor-doc-category-save.php",
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    var data = JSON.parse(response);
                    $("#investor-doc-category-form")[0].reset();
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
            var doc_cat_id = $(this).attr("id");
            swal("Are you sure to want delete? ", "", "warning", {
                buttons: {cancel: true, confirm: true}
            }).then((value) => {
                if (value === true) {
                    $.ajax({
                        url: "modules/investor-documents/investor-doc-category-delete.php",
                        method: "POST",
                        data: {code: doc_cat_id},
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