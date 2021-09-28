<?php
echo"
<html>
    <head>
        <meta charset='utf8'>
    </head>
    <body>
        <br>
        <form method='POST' enctype='multipart/form-data'>
            <label for='hoten'>Họ và tên: </label>
            <input type ='text' name='hoten' >
            
            <label for='email'>  Email: </label>
            <input type='email' name='email' >

            <input type='submit' value='gửi' name='gui'>
        </form>
    </body>
</html>

";
if(isset($_POST['gui'])){
    $hoten=$_POST['hoten'];
    $mail=$_POST['email'];

    echo"
    <br><br>
    <div style='color: blue; font-size: 20px'>
        Họ và tên đã nhập: ".$hoten."
        <br>
        Email đã nhập: ".$mail."
    </div>
    ";
}

?>