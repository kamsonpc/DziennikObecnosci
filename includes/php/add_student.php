<?php

session_start();
require_once 'db_connect.php';

$grupa=$_POST['group'];
$pesel=$_POST['pesel'];
$nazwisko=$_POST['surname'];
$imie=$_POST['name'];


//Test odebranie danych
//echo "<br>imie:$name<br>nazwisko:$surname<br>login:$login<br>haslo:$pass<br>haslo_powtorz:$pass_r";

//Walidacja
$validator = new validator;
$form=true;
$alert="";
if($validator->blankTest($imie))
{
  $alert.="pole imię nie może być puste<br>";
  $form=false;
}
if($validator->blankTest($nazwisko))
{
  $alert.="pole nazwisko  nie może być puste<br>";
  $form=false;
}
if(strlen($pesel)!=11)
{
  $alert.="pesel musi mieć 11 znaków<br>";
  $form=false;
}
if($form==false)
{
   $_SESSION['alert']="<div class='alert alert-danger'>".$alert."</div>";
}
else
{
    //Połączenie z bazą danych i wykonanie zapytania Insert
    $db = new database;
    if($db->dbConnect())
    {
		$table ="uczen";
    $class_id_temp=$_SESSION['class_id'];
        $sql ="INSERT INTO $table VALUES(NULL,'$imie','$nazwisko','$pesel','$grupa',now(),'$class_id_temp')";
        if($db->connection->query($sql))
        {
             $_SESSION['alert']="<div class='alert alert-success'>Prawidłowo Dodano Ucznia</div>";
        }
        else
        {

        }
    }
}
header("Location:http://localhost/obecnosc/?url=user&&page=add_student");
?>
