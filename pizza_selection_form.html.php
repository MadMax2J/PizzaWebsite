<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<!--
This file should not be called directly.
All variables must be initialised before this file is called.


$submitButtonText = 'Place Order';
$thisOrderUrl = 'vieworder.php';
$order = array();

$order_id = $order["id"] = $order["order_id"] = $order["student"] = $order["firstname"] = $order["lastname"] =
    $order["email"] = $order["address"] = $order["phone"] = $order["price"] = $order["size"] = $order["anchovies"] =
        $order["pineapples"] = $order["pepperoni"] = $order["olives"] = $order["onions"] = $order['peppers'] = $order["createddatetime"] =
            $order["views"] = "";

-->

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Pizza - Order Selection</title>
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <script src="./javascript/originaljs.js" type="text/javascript"></script>


</head>
<body onload="redraw()">

<h2 id="heading">Pizzas Order Form</h2>

<div id="pizzaImages">
    <img id="image1" src="images/base.png" width="300" height="300"/>
    <img id="image2" src="images/anchovies.png" width="300" height="300"/>
    <img id="image3" src="images/pineapple.png" width="300" height="300"/>
    <img id="image4" src="images/pepperoni.png" width="300" height="300"/>
    <img id="image5" src="images/olives.png" width="300" height="300" />
    <img id="image6" src="images/onion.png" width="300" height="300" />
    <img id="image7" src="images/pepper.png" width="300" height="300"/>
</div>

<form  id="pizza-form" onSubmit="return validateInput();" name="theform" method="post" action="vieworder.php">

    <h1><?php echo $update; ?></h1>

    <h3>What Size of Pizza Would You Like? </h3>

    <input id="small" type="radio" name="pizzaSize" value="small" onChange="redraw()" <?php
    if(strcmp($order["size"],"small") == 0){
        echo "checked";
    } ?> />Small

    <input id="medium" type="radio" name="pizzaSize" value="medium" onChange="redraw()" <?php
    if(strcmp($order["size"],"medium") == 0){
        echo "checked";
    } ?> />Medium

    <input id="large" type="radio" name="pizzaSize" value="large" onChange="redraw()" <?php
    if((strcmp($order["size"],"small") != 0) && (strcmp($order["size"],"medium") != 0)){ //Default condition
        echo "checked";
    } ?> />Large


    <br>
    <br>

    <h3>Add Extra Toppings</h3>
    <p>
        <input id="anchovies" type="checkbox" name="addAnchovies" onChange="redraw()" value="<?php
        if($order['anchovies']=='y') {
            echo 'yes';
        }else{
            echo 'no';
        }
        ?>"
            <?php
            if($order['anchovies']=='y') {
                echo 'checked';
            }
            ?> />Anchovies
        <input id="onion" type="checkbox" name="addOnion" onChange="redraw()" value="<?php
        if($order['onions']=='y') {
            echo 'yes';
        }else{
            echo 'no';
        }
        ?>"
            <?php
            if($order['onions']=='y') {
                echo 'checked';
            }
            ?> />Onion
    </p>
    <p>
        <input id="pepperoni" type="checkbox" name="addPepperoni" onChange="redraw()" value="<?php
        if($order['pepperoni']=='y') {
            echo 'yes';
        }else{
            echo 'no';
        }
        ?>"
            <?php
            if($order['pepperoni']=='y') {
                echo 'checked';
            }
            ?> />Pepperoni
        <input id="olives" type="checkbox" name="addOlives"  onChange="redraw()" value="<?php
        if($order['olives']=='y') {
            echo 'yes';
        }else{
            echo 'no';
        }
        ?>"
            <?php
            if($order['olives']=='y') {
                echo 'checked';
            }
            ?> />Olives
    </p>
    <p>
        <input id="pineapple" type="checkbox" name="addPineapple" onChange="redraw()" value="<?php
        if($order['pineapples']=='y') {
            echo 'yes';
        }else{
            echo 'no';
        }
        ?>"
            <?php
            if($order['pineapples']=='y') {
                echo 'checked';
            }
            ?> />Pineapple
        <input id="peppers" type="checkbox" name="addPeppers"  onChange="redraw()" value="<?php
        if($order['peppers']=='y') {
            echo 'yes';
        }else{
            echo 'no';
        }
        ?>"
            <?php
            if($order['peppers']=='y') {
                echo 'checked';
            }
            ?> />Peppers
    </p>


    <p id="displayPrice">Total Price is: €<span id="pricetext">12</span></p>
    <input id="price" name="price" hidden="hidden" value="12"/> <!-- Hidden field to get the price via PHP -->

    <br>
    <h3>Enter your  details</h3>
    Name:<br>
    <input name="customerName" id="cname" type="text" value="<?php
    if(strlen($order["firstname"]) > 0){    //Required to account for the possible [space] between names
        echo $order["firstname"] . ' ' . $order["lastname"];
    }
    ?>" required />
    <br/>
    <br/>
    Address:<br>
    <textarea name="address" id = "caddress" rows="5" cols="30" required><?php echo $order['address']; ?></textarea>
    <br/>
    <br/>
    Email Address:<br>
    <input name="emailAddress" type="email" value="<?php echo $order['email']; ?>" required />
    <br/>
    <br/>

    <br/>
    Phone Number:<br>
    <input name="phoneNo" id="phoneNumber" type="text" value="<?php echo $order['phone']; ?>" required/>
    <br/>
    <br/>
    Tick here if you are student:
    <input id="studentdiscount" type="checkbox" name="student" onChange="redraw()" value="<?php
    if($order['student']=='y') {
        echo 'yes';
    }else{
        echo 'no';
    }
    ?>"
        <?php
        if($order['student']=='y') {
            echo 'checked';
        }
        ?> />


    <br/><br>

    <!-- Check the value of these fields in POST -->
    <input id="order_id" name="order_id" hidden="hidden" value="<?php echo $order["order_id"]; ?>"/>
    <input id="update" name="update" hidden="hidden" value="<?php echo $update; ?>"/>
    <!-- *************************************** -->

    <button type="submit" value="Submit>" ><?php
        if($update != "1") { //Update should be '1' for this form to be shown.
            echo "Place Order";

        }else{
            echo "Update Order";
        }?></button>


</form>

<form name="deleteForm" method="post" action="vieworder.php">

    <!-- Check the value of these fields in POST -->
    <input id="order_id" name="order_id" hidden="hidden" value="<?php echo $order["order_id"]; ?>"/>
    <input id="delete" name="delete" hidden="hidden" value="1"/>
    <!-- *************************************** -->

    <button type="submit" value="Delete" <?php
        if($update != "1") { //Update should be '1' for this form to be shown.
            echo 'hidden = ""';
        } ?>>Delete order</button>

</form>

<!--
For new order, $_POST will not contain any 'order_id', 'delete' or 'update' key, but will contain all the Pizza details.
For an update, $_POST will contain all the Pizza details and an 'update' key with value of '1' and the pre-existing 'order_id' key.
For a delete, $_POST will just contain a 'delete' key with a value of '1' and the pre-existing 'order_id' key.

-->

</body>
</html>