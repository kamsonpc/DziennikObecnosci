<?php
if(isset($_SESSION['login']))
{
    require_once 'includes/php/db_connect.php';
    $db = new database;
    if($db->dbConnect())
    {
        $table="wychowawca";
        $id =$_SESSION['user_id'];
        $sql="SELECT * FROM $table WHERE id=$id";
        $results=$db->connection->query($sql);
        $row=$results->fetch_assoc();
        $user=$row['imie']." ".$row['nazwisko'];
        $results->free_result();
    }
    if(@$_SESSION['class']==true)
    {

    }
    else
    {
        require_once 'includes/php/db_connect.php';
        $db = new database;
        if($db->dbConnect())
        {
            $table="klasa";
            $sql="SELECT * FROM $table WHERE wychowawca_id=$id";
            $results=$db->connection->query($sql);
            $row_cnt = $results->num_rows;
            $_SESSION['class_name']='';
            if($row_cnt>1)
            {
                    $radio_class="";
                    while($row=$results->fetch_assoc())
                    {
                        $tempclass=$db->calculateYear($row['rocznik'])." ".$row['skrot'];
                        $tempclass_id=$row['id'];
                        $radio_class.="<input type='radio' name='select_class' value='$tempclass#$tempclassid'>$tempclass</input><br>";
                    }
                $radio_class.='';
                $_SESSION['class']=false;

            }
            else
            {
                if($row_cnt==0)
                {
                   $_SESSION['class_name']='Nie przypisano';
                    $_SESSION['class']=true;
                }
                else
                {
                    $row=$results->fetch_assoc();
                    $_SESSION['class_name']=$db->calculateYear($row['rocznik'])." ".$row['skrot'];
                    $_SESSION['class_id']=$row['id'];
                    $_SESSION['class']=true;
                }

            }
            $results->free_result();

        }
    }
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
                <a class="navbar-brand" href="#"> </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav menu">
                    <li><a href="http://localhost/obecnosc/?url=user&&page=add_student"><i class="fa fa-address-card" aria-hidden="true"></i> Dodaj Ucznia</a></li>
                    <li><a href="http://localhost/obecnosc/?url=user&&page=view_student"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Podgląd Uczniów</a></li>
                    <li><a href="http://localhost/obecnosc/?url=user&&page=set_present"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Ustaw Obecnośći</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a> <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <?php
                            echo $user;
                        ?>
                        </a>
                    </li>
                    <li> <a>
                            <?php
                            if( $_SESSION['class_name']!="")
                            {
                                     echo "<i class='fa fa-users' aria-hidden='true'></i> ". $_SESSION['class_name'];
                            }
                            else
                            {
                                echo "<i class='fa fa-users' aria-hidden='true'></i> Nie wybrano klasy";
                            }
                            ?>
                        </a> </li>
                    <li>
                        <a href="includes/php/logout.php"> <i class="fa fa-sign-out "></i> Wyloguj </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid min-height">
        <div class="row">
            <div class="col-md-2 sidebar">
                <?php include("includes/sidebar/sidebar.php") ?>
            </div>
            <div class="col-lg-8">
                <?php

                         if($_SESSION['class']==false)
                         {
                             include('includes/php/select_class.php');
                         }
                         else
                         {
                          $url=@$_GET['page'];
                          switch($url)
                          {
                            case "add_student":
                             include('includes/admin/form_student.php');
                             break;
                             case "view_student":
                              include('includes/php/view_student.php');
                              break;
                              case "set_present":
                              include('includes/php/set_present.php');
                              break;
                              default:
                              include('includes/php/view_student.php');
                              break;
                          }
                         }
                        ?>
            </div>
            <div class="col-md-2 rightbar">
                <?php include("includes/rightbar/rightbar.php") ?>
            </div>
        </div>
    </div>