<?php include_once 'header.php'; ?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <h3>Contact</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item">Contact </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    
 <?php include_once 'modules/settings/basic/contact-setup.php'; ?>




    <!-- Container-fluid Ends-->
</div>



<?php include_once 'footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>

<script> 
    $(document).ready(function () {
        $("#contact-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "modules/settings/update/contact-update.php",
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    var data = JSON.parse(response);
                    
                    $("#contact-form")[0].reset();
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