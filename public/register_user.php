<?php
include '../include/inc_top_login.php';

$sign_up_button ='';
?>


<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../public/css/styles.css">

    <title>Register</title>
</head>

<body>
<div class="row">

    <div class="col">
    </div>

    <div class="col">

        <br><br>
        <div class="card card_center border-primary mb-3" >
            <div class="card-body text-primary">

                <div class="row">
                    <div class="col" style="width:100%">
                        Select app type: <br>
                        <select id="app_category" class="select2" style="width: 100%;height: 60px;" >         <!-- onclick="get_inputs_by_content()" -->
                            <option  value=" ">Select account type </option>
                            <option  value="Standard">Standard</option>
                            <option  value="Premium">Premium</option>
                        </select>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-sm-6" style="width:100%">
                        <p> Username: </p>
                        <input type="text" id="username" name="username" class="form-control" style="width: 100%;" onkeyup="check_if_username_is_already_taken()">
                    </div>

                    <div class="col-sm-6" style="width:100%">
                        <p> Password: </p>
                        <input type="password" id="password" name="password" class="form-control" style="width: 100%;">
                    </div>
                </div>
                <br><br>

                <!-- Buttons -->
                <div class="row">
                    <div class="col-sm-2" style="width:100%">
                    </div>
                    <div class="col-sm-8" style="width:100%">
                        <div id = "sign_up_button_div">
                        </div>
                    </div>
                    <div class="col-sm-2" style="width:100%">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-2" style="width:100%">
                    </div>
                    <div class="col-sm-8" style="width:100%">
                        <button type="button" class="btn btn-danger" onclick="cancel_adding_user();"  style="width:100%;">Cancel</button>
                    </div>
                    <div class="col-sm-2" style="width:100%">
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="col">
    </div>

</div>


<script>

function check_if_username_is_already_taken(){

    var username = $("#username").val();
    var moddata = '#sign_up_button_div';

    var checking=$.post("../db/check_if_username_already_taken.php",{ username: ""+username+"" }, function(data){
        if(data.length >0) {
            $(moddata).html('');
            $(moddata).html(data);
            //console.log(data);
        } else { }
    });
}


function save_new_user(){

    var app_category = $('#app_category').val();
    var username = $('#username').val();
    var password = $('#password').val();

    if(app_category.length>=6  && username.length>=8 && password.length>=8){

        var checking=$.post("../save/save_registered_user.php",{ app_category: ""+app_category+"", username: ""+username+"", password: ""+password+""}, function(data){
            if(data.length >0){
                //console.log(data);
                if(data.trim()=="OK"){
                    window.open('home.php', '_self');
                }else{
                    //alert(data);
                    window.open('home.php', '_self');
                }
            } else{
            }
        });
    } else{
        alert("Please fill out all 3 fields (both username and password must be at least 8 characters long)");
    }
}

</script>


<script>
    function cancel_adding_user(){
        window.open('login.php', '_self');
    }
</script>

</body>

</html>
