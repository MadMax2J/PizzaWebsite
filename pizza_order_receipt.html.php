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
<br>
<p>Summary of Order#: <?php echo $order_id; ?>...</p>
<p>You have ordered a <?php echo $order["size"]; ?> pizza with <?php echo $ingredients; ?>.</p>
<p>You placed your order at <?php echo $order["createddatetime"]; ?> and you should expect delivery in around 30 minutes.</p>
<br>
<br>
<p>If you would like to CHANGE your order, please click <a href="<?php echo $changeOrderUrl; ?>">>> here <<</a></p>
<br>
<p>If you would like to CANCEL your order, please click <a href="<?php echo $cancelOrderUrl; ?>">>> here <<</a></p>

</body>
</html>


