<?php include_once 'header.php'; ?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <h3>Social Media</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item">Social Media  </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    
<?php include_once 'modules/settings/basic/social-media-update.php'; ?>




    <!-- Container-fluid Ends-->
</div>

<?php include_once 'footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
<script> /* Social Script */
    $(document).ready(function () {
        $("#social-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "modules/settings/update/social-update.php",
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    var data = JSON.parse(response);
                    $("#social-form")[0].reset();
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