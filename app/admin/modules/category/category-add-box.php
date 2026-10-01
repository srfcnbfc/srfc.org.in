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
                            <label>Category Name</label>
                            <input type="text" name="category_name" id="category_name" class="form-control"  placeholder="Category name *" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Category Name</label>
                            <input type="text" name="category_slug" id="category_slug" class="form-control"  placeholder="Category Url *" required>         
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Category Short Description</label>
                            <textarea name="category_description"class="form-control" id="exampleFormControlTextarea4" rows="3" required="" placeholder="Category Short Description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Category Image</label>
                            <input type="file" name="category_img" class="form-control" accept="image/png, image/jpeg" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="add_data" class="btn btn-primary me-3" >Add Category</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>