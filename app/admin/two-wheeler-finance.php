<?php include_once 'header.php'; ?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <h3>Two Wheeler Finance List</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item">Two Wheeler Finance List</li>
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
                <?php include 'modules/financeenq/two-wheeler-finance-list.php'; ?>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>





    <!-- Container-fluid Ends-->
</div>




<?php include('elements/modal-container.php') ?>
<?php include_once 'footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
<script >
    $(document).ready(function () {
        $(document).on('click', '.delete_data', function () {
            var finance_id = $(this).attr("id");
            swal("Are you sure to want delete? ", "", "warning", {
                buttons: {cancel: true, confirm: true}
            }).then((value) => {
                if (value === true) {
                    $.ajax({
                        url: "modules/financeenq/two-wheeler-finance-delete.php",
                        method: "POST",
                        data: {code: finance_id},
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#table_id').DataTable({

                dom: 'Bfrtip',
                responsive: true,
                pageLength: 10,
                buttons: [{extend: 'print',
                        customize: function (win)
                        {
                            var last = null;
                            var current = null;
                            var bod = [];
                            var css = '@page { size: landscape;}',
                                    head = win.document.head || win.document.getElementsByTagName('head')[0],
                                    style = win.document.createElement('style');
                            style.type = 'text/css';
                            style.media = 'print';
                            if (style.styleSheet)
                            {
                                style.styleSheet.cssText = css;
                            } else
                            {
                                style.appendChild(win.document.createTextNode(css));
                            }

                            head.appendChild(style);
                        }
                    },
                    'copy', 'excel'
                ]

            });
        });
    </script>


</body>
</html>