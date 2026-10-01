<?php include_once 'header.php'; ?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <h3>Backup</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item">Backup </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
             <div class="col-lg-4 col-md-4 col-sm-12">
            <img src="../../upload/other/backup.jpg" class="img-fluid">
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header bg-success">
                    <h4 class="card-title"> Download Your Configuration Backup</h4>
                </div>
                <div class="card-body">
                    <h4>Click the "Download" button bellow to download the current system configuration.</h4>
                    <p>This configuration file can be used to restore this system's configuration onto a replacement system should you need to undergo system replacement.</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success btn-lg" id="download_backup"> <i class="fa fa-database"></i> Download</button>
                </div>
            </div>
        </div>
        </div>
       
    </div>    





    <!-- Container-fluid Ends-->
</div>

<?php include_once 'footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
<script >
    $(document).ready(function () {
        $(document).on('click', '#download_backup', function () {
            swal("Are you sure to want Backup Download? ", "", "warning", {
                buttons: {cancel: true, confirm: true}
            }).then((value) => {
                if (value === true) {
                     window.location = 'mybackup.php';
                }
            });

        });
    });
</script>
</body>
</html>