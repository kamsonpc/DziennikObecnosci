<?php
if(!isset($_POST['edit']))
{
    header("Location:http://localhost/obecnosc/?url=admin&&page=view_class");
}
$id=$_POST['edit'];
require_once 'db_connect.php';
$db = new database;
if($db->dbConnect())
{
    $table="profile";
    $rezult=$db->selectAll($table);
    $profile_html='';
    $wychowaca_html='';
    while($row=$rezult->fetch_assoc())
    {
        $profile_html.="<option  value=".$row['id'].">".$row['nazwa']."</option>";
    }
    $rezult->free_result();
    $table="wychowawca";
    $rezult=$db->selectAll($table);
    while($row=$rezult->fetch_assoc())
    {
        $wychowaca_html.="<option value=".$row['id'].">".$row['imie']." ".$row['nazwisko']."</option>";
    }
    $rezult->free_result();
}
?>
    <form class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12" method='POST' action="includes/php/update_class.php">
        <h2 class="text-center">Edytuj Klasę</h2>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label for='profil_select'>Wybierz profil: </label>
            <select name='profil_select' id='profil_select'>
                <?php
                    echo $profile_html;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for='wychowawca_select'>Wybierz Wychowawcę: </label>
            <select name='wychowawca_select' id='wychowawca_select'>
                <?php
                    echo $wychowaca_html;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="year">Rocznik</label>
            <input type="number" min="1900" max="2099" step="1" class="form-control" id="year" name='year' placeholder='Wpisz rocznik np.2017'> </div>
        <div class="form-group">
            <label for="short">Skrót</label>
            <input type="text" maxlength=4 class="form-control" id="short" name='short' placeholder='Wpisz skrót np.TI'> </div>
        <button type="submit" class="btn   btn-success center-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Edytuj</button>
    </form>
