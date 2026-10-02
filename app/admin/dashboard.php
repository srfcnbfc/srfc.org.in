<?php 
require_once __DIR__ . '/header.php'; 
check_page_access(['SUPER_ADMIN', 'HR', 'CS']);
?>
<?php
$serviceCount = service_count();
$blogCount = blog_count();
$testimonialCount = testimonial_count();
$resumeCount = resume_count();
$enquiryCount = enquiry_count();
$investorCount = investor_count();
/////////////////////////////
$refinanceCount = refinance_count();
$two_wheeler_financeCount = two_wheeler_finance_count();
$personal_loanCount = personal_loan_count();
$business_loanCount = business_loan_count();
$tractor_loanCount = tractor_loan_count()
?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid general-widget">
        <div class="row">
            <div class="col-sm-12 col-xl-7 col-lg-7">
                <div class="row">
                    <div class="col-sm-6 col-xl-4 col-lg-4">
                        <div class="card o-hidden border-0">
                            <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i data-feather="database"></i></div>
                                    <div class="media-body"><span class="m-0">Services</span>
                                        <h4 class="mb-0 counter"><?= $serviceCount['total']; ?></h4><i class="icon-bg" data-feather="database"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4 col-lg-4">
                        <div class="card o-hidden border-0">
                            <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i data-feather="database"></i></div>
                                    <div class="media-body"><span class="m-0">Blog</span>
                                        <h4 class="mb-0 counter"><?= $blogCount['total']; ?></h4><i class="icon-bg" data-feather="database"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4 col-lg-4">
                        <div class="card o-hidden border-0">
                            <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i data-feather="database"></i></div>
                                    <div class="media-body"><span class="m-0">Testimonials</span>
                                        <h4 class="mb-0 counter"><?= $testimonialCount['total']; ?></h4><i class="icon-bg" data-feather="database"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4 col-lg-4">
                        <div class="card o-hidden border-0">
                            <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i data-feather="database"></i></div>
                                    <div class="media-body"><span class="m-0">Resumes</span>
                                        <h4 class="mb-0 counter"><?= $resumeCount['total']; ?></h4><i class="icon-bg" data-feather="database"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4 col-lg-4">
                        <div class="card o-hidden border-0">
                            <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i data-feather="database"></i></div>
                                    <div class="media-body"><span class="m-0">Investor</span>
                                        <h4 class="mb-0 counter"><?= $investorCount['total']; ?></h4><i class="icon-bg" data-feather="database"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4 col-lg-4">
                        <div class="card o-hidden border-0">
                            <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i data-feather="database"></i></div>
                                    <div class="media-body"><span class="m-0">Enquiry</span>
                                        <h4 class="mb-0 counter"><?= $enquiryCount['total']; ?></h4><i class="icon-bg" data-feather="database"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 col-xl-5 col-lg-5">
                <div class="card latest-update-sec">
                    <div class="card-header">
                        <div class="header-top d-sm-flex align-items-center">
                            <h5>Finance Enquiry</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordernone">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body"><i class="fa fa-forward"></i><span> Refinance Loan</span></div>
                                            </div>
                                        </td>
                                        <td><?= $refinanceCount['total']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body"><i class="fa fa-forward"></i><span> Two Wheeler Finance</span></div>
                                            </div>
                                        </td>
                                        <td><?= $two_wheeler_financeCount['total']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body"><i class="fa fa-forward"></i><span> Personal Loan</span></div>
                                            </div>
                                        </td>
                                        <td><?= $personal_loanCount['total']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body"><i class="fa fa-forward"></i><span> Business Loan</span></div>
                                            </div>
                                        </td>
                                        <td><?= $business_loanCount['total']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body"><i class="fa fa-forward"></i><span> Tractor Refinance Loan</span></div>
                                            </div>
                                        </td>
                                        <td><?= $tractor_loanCount['total']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>


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