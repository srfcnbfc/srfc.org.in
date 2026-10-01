<?php
include_once 'header.php';
?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Add Blog</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item">Add Blog</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>




    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-12">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>Add New Blog</h5><span>Please fill all the details carefully.</span>
                        </div>
                        <form class="theme-form" autocomplete="off" id="my-form" method="POST" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Blog Title</label>
                                            <input type="text" name="blog_title" id="blog_title" class="form-control"  placeholder="Blog Title*" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Blog Slug</label>
                                            <input type="text" name="blog_slug" id="blog_slug" class="form-control" aria-label="url" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Blog Tag</label>
                                            <input type="text" name="blog_tag"  class="form-control"  placeholder="Keywords *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Blog Image</label>
                                            <input name="blog_img" type="file" accept="image/png, image/jpeg" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Blog Meta Description (Max 150 Character)</label>
                                            <textarea name="blog_meta_descp" class="form-control" placeholder="Short Description" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Blog Post Description</label>
                                            <textarea name="blog_descp" id="summernote" class="form-control" rows="5" cols="5" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="add_blog" value="addblog" class="btn btn-primary">Add Blog</button>
                                <button type="reset"class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- Container-fluid Ends-->






</div>
<?php include_once 'footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- login js-->
<!-- Plugin used-->
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            tabsize: 2,
            height: 100
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#blog_title").keyup(function () {
            var str = $(this).val();
            var trims = $.trim(str);
            var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
            $("#blog_slug").val(slug.toLowerCase());
        });

        $('.addAttr').click(function () {
            var title = $(this).data('blog_title');
            $('#blog_title').val(title);
        });

    });
</script>



<script>
    $(document).ready(function () {
        $("#my-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "modules/blog/blog-save.php",
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    var data = JSON.parse(response);
                    $("#my-form")[0].reset();
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