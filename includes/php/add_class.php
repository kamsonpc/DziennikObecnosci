<?php
session_start();
require_once 'db_connect.php';

//Odebrenie danych z formularza
$teacher = $_POST['wychowawca_select'];
$profil = $_POST['profil_select'];
$year = $_POST['year'];
$short = $_POST['short'];
$id = $_POST['short']."_".$_POST['year'];


//Test odebranie danych
//echo $short.":".$year.":".$profil.":".$teacher;

//Walidacja

$validator = new validator;
$form=true;
$alert="";
if($validator->blankTest($id))
{
  $alert.="pole id nie może być puste<br>";
  $form=false;
}
if($validator->blankTest($year))
{
  $alert.="pole rok nie może być puste<br>";
  $form=false;
}
if($validator->blankTest($short))
{
  $alert.="pole skrót nie może być puste<br>";
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
        $table='klasa';
        $data=array("'$id'",$teacher,$profil,"'$year'","'$short'");

        if($db->insertData($table,$data))
        {
			 $id_grupy1=$id."_grupa_1";
			 $id_grupy2=$id."_grupa_2";
			 $id_grupy3=$id."_grupa_3";
			 $id_grupy4=$id."_grupa_4";
			 $sql="INSERT INTO grupa VALUES ('$id_grupy1', '$id',1)";
			 $db->connection->query($sql);
			 $sql="INSERT INTO grupa VALUES ('$id_grupy2', '$id',1)";
			 $db->connection->query($sql);
			 $sql="INSERT INTO grupa VALUES ('$id_grupy3', '$id',3)";
			 $db->connection->query($sql);
			 $sql="INSERT INTO grupa VALUES ('$id_grupy4', '$id',4)";
			 $db->connection->query($sql);
             $_SESSION['alert']="<div class='alert alert-success'>Prawidłowo Dodano Klasę <br> Klucz ".$id."</div>";
		}
        else
        {
            $_SESSION['alert']="<div class='alert alert-danger'>Problem z zapytaniem</div>";
        }
    }
}
//Przekierowanie na stronę dodawania wychowacy
header("Location:http://localhost/obecnosc/?url=admin&&page=class");
?>
