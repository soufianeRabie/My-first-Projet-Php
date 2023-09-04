<?php 
include "conn.php";
session_start();


$idStudent = $_SESSION["student"]["Id"];


$Math = $conn->query("SELECT math.Name, Control1 , Control2 ,Control3 FROM math INNER JOIN student
 ON math.idStudent = student.Id WHERE math.idStudent = $idStudent  ")->fetch(PDO::FETCH_ASSOC);

$Francais = $conn->query("SELECT francais.Name, Control1 , Control2 ,Control3 FROM francais INNER JOIN student
ON francais.idStudent = student.Id WHERE francais.idStudent = $idStudent  ")->fetch(PDO::FETCH_ASSOC);

$PHP = $conn->query("SELECT php.Name, Control1 , Control2 ,Control3 FROM php INNER JOIN student
 ON php.idStudent = student.Id WHERE php.idStudent = $idStudent  ")->fetch(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/acceilStudent.css">
    <link rel="stylesheet" href="/header.css">
</head>
<?php
    include "headerNote.php"; 
    ?>
    <body>
        
    
<div class="content">
<table >
    <thead>
        <tr>
            <th class="title" colspan="5">
                Hello <?php echo $_SESSION["student"]["Name"] . " ";?>this is Your Notes
            </th>
        </tr>
        <tr>
            <th>mateire </th>
            <th>Control1 </th>
            <th>Control2 </th>
            <th>Control3 </th>
            <th>file a complaint</th>
        </tr>
    </thead>

<tbody>
    <tr>
    <td><?php echo $Math["Name"] ?></td>
    <td><?php echo $Math["Control1"] ?></td>
    <td><?php echo $Math["Control2"] ?></td>
    <td><?php echo $Math["Control3"] ?></td>
    <td><a href=""><button>file a complaint</button></a></td>
</tr>
<tr>
<td><?php echo $Francais["Name"] ?></td>
    <td><?php echo $Francais["Control1"] ?></td>
    <td><?php echo $Francais["Control2"] ?></td>
    <td><?php echo $Francais["Control3"] ?></td>
    <td><a href=""><button>file a complaint</button></a></td>
</tr>
<tr>
<td><?php echo $PHP["Name"] ?></td>
    <td><?php echo $PHP["Control1"] ?></td>
    <td><?php echo $PHP["Control2"] ?></td>
    <td><?php echo $PHP["Control3"] ?></td>
    <td><a href=""><button>file a complaint</button></a></td>
</tr>
</div>
</tbody>
</table>
<script src="/js/header.js"></script>
</body>






