<?php 

session_start();
    include "conn.php";
    include "framwork.php";
    $id = $_GET["id"];
    $choice = $_GET["idC"];
    $idTeacher = $_SESSION["teacher"]["Id"];
    $specialiseId= $_SESSION["teacher"]["specialiseId"];

$specialise= $conn->query("SELECT specialise.SpecializationName FROM specialise INNER JOIN teacher On specialise.id = teacher.specialiseId WHERE specialiseId=$specialiseId")->fetch(PDO::FETCH_ASSOC);
$specialiseName= $specialise["SpecializationName"];
 
    $GetStudentNotes= $conn->prepare("SELECT student.Name, student.Id,student.LastName ,class.ClassName, $specialiseName.Control1 ,$specialiseName.control2  , $specialiseName.Control3 FROM  $specialiseName INNER JOIN student On 
    $specialiseName.idStudent = student.Id INNER JOIN  class ON $specialiseName.idClass = class.ClassId  WHERE $specialiseName.IdTeacher=? and $specialiseName.idClass=? and $specialiseName.idStudent=? ");

    $GetStudentNotes->execute([$idTeacher,$choice,$id]);
    $GetStudentNotes = $GetStudentNotes->fetch(PDO::FETCH_ASSOC);
    echo $GetStudentNotes["Name"];

    echo $id . " choice " .$choice. " id TEacher ". $idTeacher;
    var_dump($GetStudentNotes);
    if( isset($_POST["modify"])){
        $id= $GetStudentNotes['Id'];
        $control1 = ValidateData($_POST["control1"]);
        $control2 = ValidateData($_POST["control2"]);
        $control3 = ValidateData($_POST["control3"]);
        $update = $conn->prepare("UPDATE $specialiseName SET Control1=? , control2=? ,control3=? WHERE idStudent=?");
        $update->execute([$control1,$control2,$control3,$id]);
        // header("Location:AddNotes.php");
        exit();
        
    }   

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>
<body>

<form action="AddNotes.php?idC=<?=$choice?>&&id=<?=$id?>" method="post">
    <label for="">student Name </label>
    <input type="text" readonly="readonly"  value="<?= $GetStudentNotes['Name'] ." ". $GetStudentNotes['LastName']?>"><br>
    <label for="">student Id </label>
    <input type="text" readonly="readonly"  value="<?= $GetStudentNotes['Id']?>"><br>
    <label for="">student class </label>
    <input type="text" readonly="readonly"  value="<?= $GetStudentNotes['ClassName'] ?>"><br>
    <label for="">Control1</label>
    <input type="text" value="<?=$GetStudentNotes['Control1']?>" name="control1"><br>
    <label for="">Control2</label>
    <input type="text" value="<?=$GetStudentNotes['control2']?>" name="control2"><br>
    <label for="">Control3</label>
    <input type="text" value="<?=$GetStudentNotes['Control3']?>" name="control3"><br>
    <input type="submit" name="modify" value="modify" id="">

</form>


    
</body>
</html>