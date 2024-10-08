<?php

    $database= new mysqli("localhost","root","","dotor");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>