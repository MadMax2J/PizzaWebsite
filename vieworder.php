<?php
$ingredients = "";
$changeOrderUrl = "";
$cancelOrderUrl = "";
$action="";
$db;
$order_id = $order["id"] = $order["order_id"] = $order["student"] = $order["firstname"] = $order["lastname"] =
$order["email"] = $order["address"] = $order["phone"] = $order["price"] = $order["size"] = $order["anchovies"] =
$order["pineapples"] = $order["pepperoni"] = $order["olives"] = $order["onions"] = $order['peppers'] = $order["createddatetime"] =
$order["views"] = $update = $delete = "";


/**
 * Created by PhpStorm.
 * User: jbyrne
 * Date: 14/04/2015
 * Time: 20:31
 */

/**
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
if (!isset($_GET['order_id'])){ //Are we reviewing an existing order? If not...
    //Submission from order.php

    // to to check if New Order, Updating, or Deleting


    if((!isset($_POST['delete']) && ($_POST['update'] != "1"))) {
        //New Record Insertion...

        // array for JSON response
        $response = array();

        // check for required fields
        if (isset($_POST['customerName']) && isset($_POST['address']) && isset($_POST['emailAddress']) &&
            isset($_POST['phoneNo'])
        ) {

            $customerName = explode(" ", $_POST['customerName']);
            $firstName = $customerName[0];
            $surname = $customerName[count($customerName) - 1];
            $address = $_POST['address'];
            $emailAddress = $_POST['emailAddress'];
            $phoneNo = $_POST['phoneNo'];

            $pizzaSize = $_POST['pizzaSize'];
            $price = $_POST['price'];
            $orderId = uniqid();

            if (isset($_POST['addAnchovies'])) {
                //$addAnchovies = $_POST['addAnchovies'];
                $addAnchovies = 'y';

            } else {
                $addAnchovies = 'n';
            }

            if (isset($_POST['addPineapple'])) {
                //$addPineapple = $_POST['addPineapple'];
                $addPineapple = 'y';
            } else {
                $addPineapple = 'n';
            }

            if (isset($_POST['addPepperoni'])) {
                //$addPepperoni = $_POST['addPepperoni'];
                $addPepperoni = 'y';
            } else {
                $addPepperoni = 'n';
            }

            if (isset($_POST['addOlives'])) {
                //$addOlives = $_POST['addOlives'];
                $addOlives = 'y';
            } else {
                $addOlives = 'n';
            }

            if (isset($_POST['addOnion'])) {
                //$addOnion = $_POST['addOnion'];
                $addOnion = 'y';
            } else {
                $addOnion = 'n';
            }

            if (isset($_POST['addPeppers'])) {
                //$addPeppers = $_POST['addPeppers'];
                $addPeppers = 'y';
            } else {
                $addPeppers = 'n';
            }

            if (isset($_POST['student'])) {
                //$student = $_POST['student'];
                $student = 'y';
            } else {
                $student = 'n';
            }


            // include db connect class
            require_once __DIR__ . '/db_connect.php';

            // connecting to db
            $db = new DB_CONNECT();

            // mysql inserting a new row
            /* FOR TESTING
                    echo '
                      INSERT INTO orders
                      SET   order_id = "' . $orderId . '",
                            student = "' . $student . '",
                            firstname = "' . $firstName . '",
                            lastname = "' . $surname . '",
                            email = "' . $emailAddress . '",
                            address = "' . $address . '",
                            phone = "' . $phoneNo . '",
                            price = "' . $price . '",
                            size = "' . $pizzaSize . '",
                            anchovies = "' . $addAnchovies . '",
                            pineapples = "' . $addPineapple . '",
                            pepperoni = "' . $addPepperoni . '",
                            olives = "' . $addOlives . '",
                            onions = "' . $addOnion . '",
                            peppers = "'. $addPeppers . '";';
            */
            $result = mysql_query('
          INSERT INTO orders
          SET   order_id = "' . $orderId . '",
                student = "' . $student . '",
                firstname = "' . $firstName . '",
                lastname = "' . $surname . '",
                email = "' . $emailAddress . '",
                address = "' . $address . '",
                phone = "' . $phoneNo . '",
                price = "' . $price . '",
                size = "' . $pizzaSize . '",
                anchovies = "' . $addAnchovies . '",
                pineapples = "' . $addPineapple . '",
                pepperoni = "' . $addPepperoni . '",
                olives = "' . $addOlives . '",
                onions = "' . $addOnion . '",
                peppers = "' . $addPeppers . '";');

            // check if row inserted or not
            if ($result) {
                // successfully inserted into database
                $response["success"] = 1;
                $response["message"] = "Order placed successfully.";

                //Display a receipt

                displayReceipt($orderId);

                // echoing JSON response
                echo json_encode($response);

            } else {
                // failed to insert row
                $response["success"] = 0;
                $response["message"] = "Oops! An error occurred.";

                // echoing JSON response
                echo json_encode($response);
            }
        } else {
            // required field is missing
            $response["success"] = 0;
            $response["message"] = "Required field(s) is missing";

            // echoing JSON response
            echo json_encode($response);
        }

    }else if(isset($_POST['delete'])){
        //Delete the Order
        $order_id = $_POST['order_id'];
        echo "Deleting Order: " . $order_id;

        $response = array();

        $query = 'DELETE FROM orders
                  WHERE order_id = "' . $order_id . '";';

            // mysql inserting a new row
            //FOR TESTING
                    echo $query;

        // include db connect class
        require_once __DIR__ . '/db_connect.php';

        // connecting to db
        $db = new DB_CONNECT();

        $result = mysql_query($query);

        // check if row inserted or not
        if ($result) {
            // successfully updated
            $response["success"] = 1;
            $response["message"] = "Order successfully Deleted.";

            // echoing JSON response
            echo json_encode($response);
        } else {

        }

    }else if($_POST['update'] == "1") {
        //Update the Order
        $order_id = $_POST['order_id'];
        echo "Updating Order: " . $order_id;

//// UPDATE CODE HERE

        /*
    * Following code will update a product information
    * A product is identified by product id (pid)
    */

// array for JSON response
        $response = array();

        // check for required fields
        if (isset($_POST['order_id']) && isset($_POST['customerName']) && isset($_POST['address']) && isset($_POST['emailAddress']) &&
            isset($_POST['phoneNo'])
        ) {

            $orderId = $_POST['order_id'];
            $customerName = explode(" ", $_POST['customerName']);
            $firstName = $customerName[0];
            $surname = $customerName[count($customerName) - 1];
            $address = $_POST['address'];
            $emailAddress = $_POST['emailAddress'];
            $phoneNo = $_POST['phoneNo'];

            $pizzaSize = $_POST['pizzaSize'];
            $price = $_POST['price'];


            if (isset($_POST['addAnchovies'])) {
                //$addAnchovies = $_POST['addAnchovies'];
                $addAnchovies = 'y';

            } else {
                $addAnchovies = 'n';
            }

            if (isset($_POST['addPineapple'])) {
                //$addPineapple = $_POST['addPineapple'];
                $addPineapple = 'y';
            } else {
                $addPineapple = 'n';
            }

            if (isset($_POST['addPepperoni'])) {
                //$addPepperoni = $_POST['addPepperoni'];
                $addPepperoni = 'y';
            } else {
                $addPepperoni = 'n';
            }

            if (isset($_POST['addOlives'])) {
                //$addOlives = $_POST['addOlives'];
                $addOlives = 'y';
            } else {
                $addOlives = 'n';
            }

            if (isset($_POST['addOnion'])) {
                //$addOnion = $_POST['addOnion'];
                $addOnion = 'y';
            } else {
                $addOnion = 'n';
            }

            if (isset($_POST['addPeppers'])) {
                //$addPeppers = $_POST['addPeppers'];
                $addPeppers = 'y';
            } else {
                $addPeppers = 'n';
            }

            if (isset($_POST['student'])) {
                //$student = $_POST['student'];
                $student = 'y';
            } else {
                $student = 'n';
            }


            // include db connect class
            require_once __DIR__ . '/db_connect.php';

            // connecting to db
            $db = new DB_CONNECT();

            $query = 'UPDATE orders
                      SET   student = "' . $student . '",
                            firstname = "' . $firstName . '",
                            lastname = "' . $surname . '",
                            email = "' . $emailAddress . '",
                            address = "' . $address . '",
                            phone = "' . $phoneNo . '",
                            price = "' . $price . '",
                            size = "' . $pizzaSize . '",
                            anchovies = "' . $addAnchovies . '",
                            pineapples = "' . $addPineapple . '",
                            pepperoni = "' . $addPepperoni . '",
                            olives = "' . $addOlives . '",
                            onions = "' . $addOnion . '",
                            peppers = "' . $addPeppers . '"
                      WHERE order_id = "' . $orderId . '";';

            // mysql inserting a new row
            //FOR TESTING
            echo $query;


            // mysql update row with matched pid
            $result = mysql_query($query);

            // check if row inserted or not
            if ($result) {
                // successfully updated
                $response["success"] = 1;
                $response["message"] = "Order successfully updated.";

                // echoing JSON response
                echo json_encode($response);
            } else {

            }
        } else {
            // required field is missing
            $response["success"] = 0;
            $response["message"] = "Required field(s) is missing";

            // echoing JSON response
            echo json_encode($response);


//// END OF UPDATE CODE

            foreach ($_POST as $key => $value) {
                echo "<br><tr>";
                echo "<td>";
                echo $key;
                echo "</td>";
                echo "<td>";
                echo $value;
                echo "</td>";
                echo "</tr>";
            }

            foreach ($_GET as $key => $value) {
                echo "<br><tr>";
                echo "<td>";
                echo $key;
                echo "</td>";
                echo "<td>";
                echo $value;
                echo "</td>";
                echo "</tr>";
            }
        }
    }
}else {                                                        // $_GET['order_id'] is SET
    if(!isset($_GET['update'])) {        //Not Updating
        //Need to display the Receipt page of the specified order.

        //$changeOrderUrl = $_SERVER['PHP_SELF'] . "?order_id=" . $_GET['order_id'] . "&update=1";
        displayReceipt($_GET['order_id']);
    }else{                              // Am Updating
        //Need to display Sticky Form

        getOrder($_GET['order_id']);

        global $update;
        $update = $_GET['update'];

        include 'pizza_selection_form.html.php';

    }

}

