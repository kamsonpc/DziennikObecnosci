<?php
    session_start();
    require_once 'db_connect.php';
    //Odebrenie danych z formularza
$id = $_POST['id'];
$teacher = $_POST['wychowawca_select'];
$profil = $_POST['profil_select'];
$year = $_POST['year'];
$short = $_POST['short'];
$id_new = $_POST['short']."_".$_POST['year'];


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
        $sql="UPDATE $table SET id='$id_new',wychowawca_id='$teacher',profile_id='$profil',rocznik='$year',skrot='$short' WHERE id='$id'";
        echo $sql;
        if($rezult=$db->connection->query($sql))
        {
             $_SESSION['alert']="<div class='alert alert-success'>Prawidłowo Zedytowana Klasę <br></div>";
        }
        else
        {
            $_SESSION['alert']="<div class='alert alert-danger'>Problem z zapytaniem</div>";
        }
    }
}

header("Location:http://localhost/obecnosc/?url=admin&&page=view_class");
?>
