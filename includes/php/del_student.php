<?php
session_start();
require_once 'db_connect.php';
if($_POST['edit']!=""){
$del_id=$_POST['edit'];
    $table="uczen";
    $i=0;
$db= new database;
if($db->dbConnect())
{    $_SESSION['alert']="<div class='alert alert-success'>Usunięto wszystkie wybrane elementy </div>";
    foreach ($del_id as $key )
     {
         $sql ="DELETE  FROM $table WHERE id=$key";
         echo $sql;
        if($db->connection->query($sql))
        {

          $i++;
        }
        else
        {
         $_SESSION['alert']="<div class='alert alert-danger'> Nie udało się usunac przynajmniej jednego z elementow <br> Usunięto $i elementów </div>";
        }
    }
 }
}

    $_POST=array();
   header("Location:http://localhost/obecnosc/?url=user&&page=view_student");

 ?>
