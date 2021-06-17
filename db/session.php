<?php
include('dbconfig.php');
session_start();

$user_check = $_SESSION['login_user'];

//$link is taken from dbconfig.php
$ses_sql = mysqli_query($link,"select username from PHPUsers where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['username'];

if(!isset($_SESSION['login_user'])){
    header("location:../index.php");
    die();
}
