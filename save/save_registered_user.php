<?php
include("../db/dbconfig.php");

$app_category = $_REQUEST['app_category'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Attempts SQL insert query
$sql = "INSERT INTO PHPUsers (username, password, accountType) values ('".$username."', '".$hashed_password."', '".$app_category."')";

//$link is taken from dbconfig.php
if(mysqli_query($link, $sql)){
    echo "New user successfully created.";
    //header("Location: index.php");
} else{
    echo "ERROR: Could not create new user, unable to execute $sql. " . mysqli_error($link);
}

// Closes mySQL connection
mysqli_close($link);
