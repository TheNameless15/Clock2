<?php
$name = $_POST['user_name'];
$phone =$_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];
$email = $_POST['email'];
$status = $_POST['user_status_id'];
include_once '../../../connect/open.php';
$sql = "INSERT INTO user (user_name,phone,address,password,email,user_status_id) VALUES ('$name','$phone','$address','$password','$email',$status)";
$insertUserIntoDatabase = mysqli_query($connect,$sql);
header("Location:index.php");
include_once '../../../connect/close.php';
?>