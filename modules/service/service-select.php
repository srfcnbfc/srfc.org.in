<?php

$service = htmlspecialchars(filter_input(INPUT_POST, 'service', FILTER_DEFAULT));

if ($service === 'Two Wheeler Finance') {
    include_once 'form/two-wheeler-finance-form.php';
} elseif ($service === 'Refinance Loan') {
    include_once 'form/refinance-loan-form.php';
} elseif ($service === 'Personal Loan') {
    include_once 'form/personal-loan-form.php';
} elseif ($service === 'Business Loan') {
    include_once 'form/business-loan-form.php';
} elseif ($service === 'Tractor Refinance') {
    include_once 'form/tractor-refinance-form.php';  
}
?>
