<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <label for="">enter code verification</label>
    <input type="text" name="verifCode">
    <input type="submit" value="verify" name="verify">
    </form>
    <?php
    include "conn.php";
    $email = $_GET["email"];
    $query = $conn->query("SELECT CodeVerif , verified FROM student WHERE email='$email'")->fetch(PDO::FETCH_ASSOC);
    // echo $query["CodeVerif"];
    if(isset($_POST["verify"])){
        if($query["CodeVerif"]==$_POST["verifCode"] && $query["verified"]==false ){
        $Update = $conn->query("UPDATE student SET verified='1' WHERE email='$email' ");
        echo "Thank you for verifaction click here for login <a href='loginStudent.php'> login</a>";
        exit();
      
    }else{

        if(($query["CodeVerif"]==$_POST["verifCode"] || $query["CodeVerif"]!=$_POST["verifCode"] ) &&  $query["verified"]==true ){
            echo "the email has already verified click here for login <a href='loginStudent.php'> login</a>";
            exit();
        }else{

            echo "sorry the code vrification is incoorrect?!";
            exit();
        }

    }
    }
    
    
    ?>
</body>
</html>