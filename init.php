<?php
session_start();
// INIT file loads resources needed by multiple PHP pages in a Web Application.

/******************************************************************************************
Database Connection
******************************************************************************************/
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "video_store";

    // Create connection
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
    }
/******************************************************************************************
Database Tables
******************************************************************************************/


/******************************************************************************************
Classes
******************************************************************************************/
require_once 'class_lib.php';   // Wrapper for useful utility functions


/******************************************************************************************
Consolidate and trim $_GET and $_POST super globals
******************************************************************************************/
$get_post    = array_merge($_GET,$_POST);

// No whitespace after the closing php tag because that generates script output.
?>
