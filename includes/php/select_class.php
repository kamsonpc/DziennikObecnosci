
<div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-1 col-sm-10 col-xs-12">

<form action="" method="post">
<h2 class="text-center">WYBIERZ KLASĘ</h2>
<?php
echo $radio_class;
?>
<button type="submit" name="submit" class="btn btn-primary center-block">Wybierz</button>
</form>
</div>

<?php
if(isset($_POST['submit']))
{
    $two_values=explode("#",$_POST['select_class']);
    $_SESSION['class_name']=$two_values[0];
    $_SESSION['class_id']=$two_values[1];
    $_SESSION['class']=true;
    header("Location:http://localhost/obecnosc/?url=user&&page=teacher");
}
?>
