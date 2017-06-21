<?php
session_start();
require_once 'db_connect.php';


header("Location:http://localhost/obecnosc/?url=admin&&page=view_calendar");
   /*
if(isset($_POST['school_days']))
{   $i=1;
    $days = $_POST['school_days'];
    foreach($days as $value)
    {   
        echo $id=substr($value,0,9)."<br>";
        echo $mon=substr($value,5,2)."<br>";
        echo $week=substr($value,8,2)."<br>";
        echo $day=substr($value,11,1)."<br>";
        echo $values=intval(substr($value,13,1))."<br>";
        // echo "day :$day week:$week value:$values<br>";
     
        echo "<br>".$id;
         echo "<br>".$mon;
         echo "<br>".$week;
         echo "<br>".$day;
       echo "<br>".$value;
        switch($day)
        {
            case "0":
                $day_name="";
            break;
            case "1":
                $day_name="";
            break;
            case "2":
                $day_name="";
            break;
            case "3":
                $day_name="";
            break;
            case "4":
                $day_name="";
            break;
            case "5":
                $day_name="";
            break;
            case "6":
                $day_name="";
            break;
        }
        

    
    }
    
}
*/

?>