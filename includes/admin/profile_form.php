<form class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12" method='POST' action="includes/php/add_profile.php">
    <h2 class="text-center">Dodaj Profil</h2>
    <div class="form-group">
        <label for="name">Nazwa</label>
        <input type="text" maxlength="20" class="form-control" name="name" id="name" placeholder="Wpisz nazwę np.Technik Informatyk"> </div>
    <button type="submit" class="btn  btn-success center-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Dodaj</button>
</form>
<div class="row">
    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12 alert-margin">
        <?php if(isset($_SESSION['alert'])){ echo $_SESSION['alert']; unset($_SESSION['alert']); } ?>
    </div>
</div>
