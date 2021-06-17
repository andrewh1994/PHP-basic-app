<?php
include("../db/dbconfig.php");
session_start();
include '../include/inc_top_login.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // username and password sent from form
    $uname_entered = $_REQUEST['uname_entered'];
    $password_entered = $_REQUEST['password_entered'];
    //$password_entered_hashed = password_hash($password_entered, PASSWORD_DEFAULT);
    //echo $password_entered_hashed;

    $successful_match = false;

    $sql = "SELECT * FROM PHPUsers";

    //$link is taken from dbconfig.php
    if($result = mysqli_query($link, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
                $username = $row['username'];
                $password = $row['password'];       //hashed password in the db
                if($uname_entered==$username && password_verify($password_entered, $password) ){    //password_verify() verifies that the hashed password in the db matches the given password from the user
                    $successful_match = true;
                    $correct_username = $username;
                }
            }

            // Free result set
            mysqli_free_result($result);

            if($successful_match == true) {
                echo "Correct login details!";
                $_SESSION['login_user'] = $correct_username;
                header("location: home.php");
            } else{
                // show error message
                echo '<script>alert("Error, username or password is incorrect")</script>';
            }

        } else{
            echo "No records matching your query were found.";
        }

    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    // Closes mySQL connection
    mysqli_close($link);
}
?>


<html>

<head>
    <meta charset="ISO-8859-1">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="row">
    <br><br>
</div>

<div class="row">

    <div class="col">
    </div>

    <div class="col">

        <div class="card card_center mb-3 shadow p-3 mb-5 bg-white rounded" >
            <div class="card-body">

                <h3>Login </h3>
                <br>

                <form action="" method="post">
                    <input type ="text" placeholder="UserName"  name="uname_entered" class="form-control" /> <br>
                    <input type ="password" placeholder="Password"  name="password_entered" class="form-control" /> <br>
                    <input type="submit" value="Login" class="btn btn-primary" style="width:100%;" />
                    <br>
                </form>
                <br>

                <button class="btn btn-success" onclick="open_register_user();" style="width:100%;">Register</button>

            </div>
        </div>

    </div>

    <div class="col">
    </div>

</div>

<script>
    function open_register_user(){
        window.open('register_user.php', '_self');
    }
</script>

</body>

</html>