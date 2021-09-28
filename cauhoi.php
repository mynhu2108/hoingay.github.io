<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(isset($_COOKIE['nhu'])){
    $tendangnhap=$_COOKIE['nhu'];

    $chude=$_POST['chude'];
    $noidung=$_POST['noidung'];

    $path = "hinhanh/".$_FILES["anh"]["name"];
    move_uploaded_file($_FILES["anh"]["tmp_name"], $path);
    
    
    $con=new mysqli("localhost","root","","nlcs");
    $con->set_charset("utf8");

    $sql2="select tendangnhap from takhoan where tendangnhap='$tendangnhap'";
        $result2=$con->query($sql2);

    $sql="insert into cauhoi (chude,noidungcauhoi,anh,tendn) 
                value('$chude','$noidung','$path','$tendangnhap')";

    $result=$con->query("$sql");
    header("location:index.php");
    $con->close();
}
else{
    header("location:dangnhap.php");
}


?>