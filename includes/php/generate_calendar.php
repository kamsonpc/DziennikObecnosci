<form action='' method="post">
    <div class="form-group text-center">
        <h3> Rok Szkolny :</h3>
        <input type='text' name="first_year"> /
        <input type='text' name="second_year"> </div>
    <button type="submit" class="btn btn-primary center-block">Generuj Kalendarz</button>
</form>
<?php
set_time_limit(0);
require_once 'db_connect.php';
function generate_calendar($rok)
{

$db = new database;
$db->dbConnect();
$miesiace_nazwy = Array('styczen','luty','marzec','kwiecien','maj','czerwiec','lipiec','sierpien','wrzesien','pazdziernik','listopad','grudzien');
$dni_nazwy = Array('niedziela','poniedzialek','wtorek','sroda','czwartek','piatek','sobota');
$przestepny = date("L");
if($przestepny==false)
{
	$dni = 365;
}
else
{
	$dni = 366;
}
$miesiace = 12;
$tygodnie = 0;
	$sql = "INSERT INTO dzien VALUES";
for($miesiace=1;$miesiace<=12;$miesiace++)
{	

	//Miesiac
	//echo "Miesiace<br>";
	//echo "Nazwa :".$miesiace_nazwy[$miesiace-1]."<br>";
	//echo "Id roku :".$rok_1."<br>";
	//echo "Id miesiace :".$miesiace."<br>";
	 $miesiace_dni = date('t',mktime(0,0,0,$miesiace,1,$rok));
	//echo "Ilosc dni w miesiacu ".$miesiace_dni."<br>";

	///TYDZIEN
	//echo "TYDZIEN<br>";

	for($dni=1;$dni<=$miesiace_dni;$dni++)
	{
		
		$dni_nazw_w_tyg = date("w",mktime(0,0,0,$miesiace,$dni,$rok));
		if($dni_nazw_w_tyg==1)
		{
			$tygodnie++;
			$miesiace_temp = $miesiace_nazwy[$miesiace-1];
			
		}
		
		$pierwszy_dzien_w_roku_nazw = date('w',mktime(0,0,0,1,1,$rok));
		if($tygodnie==0)
		{	
			
			//echo "dzien: $dni to ";
			//echo $dni_nazwy[$dni_nazw_w_tyg];
			$temp_rok = $rok-1;
			//echo " numer tygodnia to 52 , miesiac to grudzien rok to $temp_rok<br>";
			$temp_miesiac=12;
			$temp_tydzien=52;
			$sqlv2= "INSERT INTO dzien VALUES($temp_miesiac,$temp_tydzien,$temp_rok,$dni,$dni_nazw_w_tyg,0,NULL)";
			$db->connection->query($sqlv2);
           // echo $sql;
		}
		else
		{
			//echo "dzien: $dni to ";
			//echo $dni_nazwy[$dni_nazw_w_tyg];
			//echo " numer tygodnia to $tygodnie , miesiac to $miesiace_temp rok to $rok_1";
			//echo "<br>";
            $sql .= "($miesiace,$tygodnie,$rok,$dni,$dni_nazw_w_tyg,0,NULL),";
			
		}
	

		
	}
		
}
$sql_len=strlen($sql);
		
		 $sql=substr($sql,0,$sql_len - 1);
		$db->connection->query($sql);	
}

function clean_calendar()
{
$db = new database;
$db->dbConnect();
$sql="DELETE FROM dzien";
$db->connection->query($sql);
}


if(isset($_POST['first_year'])&&isset($_POST['second_year']))
{
    clean_calendar();
    generate_calendar($_POST['first_year']);
    generate_calendar($_POST['second_year']);
}