<?php
session_start();
include "../inc/inc.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["email"]) && isset($_POST["pass"])){
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
        $res = $conn->query($sql);
        if($conn->query($sql)->num_rows > 0){
            $row = $conn->query($sql)->fetch_assoc();
            $_SESSION["id"] = $row["id"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["fname"] = $row['fname'];
            echo json_encode(['success' => true , 'username' => $row['fname']]);
        }else {
            echo json_encode(['errormsg' => false , 'message' =>'User Not Founded']);
        }
    }else {
        echo "error";
    }
}else {
   /*  header("location:index.php"); */
}
?>