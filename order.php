<?php 
require 'includes/header.php';
require 'classes/sandwich.php';
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
      ?>
    </div>
</div>

<?php
// mollie
// instantier mollie object
// geef beschrijving - $email."-".$order->whatType()
// geef totaal mee - $order->calculate()
// redirect to thankyou.php
// optional webhook for update mysql to status paid/failed/open ...
// https://help.mollie.com/hc/nl/articles/115001488025-Wat-betekenen-de-statussen-van-transacties-
?>

<?php
require 'includes/footer.php';
?>