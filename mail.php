<?php
//include các file mailer
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

//define namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;  

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
    $mail->Subject="test email";
//
    $mail->setFrom("mynhuvh@gmail.com");
//set body
    $mail->Body="this is the test email to nhub1809163@student.ctu.edu.vn";
//mail nguoi nhan
    $mail->addAddress("");
    //$mail->addAddress("mynhuvh@gmail.com");
//gui mail
    if($mail->Send()){
        echo "gui thanh cong";
    }
    else{
        echo "loi";
    }
//dong ket noi
    $mail->smtpClose();

?>