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
if (isset($_POST['id']) && isset($_POST['phone_id']) && isset($_POST['phone_lat']) && isset($_POST['phone_lng'])) {

    $id = $_POST['pid'];
    $phone_id = $_POST['phone_id'];
    $phone_lat = $_POST['phone_lat'];
    $phone_lng = $_POST['phone_lng'];

    // include db connect class
    //require_once __DIR__ . '/db_connect.php';
    require_once 'db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql update row with matched pid
    $result = mysql_query("UPDATE locations SET phone_id = '$phone_id', phone_lat = '$phone_lat', phone_lng = '$phone_lng' WHERE id = $id");

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