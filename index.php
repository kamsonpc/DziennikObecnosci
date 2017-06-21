<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dziennik Obecnosci</title>
    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> </head>

<body>
    <?php
  session_start();
?>
        <div id='logo' class="container-fluid">
            <h4 class="logo-text text-center"><i class="fa fa-line-chart" aria-hidden="true"></i> DZIENNIK OBECNOŚCI</h4> </div>
        <div class="main-container">
            <?php
  $url=@$_GET['url'];
  switch($url)
  {   case 'admin':
           include("includes/admin_panel.php");
      break;
      case 'user':
           include("includes/user_panel.php");
      break;
      default:
          include("includes/login_panel.php");
      break;
  }
?>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="text-center footer-header"><i class="fa fa-info-circle" aria-hidden="true"></i> Jak Korzystać z Aplikacji</h3><a href="#" class="btn btn-footer center-block"><i class="fa fa-external-link" aria-hidden="true"></i> Instrukcja</a> </div>
                    <div class="col-md-6">
                        <h3 class="footer-header ">Dane Administratora</h3>
                        <div class="contact-info block-center">
                            <div><i class="fa fa-user" aria-hidden="true"></i> Tomasz Kasper</div>
                            <div><i class="fa fa-envelope" aria-hidden="true"></i> tomkasper@gmail.com</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy text-center">&copy; Wszelkie prawa zastrzeżone przez ZST Leżajsk</div>
        </footer>
        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/ajax.js"></script>
</body>

</html>
