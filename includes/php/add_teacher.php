<?php
session_start();
require_once 'db_connect.php';

//Odebrenie danych z formularza
$name = $_POST['name'];
$surname = $_POST['surname'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$pass_r = $_POST['pass_r'];

//Test odebranie danych
//echo "<br>imie:$name<br>nazwisko:$surname<br>login:$login<br>haslo:$pass<br>haslo_powtorz:$pass_r";

//Walidacja
$validator = new validator;
$form=true;
$alert="";
if($validator->blankTest($name))
{
  $alert.="pole imię nie może być puste<br>";
  $form=false;
}
if($validator->blankTest($surname))
{
  $alert.="pole nazwisko  nie może być puste<br>";
  $form=false;
}
if($validator->loginTest($login))
{
  $alert.="pole login musi zawierać min 3 znaki i nie może zawierać znaków specjalnych<br>";
  $form=false;
}
if($validator->passTest($pass))
{
  $alert.="hasło musi zawierać Minimum 8 znaków ,dużą Literę i Cyfrę<br>";
  $form=false;
}
if($validator->repeatTest($pass,$pass_r))
{
  $alert.="hasła nie są takie same<br>";
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
    {   //Hashowanie hasła
        $pass_hash=password_hash($pass,PASSWORD_DEFAULT);
        $data=array("NULL","'$surname'","'$name'","'$login'","'$pass_hash'");
        if($db->insertData("wychowawca",$data))
        {
             $_SESSION['alert']="<div class='alert alert-success'>Prawidłowo Dodano Użytkownika</div>";
        }
        else
        {
            $_SESSION['alert']="<div class='alert alert-danger'>Taki Nauczyciel już Istnieje</div>";
        }
    }
}
//Przekierowanie na stronę dodawania wychowacy
header("Location:http://localhost/obecnosc/?url=admin&&page=teacher");
?>
