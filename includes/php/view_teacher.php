<?php
require_once 'includes/php/db_connect.php';

$db = new database;
if($db->dbConnect())
{

    $sql="SELECT id,imie,nazwisko,login FROM wychowawca";
    $rezult=$db->connection->query($sql);
    $wychowawca_html='';
    while($row=$rezult->fetch_assoc())
    {
        $wychowawca_html.="<tr><td class='table_checkbox'><input name='edit' type='radio' value=".$row['id']."></td><td>".$row['imie']."</td>"."<td>".$row['nazwisko']."</td>"."<td>".$row['login']."</td>"."</tr>";
    }
    $rezult->free_result();
}
?>
    <form action="http://localhost/obecnosc/?url=admin&&page=edit_teacher" method="post">
        <h2>Wychowawcy</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Zaznacz</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Login</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($wychowawca_html)){echo $wychowawca_html;} ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button type="submit" name='edit_submit' value='update' class="btn  btn-info center-block"><i class="fa fa-pencil" aria-hidden="true"></i> Edytuj Dane</button>
            </div>
            <div class="col-md-6">
                <button type="submit" name='edit_submit' value="pass" class="btn  btn-warning center-block"><i class="fa fa-lock" aria-hidden="true"></i> Nowe Hasło </button>
            </div>
        </div>
    </form>
    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12 alert-margin">
        <?php if(isset($_SESSION['alert'])){ echo $_SESSION['alert']; unset($_SESSION['alert']); } ?>
    </div>