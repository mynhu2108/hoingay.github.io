<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires:0');

?>
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
      margin-top:70px;
      background-color: grey;
      
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
      margin-top:10px;
      border:0.3px solid #E8E8E8;
      width:890px;
      height:540px;
      overflow-x:auto;
      overflow-y:auto;
        }
    .tendangnhap{
      font-weight:bold;
      font-size:30px;
     
    }
    .traloi{
      border: none;
      background-color:#FFFFF0;
      color:#CC3333	;
      font-weight:bold;

    }


  </style>
  <script>        
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

    </div>
<!--============================================================================================================-->
    <?php
      if(isset($_COOKIE['nhu'])){
        $tendangnhap=$_COOKIE['nhu'];
                    
        $con=new mysqli("localhost","root","","nlcs");
        $con->set_charset("utf8");
                    
        $sql3="select tendangnhap from taikhoan where tendangnhap='$tendangnhap'";
        $result3=$con->query($sql3);
        $row1=$result3->fetch_assoc();
        $ten=$tendangnhap;
        echo "
          <div  class='col-sm-8 text-left'> 
            <div class='tendangnhap'>Chào mừng 
            ".$row1['tendangnhap']."
            </div>

            <div id='scrolling'> 
        ";
              
        $sql1="select * from cauhoi where tendn='$ten' order by id DESC "; 
        $result=$con->query($sql1);

        if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
            echo "    
              <div  class='well' style='background-color:#FFFFF0; border: 0.5px solid #B0E0E6' > 
              
              <div style='color:#CC3333	; font-weight:bold'>
               &#8594; ".$row['chude']."                
             </div>
                <p style='font-size: 12px; font-family:verdana'>".$row['time']."</p>

              ".$row['noidungcauhoi']." <br>
            ";  
          
                if($row['anh']=='hinhanh/'){
                  echo "";
                }
                else{
                  echo"<image style='width: 290px; height: 200px' src=".$row['anh'].">";
                }
                echo"
                
                <div style='margin-left:200px; '>
                  <a class='traloi' href='formtraloi.php?id=".$row['id']."'>Trả lời  |</a>
                  <?id=".$row['id']."' > <input class='traloi' type='button' onclick='dapan(".$row['id'].")'value='Xem câu trả lời'>    
              
                  <div id='dapan".$row['id']."' ></div>
                </div>
                </div>
                ";
          }
        }
        else{
          echo"
          <p style='color:#800000; font-weight:bold; text-align:center; margin-top:10px'> Bạn chưa có hoạt động nào </p>";
        }
      }
      else{
        header("location:dangnhap.php");
      }
  echo"
  </div>
</div>";
?>

  <div class="col-sm-2 sidenav">
    <div class="well">
      <a style="corlor:#0099FF" href="formcauhoi.php">Đặt câu hỏi</a>
    </div>
    
    <form action="dangxuat.php">
      <input type="submit" name="dangxuat" value="Đăng xuất">
    </form>



  </div>

</div>

</body>
</html>
