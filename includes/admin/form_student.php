<?php
require_once 'includes/php/db_connect.php';
$db = new database;
if($db->dbConnect())
{
    $table="grupa";
    $sql="SELECT * FROM $table WHERE klasa_id=(SELECT id FROM klasa WHERE wychowawca_id=$id)";
    $select_group_html="";
    $results=$db->connection->query($sql);
      while($row=$results->fetch_assoc())
      {     $temp_id=$row['id'];
            $numer_group=substr($row['id'],8);
            $select_group_html.="<option  value='$temp_id'> $numer_group </option>";
      }
     }
 ?>
    <form class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12" method='POST' action="includes/php/add_student.php">
        <h2 class="text-center">Dodaj Ucznia</h2>
        <div class="form-group">
            <label for="name">Imię</label>
            <input type="text" maxlength="20" class="form-control" name="name" id="name" placeholder="Wpisz imię"> </div>
        <div class="form-group">
            <label for="surname">Nazwisko</label>
            <input type="text" maxlength="50" class="form-control" name='surname' id="surname" placeholder="Wpisz Nazwisko"> </div>
        <div class="form-group">
            <label for="Pesel">Pesel</label>
            <input type="text" maxlength="11" class="form-control" name='pesel' id="pesel" placeholder="np.123456789111"> </div>
        <div class="form-group">
            <label for="Pesel">GRUPA:</label>
            <select name="group">
                <?php echo $select_group_html; ?>
            </select>
        </div>
        <button type="submit" name='submit' class="btn  center-block"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj </button>
    </form>
    <div class="row">
        <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12 alert-margin">
            <?php if(isset($_SESSION['alert'])){ echo $_SESSION['alert']; unset($_SESSION['alert']); } ?>
        </div>
    </div>
