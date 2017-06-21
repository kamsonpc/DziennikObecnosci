<?php
require_once 'includes/php/db_connect.php';

$db = new database;
if($db->dbConnect())
{

	$sql="SELECT klasa.id,wychowawca.imie,wychowawca.nazwisko,profile.nazwa,klasa.rocznik,klasa.skrot FROM wychowawca,klasa,profile WHERE wychowawca.id=klasa.wychowawca_id AND klasa.profile_id=profile.id";
         if($rezult=$db->connection->query($sql))
         {
           $class_html='';
		    while($row=$rezult->fetch_assoc())
			{
				$class_html.="<tr><td class='table_checkbox'><input name='edit' type='radio' value=".$row['id']."></td>"."<td>".$row['id']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['nazwisko']."</td>"."<td>".$row['nazwa']."</td>"."<td>".$row['rocznik']."</td>"."<td>".$row['skrot']."</td>"."</tr>";
			}
			$rezult->free_result();
         }

}
?>
<form action="http://localhost/obecnosc/?url=admin&&page=edit_class" method="post">
  <h2>Klasy</h2>
  <div class="table-responsive">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Zaznacz</th>
        <th>ID</th>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Profil</th>
        <th>Rocznik</th>
        <th>Skrót</th>
      </tr>
    </thead>
    <tbody>
     <?php if(isset($class_html)){echo  $class_html;} ?>
    </tbody>
  </table>
  </div>
   <button type="submit" class="btn  btn-info center-block"><i class="fa fa-pencil" aria-hidden="true"></i> Edytuj Klasę</button>
</form>
<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12 alert-margin">
        <?php if(isset($_SESSION['alert'])){ echo $_SESSION['alert']; unset($_SESSION['alert']); } ?>
    </div>
