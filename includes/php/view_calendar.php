<form action="" method="POST">
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
$sql ="SELECT * FROM dzien WHERE (id_miesiaca > 8 AND id_roku = $year_1  ) OR (id_miesiaca < 7 AND id_roku = $year_2)";


$table_body = "";
$temp_mon="";
$rezultat = $db->connection->query($sql);
$i=0;
$day = 0;
    while($row = $rezultat->fetch_assoc())
    {	
        $number = $row['numer'];
		$day_name = $row['dzien_tyg'];
		$week = $row['id_tygodnia'];
		$mon = $row['id_miesiaca'];
        
        			$week_date_d = $row['numer'];
			$week_date_m = $row['id_miesiaca'];
			$week_date_y = $row['id_roku'];
			$week = $row['id_tygodnia'];

        if($day == 0)
        {   
			      $table_body.="<table class='table' width='900'><thead><th>TYDZ</th><th>PN</th><th>WT</th><th>SR</th><th>CZW</th><th>PT</th><th>SO</th><th>ND</th></thead><tbody>";
            			$table_body.="<tr><td> $week <span style='color:green;'>$week_date_m $week_date_y</span></td>";
				for($j=0;$j<$day_name-1;$j++)
				{
					$table_body.="<td>-</td>";
					$i++;
                }
        }

			
					
		  if($i==0 )
		  { 

			$table_body.="<tr><td> $week <span style='color:green;'>$week_date_m $week_date_y</span></td>";
			
		  }
			
	  
	  
	  

		$value =$row['id'];
	    $table_body.="<td><input type='checkbox' value='$value' name='days[]'> $number </td>";
			
	  $day++;
	  $i++;
	  if($i==7)
	  {	  $table_body.="</tr>";
		  $i = 0 ;
	  }
	  
    }
	echo $table_body;
    echo "</tbody></table>";
    
    function clear()
    {
        $db = new database;
$db->dbConnect();
        $sql = "UPDATE dzien SET pracujacy = 0";
        $rezultat = $db->connection->query($sql);
    }
    function update_calendar($array)
    {
              $db = new database;
$db->dbConnect();
        foreach($array as $value)
        {
        $were = $value;
        $sql = "UPDATE dzien SET pracujacy = 1 WHERE dzien.id=$were";
        // echo $sql;
        $rezultat = $db->connection->query($sql);
        }
    
    }

?>
        <input type="submit" class="btn btn-success" name="submit"> </form>
<?php
if(isset($_POST['submit']))
{
    clear();
    update_calendar($_POST['days']);
}

?>