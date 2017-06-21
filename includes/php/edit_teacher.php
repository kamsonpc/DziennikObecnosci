<?php
if($_POST['edit'])
{
    require_once 'includes/php/db_connect.php';
    $id = $_POST['edit'];
    if($_POST['edit_submit']=='update')
    {
        $db = new database;
        if($db->dbConnect())
        {
            $table="wychowawca";
            $sql="SELECT * FROM $table WHERE id=$id";
            $rezult=$db->connection->query($sql);
            $row=$rezult->fetch_assoc();
            $name=$row['imie'];
            $surname=$row['nazwisko'];
            $login=$row['login'];
            $rezult->free_result();
            include('edit_teacher_text.php');
        }

   }
   else
   {
            include('edit_teacher_pass.php');
   }
}
else
{
    header("Location:http://localhost/obecnosc/?url=admin&&page=view_teacher");
}

?>
