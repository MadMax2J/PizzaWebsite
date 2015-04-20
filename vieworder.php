<?php
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

    // array for JSON response
    $response = array();

    // check for required fields
    //if (isset($_POST['phone_id']) && isset($_POST['phone_lat']) && isset($_POST['phone_lng'])) {
    if (isset($_POST['pizzaSize']) && isset($_POST['customerName']) && isset($_POST['address']) && isset($_POST['emailAddress']) && isset($_POST['phoneNo'])) {
        $pizzaSize = $_POST['pizzaSize'];
        $orderId = uniqid();
        $customerName = $_POST['customerName'];
        $address = $_POST['address'];
        $emailAddress = $_POST['emailAddress'];
        $phoneNo = $_POST['phoneNo'];

        if (isset($_POST['addAnchovies'])) {
            $addAnchovies = $_POST['addAnchovies'];
        } else {
            $addAnchovies = 'n';
        }

        if (isset($_POST['addPineapple'])) {
            $addPineapple = $_POST['addPineapple'];
        } else {
            $addPineapple = 'n';
        }

        if (isset($_POST['addPepperoni'])) {
            $addPepperoni = $_POST['addPepperoni'];
        } else {
            $addPepperoni = 'n';
        }

        if (isset($_POST['addOlives'])) {
            $addOlives = $_POST['addOlives'];
        } else {
            $addOlives = 'n';
        }

        if (isset($_POST['addOnion'])) {
            $addOnion = $_POST['addOnion'];
        } else {
            $addOnion = 'n';
        }

        if (isset($_POST['addPeppers'])) {
            $addPeppers = $_POST['addPeppers'];
        } else {
            $addPeppers = 'n';
        }

        if (isset($_POST['student'])) {
            $student = $_POST['student'];
        } else {
            $student = 'n';
        }

        if (isset($_POST['price'])) {
            $price = $_POST['price'];
        } else {
            $price = '10';
        }

        // include db connect class
        require_once __DIR__ . '/db_connect.php';

        // connecting to db
        $db = new DB_CONNECT();

        // mysql inserting a new row
        $result = mysql_query("INSERT INTO orders(order_id, student, firstname, lastname, email, address, phone, price, size, anchovies, pineapples, pepperoni, olives, onions, peppers ) VALUES('$orderId', '$student', '$customerName', '$customerName', '$emailAddress', '$address', '$phoneNo', '$price', '$pizzaSize', '$addAnchovies', '$addPineapple', '$addPepperoni', '$addOlives', '$addOnion', '$addPeppers')");

        // check if row inserted or not
        if ($result) {
            // successfully inserted into database
            $response["success"] = 1;
            $response["message"] = "Order placed successfully.";

            //Display a receipt

            displayReceipt($orderId, $db);


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

}else {

    if (isset($_GET['update'])){
        include 'updateorderbyuniqueid.php';
    }else {
        include 'vieworderbyuniqueid.php';
    }
    /**
     * vieworderbyuniqueid.php
     * Created by PhpStorm.
     * User: jbyrne
     * Date: 15/04/2015
     * Time: 11:07
     */

    /**
     * Following code will get single order
     * An order is identified by its 'Unique_id'
     */
/*
    // array for JSON response
    $response = array();

    // include db connect class
    //require_once __DIR__ . '/db_connect.php';
    require_once 'db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // check for post data
    if (isset($_GET["order_id"])) {
        $order_id = $_GET['order_id'];

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
    } else {
        // required field is missing
        $response["success"] = 0;
        $response["message"] = "Required field(s) is missing";

        // echoing JSON response
        echo json_encode($response);
    }
*/
}

function displayReceipt($order_id, $db){
    // array for JSON response
    $response = array();

    // include db connect class
    //require_once __DIR__ . '/db_connect.php';
    //require __DIR__ . '/db_connect.php';

    // connecting to db
    //$db = new DB_CONNECT();

    // check for post data
 //   if ($orderId) {
   //     $order_id = $_GET['order_id'];

        // get a location from locations table
    echo $order_id;
        $result = mysql_query("SELECT * FROM orders WHERE order_id = '$order_id'");

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

                global $ingredients;
                $ingredients = "";

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


                $thisOrderUrl = "order.php?order_id='" . $order_id . "'";
                echo '
                <html>
                <head>
                    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
                    <title>Pizza - Order Receipt</title>
                </head>
                <body>

                <H1> Order Receipt </H1>
                <br>
                <H3> Pizza Delivery Ltd. </H3>
                <br>
                <br>
                <p>Summary of Order# ' . $order_id . '...</p>
                <p>You have ordered a ' . $order["size"] . ' pizza with ' . $ingredients . '.</p>
                <p>You placed your order at ' . $order["createddatetime"] . ' and you should expect delivery in around 30 minutes.</p>
                <br>
                <br>
                <p>If you would like to CHANGE your order, please click <a href="' . $thisOrderUrl . '">>> here <<</a></p>
                <br>
                <p>If you would like to CANCEL your order, please click <a href="url">>> here <<</a></p>

                </body>

                ';

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

}

?>