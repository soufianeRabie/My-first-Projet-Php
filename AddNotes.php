<?php 
session_start();
include "framwork.php";
include "conn.php";

echo $_SESSION["teacher"]["Id"];
echo "HELLO";
$specialiseId= $_SESSION["teacher"]["specialiseId"];

$specialise= $conn->query("SELECT specialise.SpecializationName FROM specialise INNER JOIN teacher On specialise.id = teacher.specialiseId WHERE specialiseId=$specialiseId")->fetch(PDO::FETCH_ASSOC);
$specialiseName= $specialise["SpecializationName"];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="/header.css"> -->

</head>
<body>
    <form action="" method="post">

   
<label for="class"> choice a class</label>
<select name="choiceClass" id="">
    <option value="">choice a class</option>
    <?php GetOptions($classes,$conn,$class,$classId,$className,"ClassId","ClassName","class");

    ?>

</select>
<input type="submit" value="search" name="search">
</form>




<?php
if(isset($_POST["modify"])){
    $choice = $_GET["idC"];
    $idTeacher = ValidateData($_SESSION["teacher"]["Id"]);
    $id= $_GET['id'];
    $control1 = ValidateData($_POST["control1"]);
    $control2 = ValidateData($_POST["control2"]);
    $control3 = ValidateData($_POST["control3"]);
    $update = $conn->prepare("UPDATE $specialiseName SET Control1=? , control2=? ,control3=? WHERE idStudent=?");
    $update->execute([$control1,$control2,$control3,$id]);

    echo "modify succes";
    $GetNoteClass= $conn->prepare("SELECT student.Name, student.Id,student.LastName ,class.ClassName, $specialiseName.Control1 ,$specialiseName.control2  , $specialiseName.Control3 FROM  $specialiseName INNER JOIN student On 
    $specialiseName.idStudent = student.Id INNER JOIN  class ON $specialiseName.idClass = class.ClassId  WHERE $specialiseName.IdTeacher=? and $specialiseName.idClass=? ");

    $GetNoteClass->execute([$idTeacher,$choice]);
    ?>
       
    <table border="1">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Class Name</th>
                <th>Id Student  </th>
                <th>Control1</th>
                <th>Control2</th>
                <th>Control3</th>
                <th>Edit Note</th>
            </tr>
        </thead>
        <?php  foreach($GetNoteClass as $Note){ ?>
        <tbody>
            <td class="Name"><?=  $Note["Name"] . " " . $Note["LastName"] ?></td>
            <td class="" ><?=  $Note["ClassName"] ?></td>
            <td><?= $Note["Id"]?></td>
            <td><?=  $Note["Control1"] ?></td>
            <td><?=  $Note["control2"] ?></td>
            <td><?=  $Note["Control3"] ?></td>
            <td><a href="EditNotes.php?id=<?=$Note['Id']?>&&idC=<?=$choice?>&&CName=<?=$Note['ClassName']?>">modify</a></td>
            <?php
            
            
     ?>



</tbody>

<?php 
}}?>
<?php
    if(isset($_POST["search"])){
        echo "1";

        $choice = ValidateData($_POST["choiceClass"]);
        $idTeacher = ValidateData($_SESSION["teacher"]["Id"]);
        echo $idTeacher;
        echo $choice;
        

        if(empty($choice)){
            header("Location:AddNotes.php?error=Please choice a class!");
        }else {
            echo "suii";

            $GetNoteClass= $conn->prepare("SELECT student.Name, student.Id,student.LastName ,class.ClassName, $specialiseName.Control1 ,$specialiseName.control2  , $specialiseName.Control3 FROM  $specialiseName INNER JOIN student On 
            $specialiseName.idStudent = student.Id INNER JOIN  class ON $specialiseName.idClass = class.ClassId  WHERE $specialiseName.IdTeacher=? and $specialiseName.idClass=? ");

            $GetNoteClass->execute([$idTeacher,$choice]);
            // var_dump($GetNoteClass->fetchAll(PDO::FETCH_ASSOC));
            // $GetNoteClass->fetch(PDO::FETCH_ASSOC);
            // $Id= $Note["Id"]; 
            
             ?>
       
        <table border="1">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Class Name</th>
                    <th>Id Student  </th>
                    <th>Control1</th>
                    <th>Control2</th>
                    <th>Control3</th>
                    <th>Edit Note</th>
                </tr>
            </thead>
            <?php  foreach($GetNoteClass as $Note){ ?>
            <tbody>
                <td class="Name"><?=  $Note["Name"] . " " . $Note["LastName"] ?></td>
                <td class="" ><?=  $Note["ClassName"] ?></td>
                <td><?= $Note["Id"]?></td>
                <td><?=  $Note["Control1"] ?></td>
                <td><?=  $Note["control2"] ?></td>
                <td><?=  $Note["Control3"] ?></td>
                <td><a href="EditNotes.php?id=<?=$Note['Id']?>&&idC=<?=$choice?>&&CName=<?=$Note['ClassName']?>">modify</a></td>
                <?php
                
                
         ?>



</tbody>

<?php 
}}}
   
?>
        </table>
      
</body>
</html>


