
<html>
    <head>
        <meta charset="utf8">
        <title>Hỏi ngay</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <style>
          .home{
            color:#0000FF	;
            font-weight:bold;
          }
          .benphai{
            border: 0.2px dotted #836FFF;
            color:#FF0033;
            background-color:#FFFFF0;
            
          }
          .benphai:hover{
            background-color:#FFCC66;
            font-weight:bold;
          }

        </style>

    </head>
    <script>
        function test(){
                var ck=true;
                var mk=document.getElementById("noidung").value;                
                if(mk==""){
                    document.getElementById("ndtb").innerHTML="*Bạn chưa viết câu trả lời";
                    ck =false;
                }
                return ck;
            }
</script>

<body>

  <div class="well" style=" margin: auto; margin-top:30px; width: 750px; background-color:#FFF8DC; border: 0.5px solid #0000FF">
    <div>  
      <h3 style="color:blue">Nhập nội dung câu trả lời</h3>
        <br>          
            
<?php

if(isset($_COOKIE['nhu'])){
  $tendangnhap=$_COOKIE['nhu'];

		$idcauhoi = $_GET['id'];
        echo "<form method='POST' enctype='multipart/form-data' onsubmit='return test()'>            
        
        <div class='form-group'>
          <label class='col-sm-2' for='noidung'>Nội dung câu trả lời:</label>
          <div class='col-sm-10'>          
            <textarea style='height:150px; width:450px' class='form-control' id='noidung' name='noidung'></textarea>
              <span class='text-danger' id='ndtb'></span>
          </div>
        </div>
   
      <input class='benphai' style='margin-left:490px; margin-top:20px' type='submit' name='gui' value='Trả lời ngay'>

      </form>

        ";  
	?>
  <a class="home" href="index.php">trang chủ</a>
  </div>
</div>
<?php
}
else{
  header("location:dangnhap.php");
}

?>
</body>
</html>

<!--------------------------------------------------------------------------------->
<?php
//include các file mailer
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

//define namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 


  if(isset($_POST['gui'])){
      $idcauhoi = $_GET['id'];
      $noidungtraloi=$_POST['noidung'];
      
      $con=new mysqli("localhost","root","","nlcs");
      $con ->set_charset("utf8");

      $sql="insert into traloi (idcauhoi,noidung,ten) value('$idcauhoi','$noidungtraloi','$tendangnhap')";
      $result=$con->query("$sql");

      $sql1="select tendn from cauhoi where id='$idcauhoi'";
      $result1=$con->query($sql1);
      $row1=$result1->fetch_assoc();
      //$tendn=$_GET['tendn'];

      $sql2="SELECT * FROM taikhoan WHERE tendangnhap='".$row1['tendn']."' ";
      $result2=$con ->query($sql2);
      $row=$result2->fetch_assoc();

      if($result2->num_rows>0){
      //echo " ".$row['email']." ";   
      
      //khởi tạo cấu trúc mail
      $mail=new PHPMailer();
  //cau hinh mail voi smtp
      $mail->isSMTP();
  //may chu mail
      $mail->Host="smtp.gmail.com";
  //
      $mail->SMTPAuth="true";
  //ma hoa
      $mail->SMTPSecure="tls";
  //set port
      $mail->Port="587";
  //nguoigui
      $mail->Username="mynhuvh@gmail.com";
  //pass
      $mail->Password="mynhu2108";
  //
      $mail->Subject="Hoi Ngay";
  //
      $mail->setFrom("mynhuvh@gmail.com");
  //send htm mail
      $mail->isHTML(true);
  //set body
      $mail->Body="Xin chào bạn ".$row1['tendn']."! Câu hỏi của bạn tại Hỏi Ngay đã có câu trả lời. 
                  Cùng truy cập ngay: <a href='http://localhost/nienluancoso/thongtincanhan.php?tendangnhap=".$row1['tendn']."'> tại đây</a> ";
  //mail nguoi nhan
      $mail->addAddress(" ".$row['email']." ");
     
  //gui mail
      if($mail->Send()){
          header("location:index.php?id=".$idcauhoi."");
      }
  //dong ket noi
      $mail->smtpClose();
      }

  }



?>