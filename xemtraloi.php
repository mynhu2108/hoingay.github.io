<?php
$id= $_GET['id'];
    $con=new mysqli("localhost","root","","nlcs");
    $con->set_charset("utf8");
    $sql1="SELECT * from traloi where idcauhoi='".$id."'  ORDER BY idcauhoi DESC"; 
    $result=$con->query($sql1);

	echo" <div id='nd".$id."' >";
	echo" <input style='background-color:#FFFFF0; border: 0; font-size: 12px; text-decoration: underline ' 
			type='button' value='ẩn bớt' onclick='an(".$id.")' >";
	if ($result->num_rows > 0){
		while($row=$result->fetch_assoc()){
			echo"
				<div style='color:#800000; font-weight:bold' >  ".$row['ten']."</div>
				<div style='margin-left:50px'>".$row['noidung']."</div>   
				<hr>
			";			
			}
		} else {
			echo "<br> Chưa có câu trả lời.<br>";
		}
echo "</div>";


$con->close();
?> 