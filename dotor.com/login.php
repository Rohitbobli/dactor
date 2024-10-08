<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
<?php 

session_start();

    $_SESSION["user"]="";
    $_SESSION["usertype"]="";

    include("connection.php");

    if($_POST){

        $email=$_POST['email'];
        $password=$_POST['password'];

        $result= $database->query("select * from user where email='$email'");
        
        if($result->num_rows==1){
            $utype=$result->fetch_assoc()['usertype'];
            if ($utype=='p'){
                
                $checker = $database->query("select * from patient where pemail='$email' and ppassword='$password'");
                if ($checker->num_rows==1){


                    //Patient
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='p';
                    
                    header('location: patient/index.php');

                }else{
                    }

            }elseif($utype=='a'){
                //TODO
                $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
                if ($checker->num_rows==1){


                    //Admin 
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='a';
                    
                    header('location: admin/index.php');

                }else{
                    }


            }elseif($utype=='d'){
                //TODO
                $checker = $database->query("select * from doctor where docemail='$email' and docpassword='$password'");
                if ($checker->num_rows==1){


                    //doctor 
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='d';
                    header('location: doctor/index.php');

                }else{
                        }

            }
            
        }else{
                }
        
    }

?>

<form action="" method="POST">

<label for="email">Email:</label>
<input type="email" name="email"><br>

<label for="password">Password:</label>
<input type="text" name="password"><br>

<input type="submit" value="Login">
</form>

</body>
</html>