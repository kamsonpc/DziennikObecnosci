<form class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12" method='POST' action="includes/php/update_pass_teacher.php">
    <h2 class="text-center">Zmień hasło</h2>
    <div class="form-group"><input type="hidden" name='id' value='<?php echo $id; ?>'
    ></div>
    <div class="form-group">
        <label for="pass">Hasło</label>
        <input type="password" maxlength="50" class="form-control" name="pass" id="pass" placeholder="Hasło"> </div>
    <div class="form-group">
        <label for="pass_r">Powtórz Hasło</label>
        <input type="password" maxlength="50" class="form-control" name="pass_r" id="pass_r" placeholder="Hasło"> </div>
    <button type="submit" class="btn   btn-warning center-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Zmień</button>
</form>


