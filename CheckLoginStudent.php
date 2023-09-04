<?php 
include "conn.php";

if (isset($_POST['email']) && isset($_POST['password'])){

    function ValidateData($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);


        return $data;

    }

    $email = ValidateData($_POST['email']);
    $password = ValidateData($_POST['password']);
    


    // $password = md5($password);
    if(empty($email) || empty($password)){
        // echo "invalid";
        header("Location: loginStudent.php?error=All Cases is important");
        exit();

    }else {
        $Login = $conn->query("SELECT * FROM student WHERE email = '$email' and password = '$password'");

        if($Login->rowCount()===1){

            session_start();
            $_SESSION['student'] = $Login->fetch(PDO::FETCH_ASSOC);
            header("Location:acceilStudent.php ");

            
        }else {

            header("Location: loginStudent.php?error=email or password incorrect");
        exit();

        }
        

    }
    

}