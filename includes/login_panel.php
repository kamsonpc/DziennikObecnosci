<?php
if(isset($_SESSION['login'])&&($_SESSION['login']==true))
{
      header("Location:http://localhost/obecnosc/?url=user&&page=teacher");
}
?>
    <div class="container-fluid min-height  login-container">
        <form class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-1 col-sm-10 col-xs-12" method='POST' action="includes/php/login.php">
            <h2 class="text-center"><i class="fa fa-user-circle" aria-hidden="true"></i> Logowanie</h2>
            <div class="form-group">
                <label for="login"><i class="fa fa-user" aria-hidden="true"></i> Login</label>
                <input type="text" maxlength="20" class="form-control" name='login' id="login" placeholder="Wpisz login"> </div>
            <div class="form-group">
                <label for="pass"><i class="fa fa-unlock" aria-hidden="true"></i> Hasło</label>
                <input type="password" maxlength="50" class="form-control" name="pass" id="pass" placeholder="Hasło"> </div>
            <div class="form-group">
                <button type="submit" class="btn    center-block"><i class="fa fa-sign-in" aria-hidden="true"></i> Zaloguj się</button>
            </div>
        </form>
        <div class="row">
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12 alert-margin">
                <?php if(isset($_SESSION['alert'])){ echo $_SESSION['alert']; unset($_SESSION['alert']); } ?>
            </div>
        </div>
    </div>
