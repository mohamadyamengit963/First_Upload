<?php 
$servetName = "localhost";
$username = "root";
$userpass = "";
$dbnaem = "myshop";
$conn =  mysqli_connect($servetName , $username , $userpass , $dbnaem);
if($conn->connect_errno){
    die("Connetction Error");
}else {
   /*  echo "Coneect Succ"; */
}
$conn->set_charset("UTF8");

?>