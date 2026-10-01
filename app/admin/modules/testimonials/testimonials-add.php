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
                            <label>Client Name</label>
                            <input type="text" name="client_name" id="category_name" class="form-control"  placeholder="Clients name *" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Client Designation</label>
                            <input type="text" name="client_designation" id="category_slug" class="form-control"  placeholder="Client Designation*" required>         
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Client Testimonial</label>
                            <textarea name="client_msg"class="form-control" id="exampleFormControlTextarea4" rows="3" required="" placeholder="Client Testimonial"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Client Image</label>
                            <input type="file" name="client_img" class="form-control" accept="image/png, image/jpeg" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="add_testimonial" class="btn btn-primary me-3" >Add Testimonials</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>