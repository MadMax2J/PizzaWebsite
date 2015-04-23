<?php
/**
 * db_connect.php
 * Created by PhpStorm.
 * User: jbyrne
 * Date: 14/04/2015
 * Time: 20:29
 */

/**
 * A class file to connect to database
 */
class DB_CONNECT {

    // constructor
    function __construct() {
        // connecting to database
        $this->connect();
    }

    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }

    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
        require_once __DIR__ . '/db_config.php';


        // Connecting to mysql database
        $con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());

        // Selecting database
        $db = mysql_select_db(DB_DATABASE) or die(mysql_error()) or die(mysql_error());

        // Returning connection
        return $con;
    }

    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        //    mysql_close();

    }

}

?>