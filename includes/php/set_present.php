<form action="" method="post">
    <?php
require_once 'db_connect.php';
$db = new database;
$db->dbConnect();
$sql = "SELECT id_roku From dzien  GROUP BY id_roku";
$years = Array();
$i =0;
$rezultat = $db->connection->query($sql);
if($rezultat->num_rows==2)
{
    while($row = $rezultat->fetch_assoc())
    {
       echo $years[$i] = $row['id_roku'];
        $i++;
    }
}
if($rezultat->num_rows==3)
{
    while($row = $rezultat->fetch_assoc())
    {
      if($i >= 1)
      {
         $years[$i-1] = $row['id_roku'];   
          
      }
      $i++;
    }
}
$year_1 = $years[0];
$year_2 = $years[1];
echo "<select name='miesiac'><option value=9 selected>Wrzesien $year_1</option><option value=10>Pazdziernik $year_1</option><option value=11>Listopad $year_1</option><option value=12>Grudzien $year_1</option><option value=1>Styczen $year_2</option><option value=2>Luty $year_2</option><option value=3>Marzec $year_2</option><option value=4>Kwiecien $year_2</option><option value=5>Maj $year_2</option><option value=6>Czerwiec $year_2</option></select> ";
$sql ="SELECT * FROM dzien WHERE (id_miesiaca > 8 AND id_roku = $year_1  ) OR (id_miesiaca < 7 AND id_roku = $year_2)";
?>
        <br>
        <input type="submit" class='btn btn-success' value="wybierz" name='miesiac_button'> </form>
<form action="" method="post">
    <?php
if(isset($_POST['miesiac_button']))
{   
    $miesiac = $_POST['miesiac'];
    $table_present="";
    $sql = "SELECT id_tygodnia From dzien  WHERE id_miesiaca = $miesiac Group BY id_tygodnia";
    //echo $sql;
    $weeks = array();
    $i = 0 ;
    $rezultat = $db->connection->query($sql);
    while($row = $rezultat->fetch_assoc())
    {
        $weeks[$i] = $row['id_tygodnia'];
        $i++;
    }
    $licznik = count($weeks);
    $table_present.="<table class='table table-responsive'><thead><th>Uczen</th> ";
    foreach($weeks as $value)
    {
        $table_present.="<th><input type='hidden' name='weeks[]' value='$value'> $value </th>";
    }
    $table_present.="</thead><tbody>";
    $klasa = $_SESSION['class_id'];
    $sql = "SELECT * From uczen  WHERE klasa_id = '$klasa' ";
   // echo $sql;
    $rezultat = $db->connection->query($sql);
    while($row= $rezultat->fetch_assoc())
    {
       $id = $row['id'];
       $name = $row['imie'];
       $surname = $row['nazwisko'];
       $table_present .= "<tr>";
       $table_present .= "<td> $name $surname </td>";
       for($i = 0 ; $i < $licznik; $i++)
       {
             $final_name=$weeks[$i]."_".$id;
             $table_present .= "<td><input type='hidden' name='students[]' value='$id'><input type='text'    class='input_present' name='".$final_name."_U"."'  placeholder='U'><input type='text'  class='input_present' name='".$final_name."_N"."'  placeholder='N'><input type='text'   class='input_present' name='".$final_name."_S"."'   placeholder='S'></td>";
       }
        $table_present .= "</tr>";
        
        
    }
    $table_present.="</tbody></table>";
   echo $table_present;  

}
?>
        <input type="submit" class="btn btn-success" name="submit_present"> </form>
<?php
if(isset($_POST['submit_present']))
{

    $weeks = $_POST['weeks'];
$students = $_POST['students'];
$students_len=count($students);
foreach($weeks as $week)
{
    for($k=0;$k<$students_len;$k++)
    {
        $student_id = $students[$k];
            $temp_name_u = $week."_".$students[$k]."_U";
   // echo $temp_name_u;
    $u = $_POST[$temp_name_u];
    //echo $students[$k]." U = ".$u."<br>";
  
        
        
        
         
        $temp_name_n = $week."_".$students[$k]."_N";
   // echo $temp_name_u;
    $n = $_POST[$temp_name_n];
     //   echo $students[$k]." N = ".$n."<br>";
    
    $temp_name_s = $week."_".$students[$k]."_S";
   // echo $temp_name_u;
    $s= $_POST[$temp_name_n];
      //  echo $students[$k]." S = ".$s."<br>";
      $sql = "INSERT INTO frekwencja VALUES(NULL,$student_id,$week,$u,$n,$s)";
    $db->connection->query($sql);
    }

    
}
}

?>