function getOrder($order_id){
    // array for JSON response
    $response = array();
    // include db connect class
    require_once __DIR__ . '/db_connect.php';

    // connecting to db
    //global $db;
    global $changeOrderUrl;

    $db = new DB_CONNECT();

    // get a location from locations table
    $result = mysql_query("SELECT * FROM orders WHERE order_id = '$order_id'");

    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_assoc($result);
            //just changed this from mysql_fetch_array($result)


            global $order;
            //$order = array();
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
            $order["peppers"] = $result["peppers"];
            $order["createddatetime"] = $result["createddatetime"];
            $order["views"] = $result["views"];


            // success
            $response["success"] = 1;

            // user node
            $response["order"] = array();

            array_push($response["order"], $order);

            // echoing JSON response

            echo json_encode($response);
            echo "Getting here also!!";
            global $ingredients;
            //$ingredientsCount = 0; Might use an Ingredients array??
            global $thisOrderUrl;

            if($order["anchovies"] == 'y'){
                $ingredients .= "Anchovies, ";
            }
            if($order["pineapples"] == 'y'){
                $ingredients .= "Pineapples, ";
            }
            if($order["pepperoni"] == 'y'){
                $ingredients .= "Pepperoni, ";
            }
            if($order["olives"] == 'y'){
                $ingredients = $ingredients . 'Olives, ';
            }
            if($order["onions"] == 'y'){
                $ingredients = $ingredients . 'Onions, ';
            }
            if($order["peppers"] == 'y'){
                $ingredients = $ingredients . 'Peppers, ';
            }
            echo $ingredients;


            //$changeOrderUrl = $_SERVER['PHP_SELF'];
            //echo $changeOrderUrl;
            //include "pizza_order_receipt.html.php";

        } else {
            // no location found
            $response["success"] = 0;
            $response["message"] = "Order Not Found";

            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no location found
        $response["success"] = 0;
        $response["message"] = "Order Not Found";

        // echo no users JSON
        echo json_encode($response);
    }
    echo "Finished GET ORDER FUNCTION";
}

function displayReceipt($order_id){

    global $changeOrderUrl;
    $changeOrderUrl = $_SERVER['PHP_SELF'] . "?order_id=" . $order_id . "&update=1";

    global $order;          //Array to be populated by getOrder
    global $ingredients;    //ingredients String to be populated by getOrder;

    getOrder($order_id);

    include "pizza_order_receipt.html.php";
}

?>