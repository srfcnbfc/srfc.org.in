<?php
if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $testimonial_id = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    $sql = "SELECT * FROM testimonial WHERE testimonial_id= '$testimonial_id'";
    $testimonial_data = getsingleData($sql);
    ?>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit the Testimonial Details</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form theme-form">
                 <form autocomplete="off" id="edit-form" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Client Name</label>
                                <input type="hidden" name="testimonial_id" value="<?= $testimonial_id; ?>" required>
                                <input type="text" name="client_name" value="<?= $testimonial_data['person_name']; ?>" class="form-control"  placeholder="Client name *" required>
                            </div>
                        </div>
                    </div>
                  <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Client Designation</label>
                                <input type="text" name="client_designation" value="<?= $testimonial_data['person_designation']; ?>"  class="form-control"  placeholder="Client Designation *" required>
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Client Message</label>
                                <textarea name="client_msg" class="form-control" id="exampleFormControlTextarea4" rows="3" required="" placeholder="Client Message"><?= $testimonial_data['testimonial_description']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Client Image 
                                    <span class="form-check-inline text-info"> ( <input type="checkbox" name="enableimg" id="chkimg" value="img_enable">If you want to Change)</span></label>
                                <input type="file" name="client_img" class="form-control" accept="image/png, image/jpeg" id="imagechange" disabled required>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="updatedata" value="client_update">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#chkimg').change(function () {
                var changeimg = document.getElementById("imagechange");
                changeimg.disabled = chkimg.checked ? false : true;
                if (!changeimg.disabled) {
                    changeimg.focus();
                }
            });
        });
    </script>
<script>
    $(document).ready(function () {
        $("#edit-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "modules/testimonials/testimonial-update.php",
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response)
                    var data = JSON.parse(response);
                    $("#edit-form")[0].reset();
                    swal(data[0].msg, "", data[0].status);
                    setTimeout(function () {
                        window.location = window.location;
                    }, 2000);
                }
            });
        });
    });

</script>
    <?php
}
?>
