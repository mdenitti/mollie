<?php
session_start();
require 'includes/header.php';
require 'classes/sandwich.php';
require 'classes/payment.php';
require_once('vendor/autoload.php');
$type = $_REQUEST['type'];
$email = $_REQUEST['email'];
// print_r($_REQUEST['topping']);
// the use of a ternary operator shortens the amount of code
isset($_REQUEST['topping']) ? $topping = $_REQUEST['topping']: $topping=[];

//identical as:
// if (isset($_REQUEST['topping'])) {
//   $topping = $_REQUEST['topping']
// } else {
//   $topping=[]
// }

$order = new Sandwich($type,$topping);
// parameters alwasy received by the __construct method
?>
<div class="container mt-3">
    <div class="row">
    
      <?php
      echo "<h3>Uw bestelling ".$email."</h3>";
      echo "<h4>".$order->whatType()." Special</h4> <hr>";
     
        foreach($order->whatTopping() as $topping) {
          echo "<li>".$topping."</li>";
        }
     
      echo "<br><br><b>Totaal te betalen:</b> <h4 class='total'>".$order->calculate()." €</h4>";

      $mollie = new \Mollie\Api\MollieApiClient();
      $mollie->setApiKey("test_57M5WVvEFJEQ5PSrq553GnEGADQySA");
      $payment = $mollie->payments->create([
            "amount" => [
                  "currency" => "EUR",
                  "value" => $order->calculate() // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => $order->whatType(),
            "redirectUrl" => "http://localhost:8000/thankyou.php",
            "metadata" => [
                  "order_id" => "12345",
                  // add the last inserted mysql id (hence the latest order)
            ],
      ]);

      // before redirecting to the checkout URL... the payment id is already available...
      $_SESSION['status']= $payment->id;
      //echo $payment->id;
      echo "<a class='btn btn-primary' href='".$payment->getCheckoutUrl()."'>PAY</a>";

    ?>
    </div>
</div>

<?php
// mollie
// instantier mollie object
// geef beschrijving - $email."-".$order->whatType()
// geef totaal mee - $order->calculate()
// optional webhook for update mysql to status paid/failed/open ...
// https://help.mollie.com/hc/nl/articles/115001488025-Wat-betekenen-de-statussen-van-transacties-
// redirect naar thankyou
// get request om details op te vragen en actie te ondernemen
?>

<?php
require 'includes/footer.php';
?>