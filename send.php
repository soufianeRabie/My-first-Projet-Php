<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $key = mt_rand(99999,999999);

//ruquyynnnegqgasj
    $mail = new PHPMailer(true);            
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'soufyanerabie@gmail.com';                    
    $mail->Password   = 'eulqpzhehezicklz';                           
    $mail->SMTPSecure = 'ssl';           
    $mail->Port       = 465;                                   
    $mail->setFrom('soufyanerabie@gmail.com');
    $mail->addAddress($_POST['email']);    
    $mail->isHTML(true);                           
    $mail->Subject = 'Verification Code';
    $style = '<body style="text-align:center ;font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif;">
    <img src="https://www.creativefabrica.com/wp-content/uploads/2022/04/19/Wolf-face-logo-vector-design-Graphics-29261487-1-580x386.png" alt="logo wolf" width="250">
    <p style="font-weight: bold ;color:#222;font-size:17px;">Your riadh coding Verification Code is: <br><br><b style="color:#222;font-size:40px;text-align:center">499545</b></p>
    <h3 style="color:red;text-align:center">Code expire in 3 minutes</h3>
    <br><br>
    <h1 style="font-weight: bold ;color:#222;font-size:25px;">Find Me on:</h1>
    
    <div class="social" style="background: rgb(59, 59, 59);padding: 12px;">
    
        <a style="color: #fff;font-size: 17px;margin-left: 20px;" href="https://www.youtube.com/c/riadhcoding">Youtube</a>
        <a style="color: #fff;font-size: 17px;margin-left: 20px;" href="https://t.me/riadh_coding">Telegram</a>
        <a style="color: #fff;font-size: 17px;margin-left: 20px;" href="https://www.instagram.com/c/riadh_coding">Instagram</a>
    </div></body>';
    $mail->Body  = $style;
    $mail->send();
   header("Location:verify.");


}