<?php
function service_count() {
    $query = "SELECT COUNT(service_id) as 'serviceCount' from service WHERE service_status= 'ACTIVE' ";
    $sumquery = mysqli_query($GLOBALS['conn'], $query)or die(mysqli_error($GLOBALS['conn']));
    $countData = mysqli_fetch_assoc($sumquery);
    return array('total' => $countData['serviceCount']);
}
function blog_count() {
    $query = "SELECT COUNT(blog_id) as 'blogCount' from blog";
    $sumquery = mysqli_query($GLOBALS['conn'], $query)or die(mysqli_error($GLOBALS['conn']));
    $countData = mysqli_fetch_assoc($sumquery);
    return array('total' => $countData['blogCount']);
}
function testimonial_count() {
    $query = "SELECT COUNT(testimonial_id) as 'testimonialCount' from testimonial WHERE testimonial_status='ACTIVE'";
    $sumquery = mysqli_query($GLOBALS['conn'], $query)or die(mysqli_error($GLOBALS['conn']));
    $countData = mysqli_fetch_assoc($sumquery);
    return array('total' => $countData['testimonialCount']);
}
function enquiry_count() {
    $query = "SELECT COUNT(enq_id) as 'enquiryCount' from enquiry ";
    $sumquery = mysqli_query($GLOBALS['conn'], $query)or die(mysqli_error($GLOBALS['conn']));
    $countData = mysqli_fetch_assoc($sumquery);
    return array('total' => $countData['enquiryCount']);
}
function resume_count() {
    $query = "SELECT COUNT(resume_id) as 'resumeCount' from job_resume ";
    $sumquery = mysqli_query($GLOBALS['conn'], $query)or die(mysqli_error($GLOBALS['conn']));
    $countData = mysqli_fetch_assoc($sumquery);
    return array('total' => $countData['resumeCount']);
}
function investor_count() {
    $query = "SELECT COUNT(investor_id) as 'investorCount' from investor";
    $sumquery = mysqli_query($GLOBALS['conn'], $query)or die(mysqli_error($GLOBALS['conn']));
    $countData = mysqli_fetch_assoc($sumquery);
    return array('total' => $countData['investorCount']);
}
/////////////////////////////////////////////////////////////////////////////////
////////////////Finance Count//////////////////////
function refinance_count() {
    $query = "SELECT COUNT(refinance_loan_id) as 'refinanceCount' from refinance_loan";
    $sumquery = mysqli_query($GLOBALS['conn'], $query)or die(mysqli_error($GLOBALS['conn']));
    $countData = mysqli_fetch_assoc($sumquery);
    return array('total' => $countData['refinanceCount']);
}
function two_wheeler_finance_count() {
    $query = "SELECT COUNT(two_finance_id) as 'two_wheeler_financeCount' from two_wheeler_finance";
    $sumquery = mysqli_query($GLOBALS['conn'], $query)or die(mysqli_error($GLOBALS['conn']));
    $countData = mysqli_fetch_assoc($sumquery);
    return array('total' => $countData['two_wheeler_financeCount']);
}
function personal_loan_count() {
    $query = "SELECT COUNT(personal_loan_id) as 'personal_loan' from personal_loan";
    $sumquery = mysqli_query($GLOBALS['conn'], $query)or die(mysqli_error($GLOBALS['conn']));
    $countData = mysqli_fetch_assoc($sumquery);
    return array('total' => $countData['personal_loan']);
}
function business_loan_count() {
    $query = "SELECT COUNT(business_loan_id) as 'business_loanCount' from business_loan";
    $sumquery = mysqli_query($GLOBALS['conn'], $query)or die(mysqli_error($GLOBALS['conn']));
    $countData = mysqli_fetch_assoc($sumquery);
    return array('total' => $countData['business_loanCount']);
}
function tractor_loan_count() {
    $query = "SELECT COUNT(tractor_ref_id) as 'tractor_loanCount' from tractor_refinance";
    $sumquery = mysqli_query($GLOBALS['conn'], $query)or die(mysqli_error($GLOBALS['conn']));
    $countData = mysqli_fetch_assoc($sumquery);
    return array('total' => $countData['tractor_loanCount']);
}
?>