<?php 
    require_once "../layout/header.php"; 
/**
 * THIS IS THE LANDING PAGE TO RUN THE BASIC TESTS OF FUNCTIONALITY:
 * 1) Call all Constructors
 * 2) Test all inheritance
 * 3) Test all aggregation
 * 4) Test function calls
 */
require 'User.php';
require 'Customer.php';
require 'Printer.php';
require 'Contact.php';
require 'Card.php';
require 'Editor.php';
require 'Gallery.php';
require 'Image.php';
require 'Order.php';
require 'Payment.php';

?>


<div class="row">
  <div class="column"></div>
  <div class="column"></div>
</div>


<?php require_once "../layout/footer.php";?>