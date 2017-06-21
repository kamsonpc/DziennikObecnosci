<?php
require_once 'includes/php/db_connect.php';

$db = new database;
if($db->dbConnect())
{   
    $sql="SELECT nazwa FROM profile";
    $rezult=$db->connection->query($sql);
    $profil_html='';
    while($row=$rezult->fetch_assoc())
    {
        $profil_html.="<tr><td>".$row['nazwa']."</td></tr>";
    }
    $rezult->free_result();
}
?>
    <form action="includes/php/del_teacher.php" method="post">
        <h2>Kierunki</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nazwa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($profil_html)){echo $profil_html;} ?>
                </tbody>
            </table>
        </div>
    </form>