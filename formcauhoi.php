<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(isset($_COOKIE['nhu'])){
    $tendangnhap=$_COOKIE['nhu'];

    $con=new mysqli("localhost","root","","nlcs");

    $con->set_charset("utf8");

    $sql="select tenmon from monhoc";

    $result=$con->query($sql);
  
 ?>
<!--============================================================-->

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
                    document.getElementById("ndtb").innerHTML="*Bạn chưa hỏi";
                    ck =false;
                }
                return ck;
            }

</script>

<body>

<div class="well" style=" margin: auto; margin-top:30px; width: 750px; background-color:#FFF8DC; border: 0.5px solid #0000FF">
  <h3 style="color:blue">Nhập nội dung câu hỏi</h3>
  <br>
  <form class="form-horizontal" action="cauhoi.php" method="POST" enctype="multipart/form-data" onsubmit="return test()" >
    <div class="form-group">
      <label class=" col-sm-2" for="chude">Chọn chủ đề:</label>
      
      <div class="col-sm-10">
      <select name="chude">            
                <?php      
                
                

                    if($result->num_rows>=0){
                        while($row=$result->fetch_assoc()){                     
                ?>

                <option>
                    <?php    echo "".$row['tenmon']."";       ?>
                </option> 

                <?php          }};            ?>

            </select>
      </div>
    
    </div>
    <div class="form-group">
      <label class=" col-sm-2" for="noidung">Nội dung câu hỏi:</label>
      <div class="col-sm-10">          
        <textarea style="height:150px; width:450px" class="form-control" id="noidung" name="noidung"></textarea>
        <span class="text-danger" id="ndtb"></span>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="anh"></label>
      <div class="col-sm-10">

      <input type="file" class="glyphicon glyphicon-camera" name="anh" accept="image/*">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-9 col-sm-10">
        <input class="benphai" type="submit" class="btn btn-default" name="gui" value="Hỏi ngay"></input>
      </div>
    </div>
  </form>
  <a class="home" href="index.php">Trang chủ</a>
</div>

</body>
</html>

<?php   
    $con->close();

}
else{
    header("location:dangnhap.php");
}

?>
