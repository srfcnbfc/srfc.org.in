<?php include_once 'header.php'; ?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <h3>Email</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item">Email </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    
<?php include_once 'modules/settings/basic/email-setup.php'; ?>

    <!-- Container-fluid Ends-->
</div>

<?php include_once 'footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- login js-->
<!-- Plugin used-->
<script>
    $(document).ready(function() {
   $('#summernote').summernote({
        tabsize: 2,
        height: 100
      });
});
</script>
<script> /* SEO Script */
    $(document).ready(function () {
        $("#email-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "modules/settings/update/email-update.php",
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    var data = JSON.parse(response);
                    $("#email-form")[0].reset();
                    swal(data[0].msg, "", data[0].status);
                    setTimeout(function () {
                        window.location = window.location;
                    }, 2000);
                }
            });
        });
    });
</script>

</body>
</html>