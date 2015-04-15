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

    if (isset($_POST['addAnchovies'])){
        $addAnchovies = $_POST['addAnchovies'];
    }else{
        $addAnchovies = 'n';
    }

    if (isset($_POST['addPineapple'])){
        $addPineapple = $_POST['addPineapple'];
    }else{
        $addPineapple = 'n';
    }

    if (isset($_POST['addPepperoni'])){
        $addPepperoni = $_POST['addPepperoni'];
    }else{
        $addPepperoni = 'n';
    }

    if (isset($_POST['addOlives'])){
        $addOlives = $_POST['addOlives'];
    }else{
        $addOlives = 'n';
    }

    if (isset($_POST['addOnion'])){
        $addOnion = $_POST['addOnion'];
    }else{
        $addOnion = 'n';
    }

    if (isset($_POST['addPeppers'])){
        $addPeppers = $_POST['addPeppers'];
    }else{
        $addPeppers = 'n';
    }

    if (isset($_POST['student'])){
        $student = $_POST['student'];
    }else{
        $student = 'n';
    }

    if (isset($_POST['price'])){
        $price = $_POST['price'];
    }else{
        $price = '10';
    }

    // include db connect class
    require_once __DIR__ . '/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql inserting a new row
    $result = mysql_query("INSERT INTO orders(order_id, student, firstname, lastname, email, address, phone, price, size, anchovies, pineapples, pepperoni, olives, onions ) VALUES('$orderId', '$student', '$customerName', '$customerName', '$emailAddress', '$address', '$phoneNo', '$price', '$pizzaSize', '$addAnchovies', '$addPineapple', '$addPepperoni', '$addOlives', '$addOnion')");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Order placed successfully.";

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
?>