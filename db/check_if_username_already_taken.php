<?php

include 'dbconfig.php';


$username_entered = $_REQUEST['username'];

$is_name_already_in_db = 'false';

$sql = "SELECT * FROM PHPUsers";

if($result = mysqli_query($link, $sql)){

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){
            $username_trimmed = $row['username'] ;
            if($username_trimmed == $username_entered){
                echo 'The username: ' .$username_trimmed. ' has already been taken by another user';
                $is_name_already_in_db = 'true';
            }
        }

        // Free result set
        mysqli_free_result($result);

    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


if($is_name_already_in_db == 'false'){
    $sign_up_button = '<button type="button" class="btn btn-primary" onclick="save_new_user();"  style="width:100%;">Register</button>';
} else{
    $sign_up_button = ' ';
}

echo $sign_up_button;
