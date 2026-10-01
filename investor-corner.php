<!DOCTYPE HTML>
<html lang="en-US">
    <?php
    include 'app/config/front-config.php';
    $investor_doc_url = mysqli_real_escape_string($conn, filter_input(INPUT_GET, 'investor-doc-url', FILTER_SANITIZE_URL));
    $investor_doc_sql = "SELECT * FROM investor_doc_type WHERE doc_type_url ='$investor_doc_url'";
    
    
    if (getNumRows($investor_doc_sql) > 0) {
        $investor_doc_row = getsingleData($investor_doc_sql);
        $doc_type_name = $investor_doc_row['doc_type'];
        $doc_type_id = $investor_doc_row['doc_id'];
        $doc_type_url = $investor_doc_row['doc_type_url'];
        
        $social_img = '';
        $meta_keyword = $doc_type_name;
        $meta_descp = $doc_type_name;
    } else {
        echo "<script>window.history.back();</script>";
    }
    ?>
    <?php include 'header.php'; ?>

    <!--------------------------------------------------->
    <!--Start Header Slider Section -->
    <!--===================================================-->
    <div class="breadcumb-area d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h1> <?= $investor_row['doc_type']; ?> </h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> Investor Corner </li>
                        </ul>
                    </div>
                </div>
                <div class="britcam-shape">
                    <div class="breadcumb-content upp">
                        <ul>
                            <li><a href="/">Home</a></li>
                           <li> Investor Corner </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->


    <!--==================================================-->
    <!-- Start consen service details Area -->
    <!--==================================================-->
    <div class="blog-section style-two details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="mb-5"><?= $doc_type_name ; ?> & Reports</h2>
                    <!--<h2 class="mb-5">Annual Reports</h2>-->
                    <?php
                    $i=1;
                    $investor_doc_cat_sql = "SELECT * FROM  investor_doc_category WHERE investor_doc_type ='$doc_type_id' ";
                    $investor_doc_cat_row = getData($investor_doc_cat_sql);
                    foreach ($investor_doc_cat_row as $key => $document_cat_row) { 
                    $cat_id = $document_cat_row['cat_id'];
                    ?>
                    <table class="table">
                        <thead class="table-info">
                          <tr></tr>  <!--<th colspan="3"><?= strtoupper($document_cat_row['investor_category_name']); ?></th>--></tr>
                        </thead>
                        <tbody>
                           <!--<h2 class="mb-5">Annual Return</h2> -->
                           <?php 
                           $docs_sql = "SELECT * FROM  investor_docs_data WHERE document_cat ='$cat_id' ";
                           $docs_row = getData($docs_sql);
                           
                           foreach ($docs_row as $key => $investor_data_row) { ?>
                            <tr>
                            <td><?= $i++; ?>.</td>
                            <td><?= $investor_data_row['document_name']?></td>
                            <td><a href="upload/investor-documents/<?= $investor_data_row['document_file']; ?>" class="btn btn-success btns-xs" download><i class="fa fa-download"></i> Download</a></td>
                            </tr>
                            <?php } 
                            $i=1; ?>
                            
                        </tbody>
                    </table>
                    
                        
                    <?php } 
                    
                    ?>
                    
                    
                    
                </div>
                <div class="col-lg-4 col-md-8">
                    <?php include_once 'elements/investor-corner-sidebar.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!-- End Consen service detials Area -->
    <!--==================================================-->
    <?php include 'elements/calculator.php'; ?>
    <?php include 'elements/testimonial.php'; ?>

    <!--------------------------------------------------->
    <?php include 'footer.php'; ?>
    <!------------------Whatsapp---------------------------->
    <script type="text/javascript" async >
        if (typeof wabtn4fg === "undefined") {
            wabtn4fg = 1;
            h = document.head || document.getElementsByTagName("head")[0], s = document.createElement("script");
            s.type = "text/javascript";
            s.src = <?= filter_input(INPUT_SERVER, 'HTTP_HOST'); ?>"/whatsapp.js";
                    h.appendChild(s);
        }
    </script>

    <?php
    mysqli_close($conn);
    ?>
</body>
</html>