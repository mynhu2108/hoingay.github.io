
<html lang="en">
<head>
  <title>Hỏi ngay</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  
  
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: white;
      height: 100%;
      
    }
    .tutao1{
      color:blue;
      
    }
    .tutao2{
      background-color:#FFFFFF;
      font-weight:bold;
      height: 60px;
    }

    
    /* Set black background color, white text and some padding */
    footer {
      position: -webkit-sticky; /* Safari */
      position: sticky;
      margin-top:90px;
      background-color: #EEE9E9;
      
      color: black;
      padding: 15px;
    } 
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

    #scrolling{
      border:0.3px solid #E8E8E8;
      width:890px;
      height:500px;
      overflow-x:auto;
      overflow-y:auto;
        }
    .traloi{
      border: none;
      background-color:#FFFFF0;
      color:#CC3333	;
      font-weight:bold;

    }
    .benphai{
      border: 0.2px dotted #836FFF;
      background-color:#FFFFF0;
      color:#0000FF	;
      font-weight:bold;

    }
    .tim{
      border: 0.2px solid green;
      background-color:#FFFAF0;
      border-bottom-left-radius: 10px;
      border-top-right-radius: 10px;
    }
  </style>

  <script>    

    function an(str){
      document.getElementById("nd"+str).innerHTML="";
    }
    

    function dapan(str){
        var xmlhttp;
        if(window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }
        else{
            xmlhttp=new ActiveXObject("microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if(this.readyState==4 && this.status==200){
                document.getElementById("dapan"+str).innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","xemtraloi.php?id="+str,true);
        xmlhttp.send();
    }

    </script>

</head>



<body style="font-family:tahoma;">

<nav  style="background-color:#0000FF;" >    
  <div > 
    <a class="col-sm-offset-1" href="index.php"><img style="width:110px; height:60px" src="logomoi.png"></a> 
    <a  class="col-sm-offset-8" style="color:white" href="dangnhap.php"> Đăng nhập | </a>   
    <a  style="color:white"  href="dangki.html"> Đăng kí</a>     

  </div>
</nav>
  
<!--============================================================================================================-->
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav"  style="text-align:left" >
    <p>
        <?php       
            $con=new mysqli("localhost","root","","nlcs");

            $con->set_charset("utf8");
        
            $sql2="select tenmon from monhoc";
        
            $result2=$con->query($sql2);
        
            if($result2->num_rows>=0){
                while($row=$result2->fetch_assoc()){                       
                    echo "
                    <a class='tutao1' href='loc.php?tenmon=".$row['tenmon']."'> ".$row['tenmon']." </a>
                    <br><br>"; 
                }
            }
        ?>
    </p>
    </div>
<!--============================================================================================================-->

      <div  class="col-sm-8 text-left"> 

      <div class="text-center"  >
      <br>
        <form method="POST" enctype="multipart/form-data" >

          <input class="tim" type="text" name="timtu" placeholder="tìm kiếm...">
          <input class="tim" type="submit" name="tim" value="Tìm">
        
        </form>           
      </div> 
      
      
      <div id="scrolling">
        <?php
        if(isset($_POST['tim'])){
        $timtu=$_POST['timtu'];

        $con=new mysqli("localhost","root","","nlcs");
        $con->set_charset("utf8");

        $sql="SELECT * FROM cauhoi WHERE noidungcauhoi LIKE '%$timtu%'";
        $result=$con->query($sql);

        if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $id=$row['id'];
          //echo $row['noidungcauhoi'];
          echo"
          <div class='well' style='background-color:#C1FFC1; border: 0.5px solid #B0E0E6'>
            <div style='color:#CC3333; font-weight:bold'>
                ".$row['tendn']."   &#8594;  
                ".$row['chude']."              
            </div>
            <p style='font-size: 12px; font-family:verdana'>
              ".$row['time']."
            </p>

            <div style='margin-left:50px'>
                ".$row['noidungcauhoi']." <br>     
            ";

            if($row['anh']=='hinhanh/'){
              echo "";
            }
            else{
              echo"<image style='width: 290px; height: 200px' src=".$row['anh'].">";
            }  

            echo"
            </div> 

            <div style='margin-left:200px; '>    
              <a class='traloi' style='background-color: #C1FFC1' href='formtraloi.php?id=".$row['id']."'>Trả lời  |</a>      

            <?id=".$row['id']."' > 
                  <input class='traloi'style='background-color: #C1FFC1'  type='button' onclick='dapan(".$row['id'].")'value='Xem câu trả lời'>    

                  <div id='dapan".$row['id']."' ></div>           
              
            </div> 
                       
            </div>

            ";
        }
        echo"
            <p style='text-align:center; color:#32CD32'>-------hết kết quả--------</p>";
        }
        
        else echo "Không có kết quả phù hợp";
        $con->close();
        }

        ?>    
    
        <!--.................................................-->    
    
        
        <?php
            $con=new mysqli("localhost","root","","nlcs");
            $con->set_charset("utf8");
            $sql1="SELECT * FROM cauhoi ORDER BY id DESC"; 
            $result=$con->query($sql1);

            $sql2="select * from traloi"; 
            $result2=$con->query($sql1);
            
        if($result->num_rows>=0){
          while($row=$result->fetch_assoc()){
            echo"           
            <div class='well' style='background-color:#FFFFF0; border: 0.5px solid #B0E0E6'>
            <div style='color:#CC3333; font-weight:bold'>
                ".$row['tendn']."   &#8594;  
                ".$row['chude']."              
            </div>
            <p style='font-size: 12px; font-family:verdana'>
              ".$row['time']."
            </p>

            <div style='margin-left:50px'>
                ".$row['noidungcauhoi']." <br>     
            ";

            if($row['anh']=='hinhanh/'){
              echo "";
            }
            else{
              echo"<image style='width: 290px; height: 200px' src=".$row['anh'].">";
            }  

            echo"
            </div> 

            <div style='margin-left:200px; '>    
              <a class='traloi' href='formtraloi.php?id=".$row['id']."'>Trả lời  |</a>      

            <?id=".$row['id']."' > 
                  <input class='traloi' type='button' onclick='dapan(".$row['id'].")'value='Xem câu trả lời'>    

                  <div id='dapan".$row['id']."' ></div>           
              
            </div>            
            </div>

            ";
        }
      }
        ?>
    </div>

    </div>
    <div class="col-sm-2 sidenav">
      
      <div class="well benphai">
          <a  href="thongtincanhan.php">Trang cá nhân</a>
      </div>

      <div class="well benphai">
        <a style="corlor:#0099FF" href="formcauhoi.php">Đặt câu hỏi</a>
      </div>

      <!-- <div class="well"> -->
          
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                    <a href="https://www.ctu.edu.vn/" target="_blank">
                     <img style="width:195px; height: 200px;" src="ctu.png">
                    </a>
                  </div>
                  <div class="carousel-item">
                    <a href="http://www.cit.ctu.edu.vn/" target="_blank">
                     <img style="width:195px; height: 200px;" src="cit.jpg">
                    </a>
                  </div>
                  <div class="carousel-item">
                  <a href="https://yu.ctu.edu.vn/" target="_blank">
                     <img style="width:195px; height: 200px;" src="doan.jpg">
                  </a>
                  </div>
               </div>
            </div>
    
      </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>copyright: Nguyễn Thị Mỹ Như
      <br>
      contact: nhub1809163@student.ctu.edu.vn     

  </p>
</footer>

</body>
</html>
