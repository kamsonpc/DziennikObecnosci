<?php
if(isset($_SESSION['admin']))
{

}
else
{
    header("Location:http://localhost/obecnosc");
}
?>
    <nav class="navbar navbar-inverse  navbar-custom">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav menu">
                    <li> <a href="http://localhost/obecnosc/?url=admin&&page=view_teacher"><i class="fa fa-search" aria-hidden="true"></i>  Wychowawcy</a> </li>
                    <li> <a href="http://localhost/obecnosc/?url=admin&&page=view_class"><i class="fa fa-search" aria-hidden="true"></i>  Klasy</a> </li>
                    <li> <a href="http://localhost/obecnosc/?url=admin&&page=view_profile"><i class="fa fa-search" aria-hidden="true"></i> Profile </a> </li>
                    <li> <a href="http://localhost/obecnosc/?url=admin&&page=teacher"><i class="fa fa-plus-circle" aria-hidden="true"></i> Dodaj Wychowacę</a> </li>
                    <li> <a href="http://localhost/obecnosc/?url=admin&&page=class"><i class="fa fa-plus-circle" aria-hidden="true"></i> Dodaj Klasę</a> </li>
                    <li> <a href="http://localhost/obecnosc/?url=admin&&page=profile"><i class="fa fa-plus-circle" aria-hidden="true"></i> Dodaj Profil</a> </li>
                    <li><a href="http://localhost/obecnosc/?url=admin&&page=view_calendar"><i class="fa fa-calendar" aria-hidden="true"></i> Kalendarz</a></li>
                    <li><a href="http://localhost/obecnosc/?url=admin&&page=generate_calendar"><i class="fa fa-calendar" aria-hidden="true"></i>Generuj Kalendarz</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="includes/php/logout.php"> <i class="fa fa-sign-out "></i> Wyloguj </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container min-height">
        <div class="row">
            <div class="col-lg-12">
                <?php
                          $url=@$_GET['page'];
                          switch($url)
                          {   case 'teacher':
                                   include("includes/admin/teacher_form.php");
                              break;
                              case 'class':
                                   include("includes/admin/class_form.php");
                              break;
                              case 'profile':
                                   include("includes/admin/profile_form.php");
                              break;
                              case 'view_teacher':
                                   include("includes/php/view_teacher.php");
                              break;
							  case 'edit_teacher':
                                   include("includes/php/edit_teacher.php");
                              break;
                              case 'view_class':
                                   include("includes/php/view_class.php");
                              break;
                              case 'edit_class':
                                   include("includes/php/edit_class.php");
                              break;
                              case 'view_profile':
                                   include("includes/php/view_profile.php");
                              break;
                              case "view_calendar":
                               include('includes/php/view_calendar.php');
                              break;
                              case "generate_calendar":
                               include('includes/php/generate_calendar.php');
                              break;

                              default:
                                  include("includes/php/view_teacher.php");
                              break;
                          }
                        ?>
            </div>
        </div>
    </div>