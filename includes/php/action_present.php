<?php
require_once "db_connect.php";
$week_id=Array();
$week_count=0;
foreach($_POST['week_k'] as $week)
{
    $week_id[$week_count]=$week;
    $week_count++;
}


$db = new database;
$db->dbConnect();

foreach($_POST['student_id'] as $student)
{   
 

$u=uns($student,"u");
$n=uns($student,"n");
$s=uns($student,"s");


    for($i=0;$i<$week_count;$i++)
    {
        $u_final=$u[$i];
        $n_final=$n[$i];
        $s_final=$s[$i];
        $week_final=$week_id[$i];
        $student_final=$student;
        echo $sql = "INSERT INTO frekwencja VALUES(NULL,'$student_final','$week_final',$u_final,$s_final,$n_final)";
        $rezult = $db->connection->query($sql);
        
    }
   
}
header("Location:http://localhost/obecnosc/?url=user&&page=set_present");
?>