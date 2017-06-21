<?php
require_once 'includes/php/db_connect.php';

$db = new database;
if($db->dbConnect())
{

    $class_temp_id=$_SESSION['class_id'];
     $sql ="SELECT id,imie,nazwisko,pesel,data_dodania,grupa_id FROM uczen WHERE klasa_id='$class_temp_id'";
    $rezult=$db->connection->query($sql);
    $student_html='';
    if($rezult->num_rows>0)
    {
      while($row=$rezult->fetch_assoc())
      {   $numer_group=substr($row['grupa_id'],8);
          
          $student_html.="<option value='".$row['id']."' >".$row['imie']." ".$row['nazwisko']."</option>";
      }
    }
    else {
      echo "<option>Nie znaleziono<option>";
    }

    $rezult->free_result();
}
?>
    <form>
        <h2>Uzupełnij Obecność</h2>
        <select name='student_id'>
            <?php echo $student_html ?>
        </select>
    </form>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Imię i Nazwisko</th>
                </tr>
            </thead>
            <tbody>
        </table>
    </div>