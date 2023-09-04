<?php 

session_start();
if(!($_SESSION["teacher"]['Id'])){

   header("Location: loginTeacher.php");

}else 
echo "this is id of the Teacher  ".var_dump(($_SESSION["teacher"]));

?>
<header>
   <ul>
      <li><a href="AddNotes.php">Add Notes </a> </li>
      <li><a href="#">Add Course </a> </li>

   </ul>
</header