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
          $student_html.="<tr><td class='table_checkbox'><input name='edit[]' type='checkbox' value=".$row['id']."></td><td>".$row['nazwisko']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['pesel']."</td>"."<td>".$numer_group."</td>"."<td>".$row['data_dodania']."</td>"."</tr>";
      }
    }
    else {
      echo "<h2 class='text-center'>Nie znaleziono żadnego ucznia.Dodaj uczniów</h2>";
    }

    $rezult->free_result();
}
?>
    <form action="includes/php/del_student.php" method="post">
        <h2>Uczniowie</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Zaznacz</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Pesel</th>
                        <th>Grupa</th>
                        <th>Data Dodania</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $student_html ?>
                </tbody>
            </table>
        </div>
        <button type="submit" name="submit_del_studnet" class="btn   btn-danger center-block"><i class="fa fa-plus-minus" aria-hidden="true"></i>Usuń zaznaczone</button>
    </form>
    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12 alert-margin">
        <?php if(isset($_SESSION['alert'])){ echo $_SESSION['alert']; unset($_SESSION['alert']); } ?>
    </div>