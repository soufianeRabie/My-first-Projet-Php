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



    if(empty($email) || empty($password)){
        // echo "invalid";
        header("Location: loginTeacher.php?error=All Cases is important");
        exit();

    }else {
        $Login = $conn->query("SELECT * FROM teacher WHERE email = '$email' and password = '$password'");

        if($Login->rowCount()===1){

            session_start();
            $_SESSION['teacher'] = $Login->fetch(PDO::FETCH_ASSOC);
            header("Location:acceilTeacher.php ");
            // echo "connect";

            
        }else {

            header("Location: loginTeacher.php?error=email or password incorrect");
        exit();

        }
        

    }
    

}