<?php 
include "conn.php";
session_start();
if(!($_SESSION["student"]['Id'])){

   header("Location: loginStudent.php");

}
// echo "this is id of the student  ".var_dump(($_SESSION["student"]['Name']));

$courses = $conn->query("SELECT teacher.Name,teacher.LastName , courses.CourseName , courses.description ,courses.photo FROM courses JOIN teacher ON courses.IdTeacher = teacher.Id;");


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
include "headerStudent.php"
?>
<body>
   <h2 class="course-title"> Our Courses: <span>JOIN US</span></h2>
   <div class="courses">
   <?php 

foreach($courses as $course  ){
   ?>
      <div class="course">
        <div class="p-course">
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
         
      </div>

      
   <?php
}
?>
</div>
<script src="js/header.js">
</script>
</body>
</html>