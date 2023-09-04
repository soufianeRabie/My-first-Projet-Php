<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include "framwork.php";
include "conn.php";

if (isset($_POST['Login'])){
    $fname = ValidateData($_POST['fName']);
    $lName = ValidateData($_POST['lName']);
    $gender = ValidateData($_POST['gender']);
    $email = ValidateData($_POST['email']);
    $phone = ValidateData($_POST['phone']);
    $departmet = ValidateData($_POST['departmet']);
    $address = ValidateData($_POST['address']);
    $Course = ValidateData($_POST['Course']);
    $Class = ValidateData($_POST['Class']);
    $photo = ValidateData($_POST['photo']);
    $password = ValidateData($_POST['password']);
    $re_password = ValidateData($_POST['re_password']);
    $userData= "first Nama= ".$fname ."&last Name =".$lName;
   

    if(empty($fname) || empty($lName) || empty($gender) || empty($email) || empty($phone) ||empty($departmet)
    || empty($address) || empty($Course) || empty($Class) || empty($password) || empty($re_password)){

        header("Location:signUp.php?error=All cases is important");
        exit();

    }elseif(!filter_var($email , FILTER_VALIDATE_EMAIL)){
        header("Location:signUp.php?error=Please enter a Validat Email");
        exit();
        
        }elseif ($password !==$re_password){

            header("Location:signUp.php?error=The Confirmation password does not much&$userData");
            exit();
        }else {

            echo "Donne first tape";
            
            //hasshing password 
            $password = md5($password);

            $sql = $conn->query("SELECT * FROM student WHERE Email = '$email'");

            if($sql->rowCount()>0){
                header("Location:signUp.php?error=the email is already used &$userData");
                exit();
                var_dump(($sql));

            }else {

             
                $key = mt_rand(99999,999999);
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
                $mail->Subject = 'Verification Code is'.$key;
                $style = '<body style="text-align:center ;font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif;">
                <img src="https://www.creativefabrica.com/wp-content/uploads/2022/04/19/Wolf-face-logo-vector-design-Graphics-29261487-1-580x386.png" alt="logo wolf" width="250">
                <p style="font-weight: bold ;color:#222;font-size:17px;">Your riadh coding Verification Code is: <br><br><b style="color:#222;font-size:40px;text-align:center">'.$key .'</b></p>
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

                $sql = $conn->prepare("INSERT INTO student VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
                $sql->execute([null,$fname,$lName,$gender,$email,$phone,$departmet,$address,$Course,$Class,$photo,$password,$key,"0"]);
                header("Location:verify.php?email=$email");

            }


            // $sql = $conn->prepare("INSERT INTO student ")

            

        }


        }





    

