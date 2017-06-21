<?php
    session_start();
    require_once 'db_connect.php';
    //Odebrenie danych z formularza
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $pass_r = $_POST['pass_r'];


    $validator = new validator;
$form=true;
$alert="";
if($validator->passTest($pass))
{
  $alert.="Niepowodzenie: hasło musi zawierać Minimum 8 znaków ,dużą Literę i Cyfrę<br>";
  $form=false;
}
if($validator->repeatTest($pass,$pass_r))
{
  $alert.="Nie powodzenie: hasła nie są takie same<br>";
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
          $table="wychowawca";
            $sql="UPDATE wychowawca SET password='$pass_hash' WHERE id=$id";
            echo $sql;
            if($rezult=$db->connection->query($sql))
            {
                 $_SESSION['alert']="<div class='alert alert-success'>Edycja się powiodła</div>";
            }
            else
            {
                 $_SESSION['alert']="<div class='alert alert-danger'>Problem z zapytaniem</div>";
            }
     }

    }
   echo $alert;
    $_POST=array();
    header("Location:http://localhost/obecnosc/?url=admin&&page=view_teacher");
?>
