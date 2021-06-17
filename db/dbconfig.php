<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "YourDatabaseName";

global $link;

$link = new mysqli($host, $user, $pass, $db_name);

// Check connection
if($link === false){
    die("ERROR: Could not connect to database. " . mysqli_connect_error());
}

