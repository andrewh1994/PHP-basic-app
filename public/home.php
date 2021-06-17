<?php
include('../db/session.php');
include '../include/inc_top.php';

?>


<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <title>Home</title>
</head>

<body>

<div class=""row">
<br><br><br>
</div>

<div class="row">
    <div class="col">
    </div>
    <div class="col">
        <h2>Hello <?php echo $_SESSION['login_user'] ?>,  welcome to my PHP app</h2> <br>

        <p>This is a simple web app built in PHP that allows the user to connect to a mySQL database, enter in new users and to view a list of previously registered users.</p> <br>

        <p>Here is a <a href="https://github.com/andrewh1994">link</a> to my Github </p>

    </div>
    <div class="col">
    </div>
</div>
</body>

</html>