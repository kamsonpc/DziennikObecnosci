<?php
session_start();
require_once 'db_connect.php';

//Odebrenie danych z formularza
$name = $_POST['name'];

//Test odebranie danych
//echo "<br>nazwa:$name";

//Walidacja
$validator = new validator;
$form=true;
$alert="";
if($validator->blankTest($name))
{
  $alert.="pole nazwa nie może być puste<br>";
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
        $data=array("NULL","'$name'");
        if($db->insertData('profile',$data))
        {
             $_SESSION['alert']="<div class='alert alert-success'>Prawidłowo dodano profil</div>";
        }
        else
        {
            $_SESSION['alert']="<div class='alert alert-danger'>Problem z zapytaniem</div>";
        }
    }
}
//Przekierowanie na stronę dodawania wychowacy
header("Location:http://localhost/obecnosc/?url=admin&&page=profile");
?>