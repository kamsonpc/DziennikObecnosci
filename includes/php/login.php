<?php
session_start();
require_once 'db_connect.php';
$login =$_POST['login'];
$pass = $_POST['pass'];
$db = new database;
if($db->dbConnect())
{
    if($login=='admin')
    {
        $table="administratorzy";
        if($_SESSION['user_id']=$db->loginFunction($table,$login,$pass))
        {
         $_SESSION['admin']=true;
         if(isset($_SESSION['login']))
         {
            unset($_SESSION['login']);
         }
         header("Location:http://localhost/obecnosc/?url=admin");
        }
        else
        {
            $_SESSION['alert']="<div class='alert alert-danger'>Login lub Hasło jest nieprawidłowe</div>";
            header("Location:http://localhost/obecnosc");
        }

    }
    else
    {
     $table="wychowawca";
     if($_SESSION['user_id']=$db->loginFunction($table,$login,$pass))
     {
         $_SESSION['login']=true;
          if(isset($_SESSION['admin']))
         {
            unset($_SESSION['admin']);
         }
         header("Location:http://localhost/obecnosc/?url=user&&page=teacher");
     }
     else
     {
         $_SESSION['alert']="<div class='alert alert-danger'>Login lub Hasło jest nieprawidłowe</div>";
         header("Location:http://localhost/obecnosc");
     }
    }

}
else
{

}
