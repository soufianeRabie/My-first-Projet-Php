<?php 
$conn= new PDO("mysql:host=localhost;dbname=universite","root","");
if(!$conn){
    echo "error";
}