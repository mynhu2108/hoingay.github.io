
<?php
    $username=$_GET['u'];
    $con=new mysqli("localhost","root","","nlcs");
    $con->set_charset("utf8");
    $sql="SELECT * FROM taikhoan WHERE tendangnhap='$username'";
    $result=$con->query($sql);
    if($result->num_rows>0){
        echo "Tên đăng nhập đã được sử dụng trước đó, vui lòng chọn tên khác!";
    }else{
        echo "Chuẩn!";
    }
    $con->close();
?>