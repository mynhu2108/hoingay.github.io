<?php
    $con=new mysqli("localhost","root","","nlcs");

    $con->set_charset("utf8");

    $sql1="select * from cauhoi";

    $result=$con->query($sql1);

    $row=$result->fetch_assoc();

while($row=$result->fetch_assoc()){

    echo "".$row['id']."";

    echo"

    <div>".$row['tendn']."</div>

    <div>".$row['chude']."</div>

    <div>".$row['noidungcauhoi']."</div>    

    <div><image src=".$row['anh']."></div> 

    <div>    <a href='formtraloi.php?id=".$row['id']."'>tra loi</a>    </div>

    <div><a href='xemtraloi.php?id=".$row['id']."'>xem tra loi</a></div>

     <hr>
     ";

}
    echo" <a href='index.php'>trang chủ</a>";
?>