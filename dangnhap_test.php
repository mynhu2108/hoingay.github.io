
<?php

if(isset($_POST['dangnhap'])){
$tendangnhap=$_POST['myName'];
$matkhau=md5($_POST['matkhau']);

$con=new mysqli("localhost","root","","nlcs");
$con ->set_charset("utf8");

$sql="SELECT * FROM taikhoan WHERE tendangnhap='$tendangnhap' and matkhau='$matkhau'";

$result=$con ->query($sql);

if($result->num_rows>0){
   setcookie("nhu","$tendangnhap",time()+7200);
   header("location:index.php");
 }
 else{header("location:dangnhap.php");
 }

$con ->close();
}

?>