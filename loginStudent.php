<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loginAll.css">
</head>
<body>
    <div class="box">
        <div class="box2">

        <form action="CheckLoginStudent.php" method="post">
        <h2>Log in</h2>
        <?php if(isset($_GET["error"])){?> 
            <p class="error"> <?php echo $_GET["error"]; ?></p>
        
        <?php }?>

        <div class="specialLogin"> you now login as a student </div>

     	<div class="Input">
         <input type="text" name="email" required="required" >
         <span>Email</span>
         <i></i>
        </div>
        <div class="Input">
        <input type="password" name="password" required="required">
        <span>Password</span>
        <i></i>
        </div>
        <i></i>
     	
        <div class="links">
            <a href=""> forgot pasdword</a>
            <a href="signUp.php"> Signup</a>

        </div>
        <input type="submit" value="SignUp" name="login">


    </form>
    </div>
    </div>
</body>
</html>