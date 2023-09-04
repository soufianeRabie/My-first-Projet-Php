<?php 
session_start();
include "conn.php";

$idStudent = $_SESSION["student"]["Id"];

$courses = $conn->query("SELECT teacher.Name , teacher.LastName, courses.CourseName, courses.description ,courses.photo FROM
 inscriptioncourse INNER JOIN teacher ON teacher.Id = inscriptioncourse.IdTeacher INNER JOIN courses On
  inscriptioncourse.courseId = courses.CourseId WHERE inscriptioncourse.studentId='$idStudent'");






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar using HTML, CSS and Javascript</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="/acceilStudent.css">
</head>

<?php 
include "headercourse.php"
?>
<body>
   <h2 class="studentName">Hello <span><?php echo $_SESSION["student"]["Name"]. " " .$_SESSION["student"]["LastName"]?></span> this is your courrses</h2>
   <div class="courses">
   <?php 

foreach($courses as $course  ){
   ?>
      <div class="course">
         <img class="img" src="/image/<?=$course["photo"]?>" alt="none">
         <div class="courseInfo">
            <div class="TeacherName"> From Teacher : <span><?php echo $course["Name"]." ". $course["LastName"];?></span></div>
            <p class="description">
            <?php echo
            $course["description"];?>
            </p>
         </div>
         <div class="moreInfo">
         <a href="#">more Info</a>
      </div>
         
      </div>

      
   <?php
}
?>
</div>
<script src="js/header.js">
</script>
</body>
