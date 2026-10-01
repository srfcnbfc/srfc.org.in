<div class="card">
    <div class="card-header">
        <h5 class="card-title">Please Fill All the Details</h5>
    </div>
    <div class="card-body">

        <div class="form theme-form">
            <form autocomplete="off" id="my-form" method="POST" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>FAQ Question</label>
                            <input type="text" name="faq_ques"  class="form-control"  placeholder="Enter FAQ Question*" required>
                            <input type="hidden" name="service_code" value="<?= $service_row['service_code']; ?>"  required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>FAQ Answer</label>
                            <textarea name="faq_ans"class="form-control" id="exampleFormControlTextarea4" rows="3" required="" placeholder="Enter FAQ Answer"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="add_faq" class="btn btn-primary me-3" >Add FAQ</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>