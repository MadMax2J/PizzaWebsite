<?php
/**
 * This order.php is simple enough.
 * It initialises a few variables and calls up the Form html file.
 */

$submitButtonText = 'Place Order';
//$thisOrderUrl = 'vieworder.php';
$order = array();

$order_id = $order["id"] = $order["order_id"] = $order["student"] = $order["firstname"] = $order["lastname"] =
    $order["email"] = $order["address"] = $order["phone"] = $order["price"] = $order["size"] = $order["anchovies"] =
        $order["pineapples"] = $order["pepperoni"] = $order["olives"] = $order["onions"] = $order['peppers'] = $order["createddatetime"] =
            $order["views"] = $update = $delete = "";


include 'pizza_selection_form.html.php';
?>
