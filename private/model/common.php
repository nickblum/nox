<?php
session_start();// why do I need this again??

function getNavSectors(){ //function parameters, two variables.
    $ret = new StdClass();
    $ret->data = false;
    $ret->haserror = false;
    $ret->error = '';
    
    $conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);
    if ($conn->connect_error) {
        $ret->error = $conn->connect_error;
    }

    $sql = "SELECT * FROM sectors ORDER BY sector_id";
    $ret->data = $conn->query($sql);

    $conn->close();
    return $ret;  //returns the second argument passed into the function
}