<?php
$tendangnhap=$_POST['myName'];
$email=$_POST['mail'];
$matkhau=md5($_POST['mk']);
$matkhau2=md5($_POST['mk2']);

$con=new mysqli("localhost","root","","nlcs");
$con->set_charset("utf8");

$sql1="INSERT INTO taikhoan (tendangnhap,email,matkhau,matkhau2) 
VALUES('$tendangnhap','$email','$matkhau','$matkhau2')";
$result=$con->query($sql1);
header("location:dangnhap.php");
$con->close();

?>

