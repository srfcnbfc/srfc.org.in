<?php

if (!empty($_POST['docu_name'])) {
    include_once '../../../config/config.php';
    $investor_doc_cat = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'investor_doc_cat', FILTER_DEFAULT));
    $investor_docu_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'docu_name', FILTER_DEFAULT));
    $investor_docu_year = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'docu_year', FILTER_DEFAULT));

    ///////////////////////////////////////////////////////////////////
    $tempDir = "../../../../upload/investor-documents";
    clearstatcache();
    if (!file_exists($tempDir)) {
        mkdir($tempDir, 0777, true);
    }
    $filename = $_FILES['investor_doc']['name'];
    // Valid extension
    $valid_ext = array('docx', 'ppt', 'xlsx', 'xls', 'docs', 'doc','pdf');
    $docuExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
    $phototest1 = strtolower($docuExt1);
    $docuname = substr(md5(mt_rand()), 0, 3) . '.' . $phototest1;
    $location = $tempDir . '/' . $docuname;

    $fileextension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($fileextension);
    if (in_array($file_extension, $valid_ext)) {
        if (move_uploaded_file($_FILES['investor_doc']['tmp_name'], $location)) {
            $out_stauts = "success";
            $message = "{$docuname} successfully uploaded";
        } else {
            $out_stauts = "warning";
            $message = "Error: uploading {$tempDir}";
        }
        ///////////////////////////////////////////////////////////////////

        $search_query = "SELECT * FROM investor_docs_data WHERE document_name='$investor_docu_name'";
        $result = mysqli_query($conn, $search_query) or die(mysqli_error());
//print_r($result);
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $message = "Investor Document is Already Exist.";
        } else {
            $sql = "INSERT INTO investor_docs_data (document_name, document_year, document_cat, document_file)"
                    . "VALUES ('$investor_docu_name','$investor_docu_year','$investor_doc_cat' ,'$docuname')";

            if ($conn->query($sql) === TRUE) {
                $out_stauts = "success";
                $message = "Investor Document is Succesfully Added";
            } else {
                $out_stauts = "warning";
                $message = "Investor Document Not Added";
            }
        }
        $conn->close();
    } else {
        $out_stauts = "warning";
        $message = "Investor Document Uploading Failed !";
    }
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>