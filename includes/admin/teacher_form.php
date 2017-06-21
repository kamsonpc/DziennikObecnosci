<form class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12" method='POST' action="includes/php/add_teacher.php">
    <h2 class="text-center">Dodaj Wychowacę</h2>
    <div class="form-group">
        <label for="name">Imię</label>
        <input type="text" maxlength="20" class="form-control" name="name" id="name" placeholder="Wpisz imię"> </div>
    <div class="form-group">
        <label for="surname">Nazwisko</label>
        <input type="text" maxlength="50" class="form-control" name='surname' id="surname" placeholder="Wpisz Nazwisko"> </div>
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" maxlength="20" class="form-control" name='login' id="login" placeholder="Wpisz login"> </div>
    <div class="form-group">
        <label for="pass">Hasło</label>
        <input type="password" maxlength="50" class="form-control" name="pass" id="pass" placeholder="Hasło"> </div>
    <div class="form-group">
        <label for="pass_r">Powtórz Hasło</label>
        <input type="password" maxlength="50" class="form-control" name="pass_r" id="pass_r" placeholder="Hasło"> </div>
    <button type="submit" class="btn   btn-success center-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Dodaj</button>
</form>
<div class="row">
    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12 alert-margin">
        <?php if(isset($_SESSION['alert'])){ echo $_SESSION['alert']; unset($_SESSION['alert']); } ?>
    </div>
</div>
