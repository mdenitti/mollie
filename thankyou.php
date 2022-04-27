<?php
session_start();
include 'includes/header.php';
require_once('vendor/autoload.php');
?>
<div class="container mt-3">
    <div class="row">
        <h3>Thank you</h3>

        <?php 
        // check if session status of payment has gone trough
        print_r($_SESSION['status'])
        
        // instantiate a mollie object for communication with mollie servers
        $mollie = new \Mollie\Api\MollieApiClient();
        
        // Set api key
        $mollie->setApiKey("test_57M5WVvEFJEQ5PSrq553GnEGADQySA");

        // Get payment details with help of mollie_id in our sessions - status
        $payment = $mollie->payments->get($_SESSION['status']);
       
        // Show all payment details... AND write your biz logic accordingly
        print_r($payment);
        ?>
    </div>  
</div>
<?
include 'includes/footer.php';