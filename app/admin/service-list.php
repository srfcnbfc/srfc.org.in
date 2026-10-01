<?php include_once 'header.php'; ?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <h3>Service List</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item">Service List</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-4">
                    <!-- Bookmark Start-->
                    <div class="bookmark">
                         <a href="add-service" class="btn btn-success "><i class="fa fa-plus-circle"> ADD Service</i></a>
                    </div>
                   
                    <!-- Bookmark Ends-->
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
                      <h5>All Services Details </h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive product-table">
                      <table class="display" id="data-example">
                        <thead>
                          <tr>
                            <th>S.No.</th>
                            <th>Img</th>
                            <th>Service</th>
                            <th>Service Title </th>
                            <th>Status</th>
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
            "ajax": "modules/service/service-load.php",
            "columnDefs": [{
                    "searchable": false,
                    "orderable": true,
                    "targets": 0}

            ], "order": [[1, 'desc']]
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
            var servicecode = $(this).attr("id");
            swal("Are you sure to want delete? ", "", "warning", {
                buttons: {cancel: true, confirm: true}
            }).then((value) => {
                if (value === true) {
                    $.ajax({
                        url: "modules/service/service-delete.php",
                        method: "POST",
                        data: {code: servicecode},
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