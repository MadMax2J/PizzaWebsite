<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Pizza - Order Selection</title>
<link href="main.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function redraw()
{
//alert ("hello from redraw");
    var pizzaPrice;


// default to large
    var pizzaImageSize = 300;
    var pizzaBasePrice = 12;
    var pricePerTopping = 1;


    if (document.getElementById("small").checked)
    {

        pizzaImageSize = 150;
        pizzaBasePrice = 6;
        pricePerTopping = .5;
    }

    if (document.getElementById("medium").checked==true)
    {

        pizzaImageSize = 220;
        pizzaBasePrice = 10;
        pricePerTopping = 1;
    }


    document.getElementById("image1").height=pizzaImageSize;
    document.getElementById("image1").width=pizzaImageSize;
    document.getElementById("image2").height=pizzaImageSize;
    document.getElementById("image2").width=pizzaImageSize;
    document.getElementById("image3").height=pizzaImageSize;
    document.getElementById("image3").width=pizzaImageSize;
    document.getElementById("image4").height=pizzaImageSize;
    document.getElementById("image4").width=pizzaImageSize;
    document.getElementById("image5").height=pizzaImageSize;
    document.getElementById("image5").width=pizzaImageSize;
    document.getElementById("image6").height=pizzaImageSize;
    document.getElementById("image6").width=pizzaImageSize;
    document.getElementById("image7").height=pizzaImageSize;
    document.getElementById("image7").width=pizzaImageSize;

// do the toppings
    var howManyToppings = 0;

    if (document.getElementById("anchovies").checked==true)
    {
        document.getElementById("image2").style.visibility = "visible";
        howManyToppings = howManyToppings + 1;
    }
    else
    {
        document.getElementById("image2").style.visibility = "hidden";
    }



    if (document.getElementById("pineapple").checked==true)
    {
        document.getElementById("image3").style.visibility = "visible";
        howManyToppings = howManyToppings + 1;
    }
    else
    {
        document.getElementById("image3").style.visibility = "hidden";
    }





    if (document.getElementById("pepperoni").checked==true)
    {
        document.getElementById("image4").style.visibility = "visible";
        howManyToppings = howManyToppings + 1;
    }
    else
    {
        document.getElementById("image4").style.visibility = "hidden";
    }






    if (document.getElementById("olives").checked==true)
    {
        document.getElementById("image5").style.visibility = "visible";
        howManyToppings = howManyToppings + 1;
    }
    else
    {
        document.getElementById("image5").style.visibility = "hidden";
    }






    if (document.getElementById("onion").checked==true)
    {
        document.getElementById("image6").style.visibility = "visible";
        howManyToppings = howManyToppings + 1;
    }
    else
    {
        document.getElementById("image6").style.visibility = "hidden";
    }






    if (document.getElementById("peppers").checked==true)
    {
        document.getElementById("image7").style.visibility = "visible";
        howManyToppings = howManyToppings + 1;
    }
    else
    {
        document.getElementById("image7").style.visibility = "hidden";
    }




// calculate price

    pizzaPrice = pizzaBasePrice + pricePerTopping * howManyToppings;
    document.getElementById("pricetext").innerHTML = pizzaPrice.toString();
    document.getElementById("price").setAttribute("value", pizzaPrice.toString());


}

function validateInput ()
{
    var valid  = true;

    if (document.getElementById("cname").value == "")
    {
        valid = false;
        document.getElementById("cname").style.backgroundColor = "#ff0000";
    }
    else
    {
        document.getElementById("cname").style.backgroundColor = "#99ff99";
    }

    if (document.getElementById("caddress").value == "")
    {
        valid = false;
        document.getElementById("caddress").style.backgroundColor = "#ff0000";
    }
    else
    {
        document.getElementById("caddress").style.backgroundColor = "#99ff99";
    }


    return valid;
}


</script>

    <?php
    // check for post data
    if (isset($_GET["order_id"])) {
        $order_id = $_GET['order_id'];
        $thisOrderUrl = "vieworder.php?order_id='" . $order_id . "'&update=1";
        // include db connect class
//require_once __DIR__ . '/db_connect.php';
        require_once 'db_connect.php';

// connecting to db
        $db = new DB_CONNECT();

        // get a location from locations table
        $result = mysql_query("SELECT * FROM orders WHERE order_id = $order_id");

        if (!empty($result)) {
            // check for empty result
            if (mysql_num_rows($result) > 0) {

                $result = mysql_fetch_assoc($result);
                //just changed this from mysql_fetch_array($result)


                $order = array();
                $order["id"] = $result["id"];
                $order["order_id"] = $result["order_id"];
                $order["student"] = $result["student"];
                $order["firstname"] = $result["firstname"];
                $order["lastname"] = $result["lastname"];
                $order["email"] = $result["email"];
                $order["address"] = $result["address"];
                $order["phone"] = $result["phone"];
                $order["price"] = $result["price"];
                $order["size"] = $result["size"];
                $order["anchovies"] = $result["anchovies"];
                $order["pineapples"] = $result["pineapples"];
                $order["pepperoni"] = $result["pepperoni"];
                $order["olives"] = $result["olives"];
                $order["onions"] = $result["onions"];
                $order["createddatetime"] = $result["createddatetime"];
                $order["views"] = $result["views"];



                // success
                $response["success"] = 1;

                // user node
                $response["order"] = array();

                array_push($response["order"], $order);

                // echoing JSON response
                echo json_encode($response);
            } else {
                // no location found
                $response["success"] = 0;
                $response["message"] = "Order Not Found 1";

                // echo no users JSON
                echo json_encode($response);
            }
        } else {
            // no location found
            $response["success"] = 0;
            $response["message"] = "Order Not Found 2";

            // echo no users JSON
            echo json_encode($response);
        }
    }
    ?>


