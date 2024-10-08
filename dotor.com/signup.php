<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
</head>
<body>
    <h1>SignUp</h1>

<?php
session_start();

//import database
include("connection.php");

if($_POST){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $name = $fname." ".$lname;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if($password == $cpassword){
        $database->query("insert into patient(pname,pemail,ppassword) values('$name','$email','$password')");
        $database->query("insert into user(email,usertype) values('$email','p')");
        header('Location: patient/index.php');
    }
    else{
        $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>';
    }
}
?>


    <form action="" method="POST">

    <label for="fname">First Name</label>
    <input type="text" name="fname"><br>

    <label for="lname">Last Name:</label>
    <input type="text" name="lname"><br>

    <label for="email">Email:</label>
    <input type="email" name="email"><br>

    <label for="password">Password:</label>
    <input type="text" name="password"><br>

    <label for="cpassword">Confirm-Password:</label>
    <input type="text" name="cpassword"><br>

    <input type="submit" value="next">
    </form>

</body>
</html>