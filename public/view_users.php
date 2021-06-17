<?php
include('../db/session.php');
include '../include/inc_top.php';
include("../db/dbconfig.php");

$sql = "SELECT * FROM PHPUsers";

//$link is taken from dbconfig.php
if($result = mysqli_query($link, $sql)){

    if(mysqli_num_rows($result) > 0){
        $user_table = "<table class=\"table\">";
        $user_table .= "<tr>";
        $user_table .= "<th>Username</th>";
        $user_table .= "<th>Account type</th>";
        $user_table .= "</tr>";
        while($row = mysqli_fetch_array($result)){
            $user_table .= "<tr>";
            $user_table .= "<td>" . $row['username'] . "</td>";
            $user_table .= "<td>" . $row['accountType'] . "</td>";
            $user_table .= "</tr>";
        }
        $user_table .= "</table>";

        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
        $user_table = " ";
    }

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Closes mySQL connection
mysqli_close($link);

?>



<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <title>View users</title>
</head>

<body>

<div class=""row">
    <br><br><br>
</div>

<div class="row">
    <div class="col">
    </div>
    <div class="col">
        <?php echo $user_table ?>
    </div>
    <div class="col">
    </div>
</div>
</body>

</html>
