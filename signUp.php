
<?php 

include "conn.php";
include "framwork.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signUp.css">
</head>
<body>
    <form action="CheckSignUp.php" method="post">
        <?php if (isset($_GET["error"])) {?>

            <p class="error"> <?php echo $_GET["error"]; ?> </p>
        <?php } ?>


        <label>First Name</label>
        <input type="text" name="fName" placeholder="First Name">

        <label>Last Name</label>
        <input type="text" name="lName" placeholder="Last Name">

        <label>Gender</label>
        <div class="gender">
        Male:<input type="radio" name="gender" value="male">
        Female:<input type="radio" name="gender" value="female">
        </div>

        <label>Email</label>
        <input type="text" name="email" placeholder="Email">

        <label>Phone</label>
        <input type="text" name="phone" placeholder="Phone">

        <label>Department</label>
        
        <select name="departmet" id="">
            <option value="">Selectioner Categorie</option>
            <?php

            GetOptions($Departments , $conn ,$Department,$DepId,$DepName,"IdDep","NameDep","department1");

            ?>
        </select><br>

        <label>Address</label>
        <input type="text" name="address" placeholder="Address">

        <label>Course</label>
        <select name="Course" id="">
            <option value="">Selectioner Categorie</option>

            <?php


            GetOptions($courses , $conn, $course,$CourseId , $CourseName,"CourseId","CourseName","courses");

            ?>
                
        </select><br>

        <label>class </label>
        <select name="Class" id="">
            <option value="">Selectiioner a Class</option>

            <?php 
            
            GetOptions($Classes , $conn , $Class , $IdClass , $NameClass,
            "ClassId","ClassName","class");

            ?>

        </select>

        <label>photo</label>
        <input type="file" name="photo" placeholder="Choice Photo">

        <label>Password</label>
        <input type="password" name="password" placeholder="password">

        <label>Re Password</label>
        <input type="password" name="re_password" placeholder="Re_Password">
        <button name="Login">Sign Up</button>




    </form>
</body>
</html>