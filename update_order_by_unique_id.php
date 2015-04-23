<?php
/**
 * update_location_by_id.php
 * Created by PhpStorm.
 * User: jbyrne
 * Date: 02/03/2015
 * Time: 16:22
 */

/*
 * Following code will update a product information
 * A product is identified by product id (pid)
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['pizzaSize']) && isset($_POST['customerName']) && isset($_POST['address']) && isset($_POST['emailAddress']) && isset($_POST['phoneNo'])) {
    $pizzaSize = $_POST['pizzaSize'];
    $orderId = $_GET['order_id'];
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
    //$result = mysql_query("INSERT INTO orders(order_id, student, firstname, lastname, email, address, phone, price, size, anchovies, pineapples, pepperoni, olives, onions, peppers ) VALUES('$orderId', '$student', '$customerName', '$customerName', '$emailAddress', '$address', '$phoneNo', '$price', '$pizzaSize', '$addAnchovies', '$addPineapple', '$addPepperoni', '$addOlives', '$addOnion', '$addPeppers')");

    // mysql update row with matched pid
    $result = mysql_query("UPDATE orders SET student = '$student', firstname = '$customerName', lastname = '$customerName', email = '$emailAddress', address = '$address', phone = '$phoneNo', price = '$price', size = '$pizzaSize', anchovies = '$addAnchovies', pineapples = '$addPineapple', pepperoni = '$addPepperoni', olives = '$addOlives', onions = '$addOnion', peppers = '$addPeppers' WHERE order_id = $order_id");

    // check if row inserted or not
    if ($result) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Location successfully updated.";

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
}
?>