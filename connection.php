<?php

    $database= new mysqli("localhost","root","Ankit123456#","easymed");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>