<?php
require ("conn.php");
$regexp = "/^[^0-9][A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";

if(!isset($_POST['email'])){
    header("Location: http://localhost/Backend22/inclass_03/form.php");
}elseif(empty($_POST['email'] || $_POST['message'])){
    header("Location: http://localhost/Backend22/inclass_03/form.php?msgid=1");
}elseif (!preg_match($regexp, $_POST['email'])){
    header("Location: http://localhost/Backend22/inclass_03/form.php?msgid=3");
}else{
    $email= $_POST['email'];
    $message = $_POST['message'];
    mail("kt@easv.dk","GTFU",$_POST['message'], "From: $email");
    $query3 = "INSERT INTO `names` (`ID`, `fname`, `lname`, `age`)
                VALUES (NULL, '$email', '$message', 42);";
    if(!mysqli_query($conn, $query3)){
        die("Error".mysqli_error($conn));
    }
    header("Location: http://localhost/Backend22/inclass_03/form.php?msgid=2");
}