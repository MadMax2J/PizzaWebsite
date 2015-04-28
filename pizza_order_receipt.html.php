<!DOCTYPE html>
<html>

<!--
This file should not be called directly.
All variables must be initialised before this file is called.


$order_id
$order["size"]
$order["createddatetime"]
$ingredients

-->

<head lang="en">
    <meta charset="UTF-8">
    <title>Pizza - Order Receipt</title>
</head>
<body>

<H1> Order Receipt </H1>
<br>
<H3> Pizza Delivery Ltd. </H3>
<br>
<p> Thank you <?php echo $order['firstname']; ?> for choosing Pizza Delivery Ltd. </p>
<p> Please check the detail in the summary below...</p>
<br>
<p>Summary of Order#: <?php echo $order_id; ?>...</p>
<p>You have ordered a <?php echo $order["size"]; ?> pizza with <?php echo $ingredients; ?>.</p>
<p>You placed your order at <?php echo $order["createddatetime"]; ?> and you should expect delivery in around 30 minutes to the following address...</p>
<br>
<p><?php echo $order['firstname'] . " " . $order['lastname'] . ","; ?></p>
<p><?php echo $order["address"] . ","; ?></p>
<p><?php echo $order["phone"] . ","; ?></p>
<p><?php echo $order["email"] . "."; ?></p>
<br>
<p> The total cost of your order including delivery is €<?php echo $order["price"]; ?> and this is payable by cash on delivery </p>
<br>
<p>If you would like to CHANGE or CANCEL your order, please click <a href="<?php echo $changeOrderUrl; ?>">>> here <<</a></p>
<br>
<p>To view this order in future, please navigate your browser to :
    <a href="<?php echo $_SERVER['PHP_SELF'] . '?order_id=' . $order_id; ?>">
        <?php echo '/localhost' . $_SERVER['PHP_SELF'] . '?order_id=' . $order_id; ?></a></p>

</body>
</html>


