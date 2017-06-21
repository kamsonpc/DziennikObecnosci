<form class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12" method='POST' action="includes/php/update_text_teacher.php">
    <h2 class="text-center">Edytuj Wychowawcę</h2>
    <div class="form-group">
        <div class="form-group">
        <label for="edit_id">ID</label>
            <select name='edit_id' ><option selected><?php echo $id ?></option> </select></div>
        <label for="name">Imię</label>
        <input type="text" maxlength="20" class="form-control" value="<?php echo $name; ?>" name="name" id="name" placeholder="Wpisz imię"> </div>
    <div class="form-group">
        <label for="surname">Nazwisko</label>
        <input type="text" maxlength="50" class="form-control" value="<?php echo $surname; ?>" name='surname' id="surname" placeholder="Wpisz Nazwisko"> </div>
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" maxlength="20" class="form-control" name='login' value="<?php echo $login; ?>" id="login" placeholder="Wpisz login"> </div>
    <button type="submit" name="submit" class="btn   btn-success center-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Zapisz</button>
</form>
<div class="row">
    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12 alert-margin">
        <?php if(isset($_SESSION['alert'])){ echo $_SESSION['alert']; unset($_SESSION['alert']); } ?>
    </div>
</div>

