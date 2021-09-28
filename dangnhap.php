<html>
    <head>
        <meta charset="utf8">
        <title>Hỏi khó đáp nhanh</title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


	</head>
	
    <script>
        function kiemtradn(){
            var ck=true;
               
            var ten=document.getElementById("myName").value;
                if(ten==""){
                    document.getElementById("error_name").innerHTML="*Nhập tên vào nào!";
                    ck =false;
                }

			var mk=document.getElementById("matkhau").value;
        		if(mk==""){
            	document.getElementById("error_mk").innerHTML="*Vui lòng nhập mật khẩu";
            	ck =false;
        }
                return ck;
            }
        </script>

<body>
	<div class="row " style="padding-top: 50px;">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div style="text-align:center; font-size:larger" class="panel-heading">Đăng nhập ngay thôi nào!
			</div>
			<div class="panel-body" >
				<form name="myform" action="dangnhap_test.php" method="POST" enctype="multipart/form-data" onsubmit="return kiemtradn()">
					<div class="form-group">
						<label for="myName">Tên đăng nhập *</label>
						<input id="myName" name="myName" class="form-control" type="text" data-validation="required" >
						<span id="error_name" class="text-danger"></span>
					</div>
				
					<div class="form-group">
						<label for="matkhau">Mật khẩu *</label>
						<input id="matkhau" name="matkhau" class="form-control" type="password" data-validation="required" >
						<span id="error_mk" class="text-danger"></span>
					</div>
					<div style="text-align:center">
					<button id="submit" type="submit" name="dangnhap" value="dangnhap" class="btn btn-primary center">Đăng nhập ngay</button>
		</div>
				</form>
				<div style="text-align:center">Bạn chưa có tài khoản? <a href="dangki.html"> Đăng kí ngay</a></div>

			</div>
		</div>
	</div>
</div>
				













     <!-- <div class="container">
	 
	 <div class="row justify-content-center align-items-center" style="height:100vh">
        <div class="col-4">	
			<p class="h5 mb-3 font-weight-normal" style="text-align: center; color:blue">Đăng nhập ngay thôi nào!</p>	
        	<div class="card">
        		<div class="card-body">

        		<form action="dangnhap_test.php" method="POST" enctype="multipart/form-data" onsubmit="return kiemtradn()">
					<div class="form-group">				
                		<input type="text" name="tendangnhap" class="form-control input_user"  placeholder="Tên đăng nhập">          
						<span id="error_name" class="text-danger"></span>
					</div>
                
            		<div class="form-group">
						<input type="password" name="matkhau" class="form-control input_pass" placeholder="Mật khẩu">
						<p id="mkdntb"></p>
					</div>

            		<div class="btn btn-primary ">
                		<input type="submit" name="dangnhap" value="Đăng nhập">
            		</div>
        		</form>

        		</div> -->
		
					<!-- <div class="d-flex justify-content-center links">
						Bạn chưa có tài khoản?<a href="dangki.html" class="ml-2">Đăng kí ngay</a>
					</div>
				
				</div>
		</div>
	</div> -->
        
</body>
</html>

