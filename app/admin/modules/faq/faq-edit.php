<?php
if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $faq_id = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    $sql = "SELECT * FROM faq WHERE faq_id= '$faq_id'";
    $faq_data = getsingleData($sql);
    ?>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit the FAQ Details</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form theme-form">
                <form autocomplete="off" id="edit-form" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>FAQ Question</label>
                                <input type="text" name="faq_ques" value="<?= $faq_data['faq_ques']; ?>" class="form-control"  placeholder="Enter FAQ Question *" required>
                                <input type="hidden" name="faq_id" value="<?= $faq_data['faq_id']; ?>" required >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>FAQ Answer</label>
                                <textarea name="faq_ans" class="form-control" id="exampleFormControlTextarea4" rows="3" required="" placeholder="Enter FAQ Answer"><?= $faq_data['faq_ans']; ?></textarea>
                            </div>
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="updatedata" value="faq_update">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>



    <script>
        $(document).ready(function () {
            $("#edit-form").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "modules/faq/faq-update.php",
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
