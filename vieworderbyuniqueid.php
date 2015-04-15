<?php
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
?>
<html>
<body>
<br>
<br>

</body>

</html>