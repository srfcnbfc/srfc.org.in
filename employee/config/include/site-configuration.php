<?php

$site_title = "Shri Ram Finance Corporation pvt ltd | Business Loan | Personal Loan | Bike Finance | Tractor Finance | Car Finance";
$site_location = 'https://' . filter_input(INPUT_SERVER, 'HTTP_HOST') . filter_input(INPUT_SERVER, 'REQUEST_URI');
$site_keyword = "Shri ram finance, ";
$site_description = "Shriram Finance offers Deposits: FD, RD, Personal, Business, Bike, Gold, and Commercial vehicle loans. Shriram Finance India's No.1 NBFC, Get your loan with Quick approval and fast disbursal of loans.";
$site_image = filter_input(INPUT_SERVER, 'HTTP_HOST') . "/upload/logo.png";

$investor_sql = "SELECT * FROM investor ORDER BY investor_id DESC";
$investor_row = getData($investor_sql);

$blog_sql = "SELECT blog_id,blog_title,blog_slug, blog_img FROM blog ORDER BY blog_id DESC";
$blog_row = getData($blog_sql);

$service_menu_sql = "SELECT service_id, service_slug, service_name, service_headline, service_img, service_status FROM service WHERE service_status='ACTIVE'";
$service_menu_row = getData($service_menu_sql);
/* -----------------Social Links ---------------------------- */
$social_sql = "SELECT * FROM social_links WHERE 1";
$social_data = getsingleData($social_sql);
$facebook_link = $social_data['facebook'];
$instagram_link = $social_data['instagram'];
$twitter_link = $social_data['twitter'];
$linkedin_link = $social_data['linkedin'];
$whatsapp_link = $social_data['whatsapp'];
/* -----------------End Social Links ---------------------------- */

/* -----------------Contact Call ---------------------------- */
$contact_sql = "SELECT * FROM contact WHERE 1";
$contact_data = getsingleData($contact_sql);
$mobile_no = $contact_data['contact_no'];
$email  = $contact_data['contact_email'];
$office_hq_adress  = $contact_data['contact_address'];
$office_hq_map  = $contact_data['contact_map'];
/* -----------------Contact Call ---------------------------- */

function employeecodecheck($emp_code) {
    $emp_name = "ALL";
    $sqlQuery = "SELECT emp_code, emp_name FROM employee WHERE emp_code='$emp_code'";
    $count = getNumRows($sqlQuery);
    if ($count > 0) {
        $row = getsingleData($sqlQuery);
        $emp_name = $row['emp_name'];
    }
    return array('employee_name' => $emp_name);
}
?>