</head>
<body>

    <h2 id="heading">Pizzas Order Form</h2>
    <form  id="pizza-form" onSubmit="return validateInput();" name="theform" method="post" action="
    <?php if(isset($_GET['order_id'])){ //This is an update of an existing order
        echo $thisOrderUrl;
    }else{
        echo 'vieworder.php';
    }
    ?>
    ">
      <h3>What Size of Pizza Would You Like? </h3>
<div>
<p>
        Small
        <input class="toBeSpaced" id="small" type="radio" name="pizzaSize" value="small" onChange="redraw()"/>
</p><p> Medium
        <input style="padding:100px" class="toBeSpaced" id="medium" type="radio" name="pizzaSize" value="medium" onChange="redraw()" />
</p><p> Large
        <input class="toBeSpaced" id="large" type="radio" name="pizzaSize" value="large" onChange="redraw()" checked/>
</p>

</div>


      <div id="pizzaImages">
		<img id="image1" src="images/base.png" width="300" height="300"/>
		<img id="image2" src="images/anchovies.png" width="300" height="300"/>
		<img id="image3" src="images/pineapple.png" width="300" height="300"/>
		<img id="image4" src="images/pepperoni.png" width="300" height="300"/>
		<img id="image5" src="images/olives.png" width="300" height="300" />
		<img id="image6" src="images/onion.png" width="300" height="300" />
		<img id="image7" src="images/pepper.png" width="300" height="300"/>
	  </div>
      <br>
      <h3>Add Extra Toppings</h3>

<p>
       Anchovies
       <input class="toBeSpaced" id="anchovies" type="checkbox" name="addAnchovies" value="yes" onChange="redraw()" checked/>
</p><p>
       Pineapple
      <input class="toBeSpaced" id="pineapple" type="checkbox" name="addPineapple" value="yes" onChange="redraw()" checked/>
</p><p>
        Pepperoni
       <input class="toBeSpaced" id="pepperoni" type="checkbox" name="addPepperoni" value="yes" onChange="redraw()" checked/>
</p><p>
        Olives
        <input class="toBeSpaced" id="olives" type="checkbox" name="addOlives" value="yes" onChange="redraw()" checked/>
</p><p>
        Onion
        <input class="toBeSpaced" id="onion" type="checkbox" name="addOnion" value="yes" onChange="redraw()" checked/>
</p><p>
        Peppers
        <input class="toBeSpaced" id="peppers" type="checkbox" name="addPeppers" value="yes" onChange="redraw()" checked/>
</p>
   
   
     <h3>Total Price is: €<span id="pricetext">18</span></h3>
        <input id="price" name="price" hidden="hidden" value="18"/>

     
      
        <h3>Enter your  details</h3>
Name:
        <input name="customerName" id="cname" type="text" value="<?php if(isset($_GET['order_id'])) echo $order["firstname"] . ' ' . $order['lastname'] ;?>" required />
        <br/>
        <br/>
        Address:
        <textarea name="address" id = "caddress" rows="5" cols="30" required><?php if(isset($_GET['order_id'])) echo $order['address'];?></textarea>
        <br/>
        <br/>
        Email Address:
        <input name="emailAddress" type="email" value="<?php if(isset($_GET['order_id'])) echo $order['email'];?>" required />
        <br/>
        <br/>

        <br/>
        Phone Number:
        <input name="phoneNo" id="phoneNumber" type="text" value="<?php if(isset($_GET['order_id'])) echo $order['phone'];?>" required/>
        <br/>
        <br/>
        Tick here if you are student:
        <input id="studentdiscount" type="checkbox" name="student" value="<?php if(isset($_GET['order_id'])) if($order['student']=='y') echo 'yes';?>" onChange="redraw()" checked/>
       
  
      <br/>
      <button type="submit" value="Place Order" >Submit order</button>
    </form>

  
</body>
</html>