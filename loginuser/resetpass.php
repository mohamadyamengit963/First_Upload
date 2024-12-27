<?php 

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST["email"];
    $Code = $_POST["resetCode"];
    $ExpierDate = $_POST["expiredate"];
    // end here put Add Code To DataBase And Send Code Or Links To The E-mail For Updating Passowrd
}
?>