<?php
    session_start();
    require_once 'db_connect.php';
    //Odebrenie danych z formularza
    $id = $_POST['edit_id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $login = $_POST['login'];

    $validator=new validator;
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
    if($form==true)
    {
        $db = new database;
        if($db->dbConnect())
        {
            $table="wychowawca";
            $sql="UPDATE wychowawca SET imie='$name',nazwisko='$surname',login='$login' WHERE id=$id";
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
    else
    {
         $_SESSION['alert']="<div class='alert alert-danger'>$alert</div>";
    }
    $_POST = array();
    header("Location:http://localhost/obecnosc/?url=admin&&page=view_teacher");
?>
